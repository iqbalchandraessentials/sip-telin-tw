<div class="card card-custom card-border mb-8">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon">
                <i class="flaticon2-plus-1 text-primary"></i>
            </span>
            <h3 class="card-label">
                Form Process :
            </h3>
        </div>
    </div>
    <div class="card-body">
        <div class="col-8">
            <div class="row mb-10 mt-5 form-group formTerminate {{ ($customerNumber['availibility'] != "terminate") ? 'd-none' : ''}} ">
                <label for="nama" class="col-sm-3 col-form-label text-right">
                    Termination Form:
                </label>
                <div class="col-sm-9">
                    @if ($customerNumber['termination_form'] != null)
                    <div id="termformLink" class="mb-2 row"></div>
                    @endif
                    <input id="termFormUpload" name="termination_form[]" type="file" value="{{ $customerNumber['termination_form'] }}" data-show-upload="false" multiple="multiple">
                    <span class="text-mute">
                        *) if upload new file, the old file will be replaced!
                    </span>
                </div>
            </div>
            <div class="row mb-10 form-group">
                <label for="nama" class="col-sm-3 col-form-label text-right">
                    AP Form :
                </label>
                <div class="col-sm-9">
                    @if ($customerNumber['ap_form'] != null)
                    <div id="apformLink" class="mb-2 row"></div>
                    @endif
                    <input id="apFormUpload" type="file" name="filesAPForm[]" multiple="multiple" data-show-upload="false">
                    <span class="text-mute">
                        *) if upload new file, the old file will be replaced!
                    </span>
                </div>
            </div>
            <div class="row mb-3 form-group">
                <label for="nama" class="col-sm-3 col-form-label text-right">
                    Customer Identity :
                </label>
                <div class="col-sm-9">
                    @if (end($identities)['upload_identity'] != null)
                    <div id="uploadIdForm" class="row mb-2"></div>
                    @endif
                    <input class="upload-identities" type="file" name="uploadIdentities[0][]" data-show-upload="false" data-preview-file-type="any" data-preview-file-icon="" multiple="multiple">
                    <span class="text-mute">
                        *) upload new file(s), means you are adding file in DB
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
{{-- <link rel="stylesheet" href="{{ asset('css/pages/ultima/image-uploader.css') }}"> --}}
<link rel="stylesheet" href="{{ asset('css/pages/ultima/fileinput.css') }}">
@endpush

@push('scripts')
{{-- <script src="{{ asset('js/pages/ultima/image-uploader.js') }}"></script> --}}
<script src="{{ asset('js/pages/ultima/fileinput.js') }}"></script>


<script>
    $("#termFormUpload").fileinput({
        dropZoneEnabled: false,
        allowedFileExtensions: ["jpg", "jpeg", "png", "tif", "pdf"],
        showZoom: false,
        fileActionSettings: {
            showZoom: false
        }
    });
    $("#apFormUpload").fileinput({
        dropZoneEnabled: false,
        allowedFileExtensions: ["jpg", "jpeg", "png", "tif", "pdf"],
        showZoom: false,
        fileActionSettings: {
            showZoom: false
        }
    });

    $('.upload-identities').each(function(index) {
        $(this).fileinput({
            dropZoneEnabled: false,
            allowedFileExtensions: ["jpg", "jpeg", "png", "tif", "pdf"],
            showZoom: false,
            fileActionSettings: {
                showZoom: false
            }
        })
    })

    $('.btn-del-process-cust-id').each(function() {
        $(this).on('click', function() {
            uploadProcessIdBloob.splice($(this).data('img-key'), 1);
            $(this).parents('.div-image-process-cust-id').remove()
            console.log(uploadProcessIdBloob)
        })
    })

    let idCustomer = "{{ $customerNumber['id_customer'] }}";
    let idCustomerNumber = "{{ $customerNumber['id'] }}";
    let updateForm = KTUtil.getById("updateForm");

    let updateProcessValidation = FormValidation.formValidation(updateForm, {
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
            //     },
            // },
        },
        plugins: {
            trigger: new FormValidation.plugins.Trigger(),
            bootstrap: new FormValidation.plugins.Bootstrap()
        }
    });

    var formProcess = new FormData();
    const formProcessParams = () => {
        formProcess = new FormData();
        var termFormFile = $('#termFormUpload')[0].files;
        var apFormFile = $('#apFormUpload')[0].files;
        var idFiles = $("[name='uploadIdentities[0][]']")[0].files;

        var status = 'lead'
        if (apFormFile || idFiles.length > 0) {
            status = 'process'
        }

        if ("{{ $customer['status'] }}" == 'process') {
            status = 'process'
        }

        formProcess.append("nama", $('#name').val());
        formProcess.append("tgl_lahir", $('#birthdate').val());
        formProcess.append("negara", $('#nationality').val());
        // formProcess.append("nomor_identity[]", $('#passport').val());

        formProcess.append("id_type[]", "passport");
        formProcess.append("id_expire[]", '9999-999-999');
        formProcess.append("nomor_identity[]", $('#passport').val());
        formProcess.append("nomor_identity_ori[]", $('#passport').val());

        formProcess.append("id_activation_store", $('#activationStore').val());
        formProcess.append("availibility", $('input[name="availability"]:checked').val());
        formProcess.append("information", $('#information').val());
        formProcess.append("tipe_number", "kartu_as");
        formProcess.append("status", status);

        if($('input[name="availability"]:checked').val() == 'terminate') {
            if (uploadProcessTermFormBloob.length != 0) {
            for (var i in uploadProcessTermFormBloob) {
                    formProcess.append("termination_form[]", uploadProcessTermFormBloob[i]);
                }
            }
            for (const tfF of termFormFile) {
                console.log(tfF)
                formProcess.append("termination_form[]", tfF);
            }
        }

        if (uploadProcessApfBloob.length != 0) {
            for (var i in uploadProcessApfBloob) {
                formProcess.append("ap_form[]", uploadProcessApfBloob[i]);
            }
        }
        for (const apF of apFormFile) {
            console.log(apF)
            formProcess.append("ap_form[]", apF);
        }

        getUploadIdentities();

        formProcess.append("id_customer", idCustomer);
        formProcess.append("id_customer_number", idCustomerNumber);
        // formProcess.append("nomor_identity_ori[]", $('#passport').val());
        // formProcess.append("id_type[]", "passport");
        formProcess.append("tempat_lahir", $('#nationality').val());

        return formProcess;
    }

    const getUploadIdentities = () => {
        if (uploadProcessIdBloob.length != 0) {
            for (var i in uploadProcessIdBloob) {
                formProcess.append("upload_identity[0][]", uploadProcessIdBloob[i]);
            }
        }
        let uploadmulti = $("[name='uploadIdentities[0][]']")[0].files;
        for (let i = 0; i < uploadmulti.length; i++) {
            const multipleFileSet = uploadmulti[i];
            console.log(multipleFileSet)
            formProcess.append("upload_identity[0][]", multipleFileSet);
        }
    }

    $('#updateProcess').on('click', (e) => {
        e.preventDefault();
        data = formProcessParams();
        updateProcessValidation.validate().then(function(status) {
            if (status == "Valid") {
                return updateCustomerProcess(data)
            } else {
                return errorAlert();
            }
        });
    });

    const updateCustomerProcess = (formData) => {
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
                return successAlert(res);
            },
            error: function(xhr, status, error) {
                return failedAlert(xhr);
            }
        })
    };
</script>
@endpush
