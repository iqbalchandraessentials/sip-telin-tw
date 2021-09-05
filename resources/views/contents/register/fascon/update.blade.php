{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<div class=" rounded p-10">
    <form method="POST" enctype="multipart/form-data" id="updateForm">
        @include('contents.register.shared.fascon.form-pending')

        @include('contents.register.shared.fascon.form-process')

        @if ($customerNumber['ap_form'] != null && $customerIdentity['upload_identity'] != null)
        @include('contents.register.shared.fascon.form-activation')
        @endif

        <div class="card-footer">
            <div class="float-right">
                @if ($customerNumber['ap_form'] != null && $customerIdentity['upload_identity'] != null)
                <button type="button" id="updateRegistered" class="btn btn-primary mr-2">Submit</button>
                @else
                <button type="button" id="updatePending" class="btn btn-primary mr-2">Submit</button>
                @endif
                <button type="button" class="btn btn-secondary" onclick="Previous();">Cancel</button>
            </div>
        </div>
    </form>
</div>

<div class="modal fade" id="modalImgPopup" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Image Upload Identity
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>

@endsection

{{-- Styles Section --}}
@push('styles')
{{-- --}}
<!-- zoom image -->
<style>
    figure.containerZoom {
        background-position: 50% 50%;
        position: relative;
        width: 100%;
        overflow: hidden;
        cursor: zoom-in;
        margin: 0
    }

    figure.containerZoom img {
        transition: opacity .5s;
        display: block;
        width: 100%
    }

    figure.containerZoom.active img {
        opacity: 0
    }
</style>
<link rel="stylesheet" href="{{ asset('css/pages/ultima/fileinput.css') }}">
@endpush


{{-- Scripts Section --}}
{{-- Scripts Section --}}
@push('scripts')
<script src="{{ asset('js/pages/crud/forms/widgets/bootstrap-datepicker.js') }}"></script>
{{-- page scripts --}}
<script src="{{ asset('js/pages/ultima/fileinput.js') }}"></script>
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
<script>
    $i = parseInt("{{sizeof($customerIdentity)}}");
    $(function() {
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
        // Birth Date
        $('#birthdate').datepicker({
            rtl: KTUtil.isRTL(),
            todayHighlight: true,
            format: 'yyyy-mm-dd',
            orientation: "bottom left",
            templates: arrows
        });

        $("input[name='arc_expired']").datepicker({
            rtl: KTUtil.isRTL(),
            todayHighlight: true,
            format: 'yyyy-mm-dd',
            orientation: "bottom left",
            templates: arrows
        });

    
        $("#arcFormUpload").fileinput({
            dropZoneEnabled: false,
            allowedFileExtensions: ["jpg", "jpeg", "png", "tif", "pdf"],
            showZoom: false,
            fileActionSettings: {
                showZoom: false
            }
        });

        $("#nhiFormUpload").fileinput({
            dropZoneEnabled: false,
            allowedFileExtensions: ["jpg", "jpeg", "png", "tif", "pdf"],
            showZoom: false,
            fileActionSettings: {
                showZoom: false
            }
        });


        let ap_formData = "{{ $customerNumber['ap_form'] }}";
        let uploadIdData = "{{ $customerIdentity[0]['upload_identity'] }}";
        let idCustomer = "{{ $customerNumber['id_customer'] }}";
        let idCustomerNumber = "{{ $customerNumber['id'] }}";
        // let apFormURI = "{{ config('app.api.asset') }}" + ap_formData;
        // let apFormDownload = `<a href=${apFormURI} target="_blank" download>${apFormURI}</a>`
        // $('#apformLink').append(apFormDownload);

        // let uploadIdURI = "{{ config('app.api.asset') }}" + uploadIdData;
        // let uploadFormDownload = `<a href=${uploadIdURI} target="_blank" download>${uploadIdURI}</a>`
        // $('#uploadIdForm').append(uploadFormDownload);
        // $('#cardImg').attr('style',`background: url(${uploadIdURI}) center center no-repeat; background-size: cover; height:250px; width:100%;padding: 10px; border: solid 3px #eee`);

        let availabilityStatus = $('input[name="availability"]:checked').val();

        let currentDate = new Date();
        let cDay = currentDate.getDate();
        let cMonth = currentDate.getMonth() + 1;
        let cYear = currentDate.getFullYear();
        let todayDate = cYear + "-" + cMonth + "-" + cDay;

        let updateForm = KTUtil.getById("updateForm");
        let updatePendingValidation = FormValidation.formValidation(updateForm, {
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
                pic: {
                    validators: {
                        notEmpty: {
                            message: "Pic is Required"
                        }
                    }
                },
                msisdn_kn: {
                    validators: {
                        notEmpty: {
                            message: "MSISDN KN is Required"
                        }
                    }
                },
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap: new FormValidation.plugins.Bootstrap()
            }
        });

        $('#updatePending').on('click', (e) => {
            e.preventDefault();

            var formPending = new FormData();
            formPending.append("nama", $('#name').val());
            formPending.append("tgl_lahir", $('#birthdate').val());
            formPending.append("negara", $('#nationality').val());

            formPending.append("id_type[]", 'passport');
            formPending.append("nomor_identity[]", $('input[name=passport_no]').val());
            formPending.append("id_expire[]", '{{ $customerNumber['customer_passpor_expired'] }}');
            formPending.append("nomor_identity_ori[]", '{{ $customerNumber['customer_nomor_identity_passpor'] }}');

            formPending.append("id_type[]", 'ARC');
            formPending.append("nomor_identity[]", $('input[name=arc_no]').val());
            formPending.append("id_expire[]", $('input[name=arc_expired]').val());
            formPending.append("nomor_identity_ori[]", '{{ $customerNumber['customer_nomor_identity_arc'] }}');

            var arcFiles = $("#arcFormUpload")[0].files
            if(arcFiles.length > 0) {
                for (let i = 0; i < arcFiles.length; i++) {
                    const multipleFileSet = arcFiles[i];
                    formPending.append("upload_identity[arc][]", multipleFileSet);
                }
            }


            formPending.append("id_type[]", 'NHI');
            formPending.append("nomor_identity[]", $('input[name=nhi_no]').val());
            formPending.append("id_expire[]", '9999-12-31');
            formPending.append("nomor_identity_ori[]", $('input[name=nhi_no]').data('ori'));

            var nhiFiles = $("#nhiFormUpload")[0].files
            if(nhiFiles.length > 0) {
                for (let i = 0; i < nhiFiles.length; i++) {
                    const multipleFileSet = nhiFiles[i];
                    formPending.append("upload_identity[nhi][]", multipleFileSet);
                }
            }

            // // Identity Multiple
            // let id_typemulti = $("[name='id_type']");
            // let id_expiremulti = $("[name='id_expire']");
            // let no_idmulti = $("#nomor_identity");
            // let uploadmulti = $("#customerIdUpload");
            // for (var i = 0; i < id_typemulti.length; i++) {
            //     let id_typeset = id_typemulti[i].value;
            //     if (id_expiremulti[i] != undefined) {
            //         let id_expireset = id_expiremulti[i].value;
            //         formPending.append("id_expire[]", id_expireset);
            //     }
            //     let no_idmultiset = no_idmulti[i].value;
            //     let fileUploadset = uploadmulti[i].files[0];

            //     formPending.append("id_type[]", id_typeset);
            //     formPending.append("nomor_identity[]", no_idmultiset);
            //     formPending.append("nomor_identity_ori[]", no_idmultiset);
            //     // Upload
            //     formPending.append("upload_identity[]", fileUploadset);
            // }



            formPending.append("tempat_lahir", $('#tempat_lahir').val());
            formPending.append("id_city", $("#city").val());
            formPending.append("id_district", $("#district").val());
            formPending.append("msisdn_kn", $('#msisdn_kn').val());
            formPending.append("msisdn_kn_ori", '{{ $customerNumber['msisdn_kn'] }}');
            formPending.append("status", $("input[name='status']:checked").val());
            var remaopt = $("#remarkOpt").val();
            var remark = remaopt;
            if (remaopt == 'other_remark') {
                remark = $("#otherRemark").val();
            }
            formPending.append("deskripsi", remark);



            // User ID and tipe
            formPending.append("tipe_number", "kartu_nusantara");
            formPending.append("id_customer_number", idCustomerNumber);
            formPending.append("id_customer", idCustomer);

            // debugger;
            updatePendingValidation.validate().then(function(status) {
                if (status == "Valid") {
                    return updateCustomer(formPending)
                } else {
                    return errorAlert();
                }
            });
        });

        let updateRegisteredValidation = FormValidation.formValidation(updateForm, {
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
                tempat_lahir: {
                    validators: {
                        notEmpty: {
                            message: "Place of Birth is Required"
                        }
                    }
                },
                information: {
                    validators: {
                        notEmpty: {
                            message: "Information is Required"
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

                msisdn_tw: {
                    validators: {
                        notEmpty: {
                            message: "MSISDN Taiwan is Required"
                        }
                    }
                },
                msisdn_id: {
                    validators: {
                        notEmpty: {
                            message: "MSISDN Indonesia is Required"
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
                other_phone: {
                    validators: {
                        notEmpty: {
                            message: "Other Phone is Required"
                        }
                    }
                },
                activationDate: {
                    validators: {
                        notEmpty: {
                            message: "Activation Date is Required"
                        }
                    }
                },
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

        $('#updateRegistered').on('click', (e) => {
            e.preventDefault();

            var apFormFile = $('#apFormUpload')[0].files[0];
            var uploadIdFile = $('#customerIdUpload')[0].files[0];

            var formActivated = new FormData();
            formActivated.append("nama", $('#name').val());
            formActivated.append("tgl_lahir", $('#birthdate').val());
            formActivated.append("negara", $('#nationality').val());
            formActivated.append("nomor_identity[]", $('#passport').val());
            formActivated.append("id_activation_store", $('#activationStore').val());
            formActivated.append("availibility", availabilityStatus);
            formActivated.append("information", $('#information').val());
            formActivated.append("tipe_number", "kartu_as");
            formActivated.append("status", "activated");
            formActivated.append("ap_form", apFormFile);
            formActivated.append("upload_identity[]", uploadIdFile);
            formActivated.append("gender", $('input[name="gender"]:checked').val());
            formActivated.append("id_city", $('#city').val());
            formActivated.append("id_district", $('#district').val());
            formActivated.append("address_complete", $('#address').val());
            formActivated.append("other_phone", $('#other_phone').val());
            formActivated.append("id_type[]", $('#id_type').val());
            formActivated.append("id_expire[]", $('#expdate').val());
            formActivated.append("activation_date", $('#activationDate').val());
            formActivated.append("id_customer", idCustomer);
            formActivated.append("apform_location", $('input[name="apFormLocation"]:checked').val());
            formActivated.append("registration_status", 'Y');
            if (availabilityStatus == "terminate") {
                formActivated.append("deactivation_time", todayDate);
                formActivated.append("status_termination", "Y");
            } else {
                formActivated.append("deactivation_time", '');
                formActivated.append("status_termination", "N");
            }
            formActivated.append("msisdn_tw", $('#msisdn_tw').val());
            formActivated.append("msisdn_id", $('#msisdn_id').val());
            // Isi dengan msisdn_tw bila tidak ada perubahan
            formActivated.append("msisdn_tw_ori", $('#msisdn_tw').val());
            formActivated.append("nomor_identity_ori[]", $('#id_number').val());
            formActivated.append("id_customer_number", idCustomerNumber);
            formActivated.append("tempat_lahir", $('#tempat_lahir').val());

            updateRegisteredValidation.validate().then(function(status) {
                if (status == "Valid") {
                    return updateCustomer(formActivated);
                } else {
                    return errorAlert();
                }
            });
        });

        const updateCustomer = (formData) => {
            logFormData(formData)
            $.ajax({
                url: "{{ config('app.api.url') }}update_customer_fascon",
                method: "POST",
                timeout: 0,
                headers: {
                    "Authorization": authorization,
                },
                processData: false,
                contentType: false,
                data: formData,
                success: (res) => {
                    return successAlert(res);
                },
                error: function(xhr, status, error) {
                    return failedAlert(xhr);
                }
            })
        };

        const successAlert = (res) => {
            swal.fire({
                text: `${res.status.msg}!`,
                icon: "success",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn font-weight-bold btn-light-primary"
                }
            }).then(function() {
                Previous();
            });
        };

        const failedAlert = (xhr) => {
            var err = JSON.parse(xhr.responseText);
            swal.fire({
                text: `Sorry, ${err.status.msg}, please try again.`,
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn font-weight-bold btn-light-primary"
                }
            }).then(function() {
                KTUtil.scrollTop();
            });
        };

        const errorAlert = () => {
            swal.fire({
                text: "Sorry, looks like there are some errors detected, please try again.",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn font-weight-bold btn-light-primary"
                }
            }).then(function() {
                KTUtil.scrollTop();
            });
        };
    });


    function openModalPhoto(url) {
        $("#modalImgPopup").modal('show');
        $("#modalImgPopup .modal-body").attr('style',
            `cursor:pointer;margin-top:25px;background: url(${url}) center center no-repeat; background-size: cover; height:380px; width:100%;`
        )
    }

    function addRow() {
        var no = $i + 1;
        var uploadUrl = 'https://sip.telin.tw/';
        var html = `<div class="card card-custom card-border mb-10" id="rowId${no}">
                <div class="card-header">
                    <div class="card-title">
                        &nbsp;
                    </div>
                    <div class="card-title pull-right">
                        <button class="btn btn-sm btn-danger" onclick="deleteRowId(${no})"><i class="flaticon2-trash"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="labelType">ID Type</label>
                                <select class="form-control selectpickercustom" id="id_type${no}" name="id_type">
                                    <option value="arc">ARC</option>
                                    <option value="nhi">NHI</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="labelType">ID No.</label>
                                <input class="form-control" type="text" id="nomor_identity${no}" name="nomor_identity" />
                            </div>

                            <div class="form-group">
                                <label for="labelType">Passport No.</label>
                                <input class="form-control" type="text" id="passport${no}" name="nomor_identity" />
                            </div>


                            <div class="form-group">
                                <label for="labelType">Date of Issue</label>
                                <input class="form-control" type="date"  id="id_expire${no}" name="id_expire"/>
                            </div>

                            <div class="form-group">
                                <label for="labelType">ARC Expired Date</label>
                                <input class="form-control" type="date"  id="nomor_identity${no}" name="id_expire"/>
                            </div>

                            <div class="form-group">
                                <label>Customer Identity</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customerIdUpload${no}" name="customerIdUpload" />
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                <span class="text-mute">
                                    *) upload new file(s)
                                </span>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div id="cardImg" onclick="openModalPhoto('${uploadUrl}')" style="cursor:pointer;margin-top:25px;background: url(${uploadUrl}) center center no-repeat; background-size: cover; height:280px; width:100%;padding: 10px; border: solid 3px #eee">
                            </div>
                        </div>
                    </div>
                </div>
            </div>`;
        $("#rowMultiple").append(html);
        setTimeout(() => {
            $('html, body').animate({
                scrollTop: $("#rowId" + no).offset().top
            }, 2000);
        }, 200);
        $i += 1;
    }

    function deleteRowId(id) {
        $("#rowId" + id).remove();
        toastr.success("Success delete section identity", "Success");
    }
</script>


<script>
    (function($) {
        // Thanks to Mozilla for this polyfill
        // find out more on - https://developer.mozilla.org/en-US/docs/Web/API/ChildNode/replaceWith
        function ReplaceWithPolyfill() {
            'use-strict'; // For safari, and IE > 10

            var parent = this.parentNode,
                i = arguments.length,
                currentNode;
            if (!parent) return;
            if (!i) // if there are no arguments
                parent.removeChild(this);

            while (i--) {
                // i-- decrements i and returns the value of i before the decrement
                currentNode = arguments[i];

                if (typeof currentNode !== 'object') {
                    currentNode = this.ownerDocument.createTextNode(currentNode);
                } else if (currentNode.parentNode) {
                    currentNode.parentNode.removeChild(currentNode);
                } // the value of "i" below is after the decrement


                if (!i) // if currentNode is the first argument (currentNode === arguments[0])
                    parent.replaceChild(currentNode, this);
                else // if currentNode isn't the first
                    parent.insertBefore(currentNode, this.previousSibling);
            }
        }

        if (!Element.prototype.replaceWith) {
            Element.prototype.replaceWith = ReplaceWithPolyfill;
        }

        if (!CharacterData.prototype.replaceWith) {
            CharacterData.prototype.replaceWith = ReplaceWithPolyfill;
        }

        if (!DocumentType.prototype.replaceWith) {
            DocumentType.prototype.replaceWith = ReplaceWithPolyfill;
        }

        const imageObj = {};

        $.fn.imageZoom = function(options) {
            // Default settings for the zoom level
            let settings = $.extend({
                zoom: 150
            }, options); // Main html template for the zoom in plugin

            imageObj.template = `
			<figure class="containerZoom" style="background-image:url('${$(this).attr("src")}'); background-size: ${settings.zoom}%;">
				<img id="imageZoom" src="${$(this).attr("src")}" alt="${$(this).attr("alt")}" />
			</figure>
		`; // Where all the magic happens, This will detect the position of your mouse
            // in relation to the image and pan the zoomed in background image in the
            // same direction

            function zoomIn(e) {
                let zoomer = e.currentTarget;
                let x, y, offsetX, offsetY;
                e.offsetX ? offsetX = e.offsetX : offsetX = e.touches[0].pageX;
                e.offsetY ? offsetY = e.offsetY : offsetY = e.touches[0].pageX;
                x = offsetX / zoomer.offsetWidth * 100;
                y = offsetY / zoomer.offsetHeight * 100;
                $(zoomer).css({
                    "background-position": `${x}% ${y}%`
                });
            } // Main function to attach all events after replacing the image tag with
            // the main template code


            function attachEvents(container) {
                container = $(container);
                container.on('click', function(e) {
                    if ("zoom" in imageObj == false) {
                        // zoom is not defined, let define it and set it to false
                        imageObj.zoom = false;
                    }

                    if (imageObj.zoom) {
                        imageObj.zoom = false;
                        $(this).removeClass('active');
                    } else {
                        imageObj.zoom = true;
                        $(this).addClass('active');
                        zoomIn(e);
                    }
                });
                container.on('mousemove', function(e) {
                    imageObj.zoom ? zoomIn(e) : null;
                });
                container.on('mouseleave', function() {
                    imageObj.zoom = false;
                    $(this).removeClass('active');
                });
            }

            let newElm;
            // console.log(this[0].nodeName);

            // if (this[0].nodeName === "IMG") {
            //     newElm = $(this).replaceWith(String(imageObj.template));
            //     attachEvents($('.containerZoom')[$('.containerZoom').length - 1]);
            // } else {
            //     newElm = $(this);
            // } 
            // return updated element to allow for jQuery chained events


            return newElm;
        };
    })(jQuery);

    //
    var $ = jQuery.noConflict();
    $(document).ready(function() {
        // Image zoom plugin code
        var zoomImage = $('.imageZoom');
        var zoomImageExtra = $('.imageZoomExtra');
        var zoomImagePlus = $('.imageZoomExtraPlus');
        var zoomImages = $('.zoom-images');
        // zoomImage.imageZoom();
        // zoomImageExtra.imageZoom({zoom : 200});
        zoomImagePlus.imageZoom({
            zoom: 200
        });
        zoomImages.each(function() {
            $(this).imageZoom();
        });
    });
</script>

@endpush
