{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
    <div class=" rounded p-10">
        <form method="POST" enctype="multipart/form-data" id="updateForm" >
            {{-- Jika data belum memiliki file ap_form atau upload_identity --}}
            @if ($customerNumber['ap_form'] != null && (count($identities) > 1 || $identities[0]['upload_identity']!= null))
                @include('contents.register.shared.ultima.form-hybrid')
            @else
                @include('contents.register.shared.ultima.form-lead')

                @include('contents.register.shared.ultima.form-process')
            @endif
            <div class="card card-custom card-border mb-8">
            <div class="card-footer">
                <div class="col-8 d-flex justify-content-center">
                    @if ($customerNumber['ap_form'] != null && (count($identities) > 1 || $identities[0]['upload_identity']!= null))
                        <button type="button" id="updateActivated" class="btn btn-primary mr-2">Submit</button>
                    @else
                        <button type="button" id="updateProcess" class="btn btn-primary mr-2">Submit</button>
                    @endif
                    <button type="button" class="btn btn-secondary" onclick="Previous();">Cancel</button>
                </div>
            </div>
            </div>
        </form>
    </div>

@endsection

{{-- Styles Section --}}
@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
@endpush


{{-- Scripts Section --}}
@push('scripts')
    <script src="{{ asset('js/pages/crud/forms/widgets/bootstrap-datepicker.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

    {{-- page scripts --}}
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script>

        var uploadProcessApfBloob = []
        var uploadProcessIdBloob = []
        var uploadProcessTermFormBloob = []
        var uploadActivatedIdBloobs = []
        $(function() {

            function getImageFormUrl(url, callback) {
                var img = new Image();
                img.setAttribute('crossOrigin', 'anonymous');
                img.onload = function (a) {
                    var canvas = document.createElement("canvas");
                    canvas.width = this.width;
                    canvas.height = this.height;
                    var ctx = canvas.getContext("2d");
                    ctx.drawImage(this, 0, 0);

                    var dataURI = canvas.toDataURL("image/jpg");

                    // convert base64/URLEncoded data component to raw binary data held in a string
                    var byteString;
                    if (dataURI.split(',')[0].indexOf('base64') >= 0)
                        byteString = atob(dataURI.split(',')[1]);
                    else
                        byteString = unescape(dataURI.split(',')[1]);

                    // separate out the mime component
                    var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];

                    // write the bytes of the string to a typed array
                    var ia = new Uint8Array(byteString.length);
                    for (var i = 0; i < byteString.length; i++) {
                        ia[i] = byteString.charCodeAt(i);
                    }

                    return callback(new Blob([ia], { type: mimeString }));
                }

                img.src = url;
            }

            function getPdfFormUrl(url, callback) {
                fetch(url)
                .then(res => res.blob()) // Gets the response and returns it as a blob
                .then(blob => { return callback(blob) });
            }

            let arrows;
            if (KTUtil.isRTL()) {
                arrows = {
                    leftArrow: '<i class="la la-angle-right"></i>',
                    rightArrow: '<i class="la la-angle-left"></i>'
                }
            } else {
                arrows = {
                    leftArrow: '<i class="la la-angle-left"></i>',
                    rightArrow: '<i class="la la-angle-right"></i>'
                }
            }

            $(document).on("change", "#id_type", function() {
                if (this.value == 'passport') {
                    $('#id_number').val($('#passport').val())
                } else if (this.value == 'arc') {
                    $('#id_number').val('');
                }
            });

            // Birth Date
            $('#birthdate').datepicker({
                rtl: KTUtil.isRTL(),
                todayHighlight: true,
                format: 'yyyy-mm-dd',
                orientation: "bottom left",
                templates: arrows
            });

            $('#activationDate').datepicker({
                rtl: KTUtil.isRTL(),
                todayHighlight: true,
                format: 'yyyy-mm-dd',
                orientation: "bottom left",
                todayBtn: "linked",
                templates: arrows
            });

            // Expirated Date
            $("[name='expdate']").datepicker({
                rtl: KTUtil.isRTL(),
                format: 'yyyy-mm-dd',
                orientation: "bottom left",
                templates: arrows,
                startDate: '+90d'
            });

            $("[name='expdate_passport']").datepicker({
                rtl: KTUtil.isRTL(),
                format: 'yyyy-mm-dd',
                orientation: "bottom left",
                templates: arrows,
                startDate: '+90d'
            });

            $("#passportActivated").on('keyup',function(){
                $('#passport').val($(this).val())
            })

            let msisdnTW = $('#msisdn_tw');
            let msisdnID = $('#msisdn_id');
            msisdnTW.on('keyup', () => {
                $.ajax({
                    "url": "{{ config('app.api.url') }}get_pair_number",
                    "method": "POST",
                    "timeout": 0,
                    "headers": {
                        "Authorization": authorization,
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    "data": {
                        "msisdn_tw": msisdnTW.val()
                    },
                    success: (res) => {
                        let status = res.status.code;
                        if (status == '200') {
                            msisdnID.val(res.data);
                        }
                    },
                    error: function(xhr, status, error) {
                        var err = JSON.parse(xhr.responseText);
                        console.error('');
                        msisdnID.val('');
                    }
                })
            });

            $('input[name=availability]').change(function() {
                console.log($(this).val())
                if ($(this).val() == 'terminate') {
                    $(".formTerminate").removeClass("d-none");
                } else {
                    $(".formTerminate").removeClass("d-none");
                    $(".formTerminate").addClass("d-none");
                }
            });

            let term_formData = "{{ $customerNumber['termination_form'] }}";
            let termFromData = term_formData.split(';')

            for(var termFormData in termFromData) {

                let termFormURI = "{{ config('app.api.asset') }}" + termFromData[termFormData]
                let apFormDownload = ''
                if(termFormURI.substr(termFormURI.length - 3) == 'pdf') {
                    getPdfFormUrl(termFormURI, function (blobPdf) {
                        uploadProcessTermFormBloob.push(blobPdf)
                    });
                    termFormDownload =
                    `<div class="col-md-4 div-image-process-termform-id">`+
                        `   <a href=${termFormURI} target="_blank">` +
                        `       <img class="img-responsive img-thumbnail col-md-12" src="{{ asset('media/svg/files/pdf.svg') }}" style="width: 100%;object-fit: cover;height: 150px;"/>` +
                        `   </a>`+
                        `   <a class=" align-self-end btn btn-danger btn-block btn-sm col-md-12 mt-2 btn-del-process-term" data-img-key="${apFormData}">`+
                        `       Delete`+
                        `   </a>`+
                    `</div>`
                }
                else {
                    getImageFormUrl(termFormURI, function (blobImage) {
                        uploadProcessTermFormBloob.push(blobImage)
                    });
                    termFormDownload =
                    `<div class="col-md-4 div-image-process-termform-id">`+
                    `   <a href=${termFormURI} data-fancybox="images" data-caption="Data Upload ID">` +
                    `       <img class="img-responsive img-thumbnail col-md-12" src="${termFormURI}" style="width: 100%;object-fit: cover;height: 150px;"></img>` +
                    `   </a>`+
                    `   <a class=" align-self-end btn btn-danger btn-block btn-sm col-md-12 mt-2 btn-del-process-term" data-img-key="${apFormData}">`+
                    `       Delete`+
                    `   </a>`+
                    `</div>`
                }

                $('#termformLink').append(termFormDownload);
            }

            $('.btn-del-process-term').each(function(){
                $(this).on('click',function(){
                    uploadProcessTermFormBloob.splice($(this).data('img-key'),1);
                    $(this).parents('.div-image-process-termform-id').remove()
                    console.log(uploadProcessTermFormBloob)
                })
            })

            let ap_formData = "{{ $customerNumber['ap_form'] }}";
            let apFormDatas = ap_formData.split(';')

            for(var apFormData in apFormDatas) {

                let apFormURI = "{{ config('app.api.asset') }}" + apFormDatas[apFormData]
                let apFormDownload = ''
                if(apFormURI.substr(apFormURI.length - 3) == 'pdf') {
                    getPdfFormUrl(apFormURI, function (blobPdf) {
                        uploadProcessApfBloob.push(blobPdf)
                    });
                    apFormDownload =
                    `<div class="col-md-4 div-image-process-apform-id">`+
                        `   <a href=${apFormURI} target="_blank">` +
                        `       <img class="img-responsive img-thumbnail col-md-12" src="{{ asset('media/svg/files/pdf.svg') }}" style="width: 100%;object-fit: cover;height: 150px;"/>` +
                        `   </a>`+
                        `   <a class=" align-self-end btn btn-danger btn-block btn-sm col-md-12 mt-2 btn-del-process-apf" data-img-key="${apFormData}">`+
                        `       Delete`+
                        `   </a>`+
                    `</div>`
                }
                else {
                    getImageFormUrl(apFormURI, function (blobImage) {
                        uploadProcessApfBloob.push(blobImage)
                    });
                    apFormDownload =
                    `<div class="col-md-4 div-image-process-apform-id">`+
                    `   <a href=${apFormURI} data-fancybox="images" data-caption="Data Upload ID">` +
                    `       <img class="img-responsive img-thumbnail col-md-12" src="${apFormURI}" style="width: 100%;object-fit: cover;height: 150px;"></img>` +
                    `   </a>`+
                    `   <a class=" align-self-end btn btn-danger btn-block btn-sm col-md-12 mt-2 btn-del-process-apf" data-img-key="${apFormData}">`+
                    `       Delete`+
                    `   </a>`+
                    `</div>`
                }

                $('#apformLink').append(apFormDownload);
            }

            $('.btn-del-process-apf').each(function(){
                $(this).on('click',function(){
                    uploadProcessApfBloob.splice($(this).data('img-key'),1);
                    $(this).parents('.div-image-process-apform-id').remove()
                    console.log(uploadProcessApfBloob)
                })
            })


            // console.log('Ini variable form data: ', ap_formData);

            // let uploadIdData = "{{ $identities[0]['upload_identity'] }}";
            let idCustomer = "{{ $customerNumber['id_customer'] }}";
            let idCustomerNumber = "{{ $customerNumber['id'] }}";


            // Form Process Customer Identity
            let uploadIdRaw = JSON.parse('{!!json_encode(end($identities))!!}');
            let uploadIdDatas = uploadIdRaw.upload_identity;
            uploadIdDatas = uploadIdDatas.split(';');

            for (var idData in uploadIdDatas) {
                uploadIdDatas[idData] = "{{ config('app.api.asset') }}" + uploadIdDatas[idData];
                let uploadIdURI = uploadIdDatas[idData]

                let uploadFormDownload = ''
                if(uploadIdURI.substr(uploadIdURI.length - 3) == 'pdf') {
                    getPdfFormUrl(uploadIdDatas[idData], function (blobPdf) {
                        console.log(blobPdf)
                        uploadProcessIdBloob.push(blobPdf)
                    });
                    uploadFormDownload =
                    `<div class="col-md-4 div-image-process-cust-id">`+
                    `   <a href=${uploadIdURI} target="_blank">` +
                    `       <img class="img-responsive img-thumbnail col-md-12" src="{{ asset('media/svg/files/pdf.svg') }}" style="width: 100%;object-fit: cover;height: 150px;"/>` +
                    `   </a>`+
                    `   <a class=" align-self-end btn btn-danger btn-block btn-sm col-md-12 mt-2 btn-del-process-cust-id" data-img-key="${idData}">`+
                    `       Delete`+
                    `   </a>`+
                    `</div>`
                }
                else {
                    getImageFormUrl(uploadIdDatas[idData], function (blobImage) {
                        console.log(blobImage)
                        uploadProcessIdBloob.push(blobImage)
                    });
                    uploadFormDownload =
                    `<div class="col-md-4 div-image-process-cust-id">`+
                    `   <a href=${uploadIdURI} data-fancybox="images" data-caption="Data Upload ID">` +
                    `       <img class="img-responsive img-thumbnail col-md-12" src="${uploadIdURI}" style="width: 100%;object-fit: cover;height: 150px;"></img>` +
                    `   </a>`+
                    `   <a class=" align-self-end btn btn-danger btn-block btn-sm col-md-12 mt-2 btn-del-process-cust-id" data-img-key="${idData}">`+
                    `       Delete`+
                    `   </a>`+
                    `</div>`
                }

                $('#uploadIdForm').append(uploadFormDownload);
            }

            $('.btn-del-process-cust-id').each(function(){
                $(this).on('click',function(){
                    uploadProcessIdBloob.splice($(this).data('img-key'),1);
                    $(this).parents('.div-image-process-cust-id').remove()
                    console.log(uploadProcessIdBloob)
                })
            })


            let availabilityStatus = $('input[name="availability"]:checked').val();

            let currentDate = new Date();
            let cDay = currentDate.getDate();
            let cMonth = currentDate.getMonth() + 1;
            let cYear = currentDate.getFullYear();
            let todayDate = cYear + "-" + cMonth + "-" + cDay;

            let updateActivationValidation = FormValidation.formValidation(updateForm, {
                fields: {
                    name: {
                        validators: {
                            notEmpty: {
                                message: "Activation Store Name is Required"
                            }
                        }
                    },
                    birthdate: {
                        validators: {
                            notEmpty: {
                                message: "Birthdate is Required"
                            }
                        }
                    },
                    passport: {
                        validators: {
                            notEmpty: {
                                message: "Passport Number is Required"
                            }
                        }
                    },
                    nationality: {
                        validators: {
                            notEmpty: {
                                message: "Nationality is Required"
                            }
                        }
                    },
                    activationStore: {
                        validators: {
                            notEmpty: {
                                message: "Activation is Required"
                            }
                        }
                    },
                    tempat_lahir: {
                        validators: {
                            notEmpty: {
                                message: "Place of Birth is Required"
                            }
                        }
                    },
                    availability: {
                        validators: {
                            notEmpty: {
                                message: "Availability is Required"
                            }
                        }
                    },
                    apFormUpload: {
                        validators: {
                            file: {
                                extension: 'jpeg,jpg,png,tif tiff,PDF',
                                type: 'image/jpeg,image/png,image/tiff,application/pdf',
                                message: 'Please choose an Image / PDF File'
                            }
                        }
                    },
                    // customerIdUpload: {
                    //     validators: {
                    //         file: {
                    //             extension: 'jpeg,jpg,png,tif tiff',
                    //             type: 'image/jpeg,image/png,image/tiff',
                    //             message: 'Please choose an Image File'
                    //         }
                    //     }
                    // },
                    msisdn_tw: {
                        validators: {
                            notEmpty: {
                                message: "MSISDN Taiwan is Required"
                            }
                        }
                    },
                    gender: {
                        validators: {
                            notEmpty: {
                                message: "Gender is Required"
                            }
                        }
                    },
                    id_type: {
                        validators: {
                            notEmpty: {
                                message: "Identity Type is Required"
                            }
                        }
                    },
                    id_number: {
                        validators: {
                            notEmpty: {
                                message: "Identity Number is Required"
                            }
                        }
                    },
                    expdate: {
                        validators: {
                            notEmpty: {
                                message: "Expiration Date is Required"
                            }
                        }
                    },
                    city: {
                        validators: {
                            notEmpty: {
                                message: "City is Required"
                            }
                        }
                    },
                    district: {
                        validators: {
                            notEmpty: {
                                message: "District is Required"
                            }
                        }
                    },
                    address: {
                        validators: {
                            notEmpty: {
                                message: "Address is Required"
                            }
                        }
                    },
                    // activationDate: {
                    //     validators: {
                    //         notEmpty: {
                    //             message: "Activation Date is Required"
                    //         }
                    //     }
                    // },
                    apFormLocation: {
                        validators: {
                            notEmpty: {
                                message: "AP. Form Location is Required"
                            }
                        }
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap()
                }
            });

            let updateProcessInActivation = FormValidation.formValidation(updateForm, {
                fields: {
                    name: {
                        validators: {
                            notEmpty: {
                                message: "Activation Store Name is Required"
                            }
                        }
                    },
                    birthdate: {
                        validators: {
                            notEmpty: {
                                message: "Birthdate is Required"
                            }
                        }
                    },
                    passport: {
                        validators: {
                            notEmpty: {
                                message: "Passport is Required"
                            }
                        }
                    },
                    nationality: {
                        validators: {
                            notEmpty: {
                                message: "Nationality is Required"
                            }
                        }
                    },
                    activationStore: {
                        validators: {
                            notEmpty: {
                                message: "Activation is Required"
                            }
                        }
                    },
                    pic: {
                        validators: {
                            notEmpty: {
                                message: "Pic is Required"
                            }
                        }
                    },
                    tempat_lahir: {
                        validators: {
                            notEmpty: {
                                message: "Place of Birth is Required"
                            }
                        }
                    },
                    availability: {
                        validators: {
                            notEmpty: {
                                message: "Availability is Required"
                            }
                        }
                    },
                    apFormUpload: {
                        validators: {
                            file: {
                                extension: 'jpeg,jpg,png,tif tiff,pdf',
                                type: 'image/jpeg,image/png,image/tiff,application/pdf',
                                message: 'Please choose an Image or PDF File'
                            }
                        }
                    },
                    // customerIdUpload: {
                    //     validators: {
                    //         file: {
                    //             extension: 'jpeg,jpg,png,tif tiff',
                    //             type: 'image/jpeg,image/png,image/tiff',
                    //             message: 'Please choose an Image File'
                    //         },
                    //     }
                    // },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap()
                }
            });

            const formActivatedParams = () => {
                // var uploadIdFile = $('#customerIdUpload')[0].files[0];

                var formActivated = new FormData();
                formActivated.append("nama", $('#name').val());
                formActivated.append("tgl_lahir", $('#birthdate').val());
                formActivated.append("negara", $('#nationality').val());
                formActivated.append("id_activation_store", $('#activationStore').val());

                // APPEND PASSPORT
                formActivated.append("id_type[]", "passport");
                formActivated.append("id_expire[]", ( $("[name='expdate_passport']").val() != '' ) ? $("[name='expdate_passport']").val() : '9999-31-12' );
                formActivated.append("nomor_identity[]", $('#passport').val());
                formActivated.append("nomor_identity_ori[]", $('#passport').val());

                let uploadmultiProcess = $("[name='uploadIdentities[0][]']")[0].files;
                if(uploadProcessIdBloob.length != 0 ) {
                    for(var i in uploadProcessIdBloob) {
                        formActivated.append("upload_identity[0][]", uploadProcessIdBloob[i]);
                    }
                }
                if (uploadmultiProcess.length > 0) {
                    for (let i = 0; i < uploadmultiProcess.length; i++) {
                        const multipleFileSet = uploadmultiProcess[i];
                        formActivated.append("upload_identity[0][]", multipleFileSet);
                    }
                }

                let id_typemulti = $("[name='id_type']");
                let id_expiremulti = $("[name='expdate']");
                let no_idmulti = $("[name='id_number']");

                for (var i = 0; i < id_typemulti.length; i++) {
                    if (id_typemulti[i].value != '' && id_expiremulti[i].value != '' && no_idmulti[i].value != '') {
                        let y = i + 1
                        let id_typeset = id_typemulti[i].value;
                        let id_expireset = id_expiremulti[i].value;
                        let no_idmultiset = no_idmulti[i].value;

                        formActivated.append("id_type[]", id_typeset);
                        formActivated.append("id_expire[]", id_expireset);
                        formActivated.append("nomor_identity[]", no_idmultiset);
                        formActivated.append("nomor_identity_ori[]", no_idmultiset);

                        // let uploadmultiProcess = $("[name='uploadIdentities[" + y + "][]']")[0].files;
                        // console.log("uploadActivatedIdBloobs")
                        // console.log(uploadActivatedIdBloobs)
                        // if(uploadActivatedIdBloobs[i]) {
                        //     for(var uaib in uploadActivatedIdBloobs[i]) {
                        //         formActivated.append("upload_identity[" + y + "][]", uploadActivatedIdBloobs[i][uaib]);
                        //     }
                        // }
                        // if (uploadmultiProcess.length > 0) {
                        //     for (let x = 0; x < uploadmultiProcess.length; x++) {
                        //         const multipleFileSet = uploadmultiProcess[x];
                        //         formActivated.append("upload_identity[" + y + "][]", multipleFileSet);
                        //     }
                        // }
                    }
                }
                formActivated.append("availibility", $('input[name="availability"]:checked').val());
                formActivated.append("information", $('#information').val());
                formActivated.append("tipe_number", "kartu_as");

                if($('input[name="availability"]:checked').val() == 'terminate') {
                    if (uploadProcessTermFormBloob.length != 0) {
                    for (var i in uploadProcessTermFormBloob) {
                            formActivated.append("termination_form[]", uploadProcessTermFormBloob[i]);
                        }
                    }
                    for (const tfF of $('#termFormUpload')[0].files) {
                        console.log(tfF)
                        formActivated.append("termination_form[]", tfF);
                    }
                }

                if(uploadProcessApfBloob.length != 0 ) {
                    for(var i in uploadProcessApfBloob) {
                        formActivated.append("ap_form[]", uploadProcessApfBloob[i]);
                    }
                }
                for(const apF of $('#apFormUpload')[0].files) {
                    formActivated.append("ap_form[]", apF);
                }


                formActivated.append("gender", $('input[name="gender"]:checked').val());
                formActivated.append("address_complete", $('#address').val());
                formActivated.append("other_phone", $('#other_phone').val());
                formActivated.append("id_city", $('#city').val());
                formActivated.append("id_district", $('#district').val());

                if ($('#activationDate').val() === '' || $('#activationDate').val() === null) {
                    formActivated.append("status", "process");
                } else {
                    formActivated.append("activation_date", $('#activationDate').val());
                    formActivated.append("status", "activated");
                }


                formActivated.append("id_customer", idCustomer);
                formActivated.append("apform_location", $('input[name="apFormLocation"]:checked').val());
                formActivated.append("registration_status", 'Y');
                if ($('input[name="availability"]:checked').val() == "terminate") {
                    formActivated.append("deactivation_time", todayDate);
                    formActivated.append("status_termination", "Y");
                } else {
                    formActivated.append("deactivation_time", '');
                    formActivated.append("status_termination", "N");
                }
                formActivated.append("msisdn_tw", msisdnTW.val());
                formActivated.append("msisdn_id", msisdnID.val());
                formActivated.append("id_customer_number", idCustomerNumber);
                formActivated.append("tempat_lahir", $('#nationality').val());
                return formActivated;
            }

            $('#updateActivated').on('click', (e) => {
                e.preventDefault();
                data = formActivatedParams();
                // logFormData(data)
                if ($('#activationDate').val() === '' || $('#activationDate').val() === null) {
                    return updateCustomer(data);
                } else {
                    updateActivationValidation.validate().then(function(status) {
                        if (status == "Valid") {
                            return updateCustomer(data);
                        } else {
                            return errorAlert();
                        }
                    });
                }
            });

            const updateCustomer = (formData) => {
                logFormData(formData);
                $.ajax({
                    url: "{{ config('app.api.url') }}update_customer",
                    method: "POST",
                    timeout: 0,
                    headers: {
                        "Authorization": authorization,
                    },
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: (res) => {
                        console.log(res)
                        return successAlert(res);
                    },
                    error: function(xhr, status, error) {
                        return failedAlert(xhr);
                    }
                })
            };
        });
    </script>
@endpush
