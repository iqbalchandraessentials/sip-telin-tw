{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Create Lead Data</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form class="form col-8" novalidate="novalidate" id="create-lead">
                        <div class="row mb-3 form-group">
                            <label for="nama" class="col-sm-3 col-form-label text-right"></label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" id="quick-information" placeholder="Paste Quick Information Here" style="text-transform: uppercase" />
                            </div>
                        </div>
                        <div class="row mb-3 form-group">
                            <label for="nama" class="col-sm-3 col-form-label text-right">
                                Name :
                            </label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" id="name" name="name" placeholder="Input Name Here" style="text-transform: uppercase" />
                            </div>
                        </div>
                        <div class="row mb-3 form-group">
                            <label for="nama" class="col-sm-3 col-form-label text-right">
                                Birthdate :
                            </label>
                            <div class="col-sm-9">
                                <div class="input-group date">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="flaticon-calendar"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="YYYY-MM-DD" name="birthdate"
                                        id="birthdate" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3 form-group">
                            <label for="nama" class="col-sm-3 col-form-label text-right">
                                Passport :
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="passport" name="passport" placeholder="Input Passport Here" style="text-transform: uppercase" />
                            </div>
                        </div>
                        <div class="row mb-3 form-group">
                            <label for="nama" class="col-sm-3 col-form-label text-right">
                                Nationality :
                            </label>
                            <div class="col-sm-9">
                                <select class="form-control selectpicker" id="nationality" name="nationality" title="Select Nationality">
                                    <option value="indonesia">Indonesia</option>
                                    <option value="philippines">Philippines</option>
                                    <option value="thailand">Thailand</option>
                                    <option value="vietnam">Vietnam</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3 form-group">
                            <label for="nama" class="col-sm-3 col-form-label text-right">
                                Activation Store :
                            </label>
                            <div class="col-sm-9">
                                <select class="form-control select2 col-sm-9" id="activation_store" name="activation_store" data-live-search="true" title="Nothing Selected">
                                    {{--  --}}
                                </select>
                                <button class="btn btn-success btn-sm ml-5" type="button" data-toggle="modal" data-target="#add-activation">
                                    <i class="flaticon2-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="row mb-3 form-group">
                            <label for="nama" class="col-sm-3 col-form-label text-right">
                                PIC :
                            </label>
                            <div class="col-sm-9">
                                <select class="form-control selectpicker" id="pic" name="pic" disabled="disabled">
                                    <option value="{{ Session::get('user')[0]->getAuthIdentifierName() }}">
                                        {{ Session::get('user')[0]->getAuthIdentifierName() }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3 form-group">
                            <label for="nama" class="col-sm-3 col-form-label text-right">
                                Availability :
                            </label>
                            <div class="col-sm-9">
                                <div class="radio-list">
                                    <label class="radio">
                                        <input type="radio" name="availability" id="ok_new" value="ok_new"
                                            checked="checked" />
                                        <span></span>OK (New)</label>
                                    <label class="radio">
                                        <input type="radio" name="availability" id="ok_former" value="ok_former" />
                                        <span></span>OK (Former T-Star Subscriber)</label>
                                    <label class="radio">
                                        <input type="radio" name="availability" id="terminate" value="terminate" />
                                        <span></span>Terminate
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="availability" id="not_ok" value="not_ok" />
                                        <span></span>NOT OK
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3 form-group">
                            <label for="nama" class="col-sm-3 col-form-label text-right">
                                Information :
                            </label>
                            <div class="col-sm-9">
                                <textarea class="form-control" placeholder="Input Other Information" id="information" name="information" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="float-right">
                                <button type="button" id="submitLead" class=" btn btn-primary mr-2">Submit</button>
                                <button type="button" class="btn btn-secondary" onclick="Previous()">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add-activation" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add-activation">
                        Adding Activation Store
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form" method="POST" id="activationForm">
                        @csrf
                        <div class="row mb-3 form-group">
                            <label for="nama" class="col-sm-2 col-form-label text-right">
                                Name :
                            </label>
                            <div class="col-sm-4">
                                <select class="form-control selectpicker" id="storeType" name="storeType">
                                    <option value="NA" default> - Select -</option>
                                    <option value="DIRECT">DIRECT</option>
                                    <option value="ASPROF">ASPROF</option>
                                    <option value="ASPROT">ASPROT</option>
                                    <option value="TOKO">TOKO</option>
                                    <option value="INDEX">INDEX</option>
                                    <option value="PRE-EMPTIVE">PRE-EMPTIVE</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="nameStore" name="nameStore" />
                            </div>
                        </div>

                        <div class="row mb-3 form-group">
                            <label for="nama" class="col-sm-2 col-form-label text-right">
                                City :
                            </label>
                            <div class="col-sm-10">
                                <select class="form-control select2" data-live-search="true" name="district" id="district">
                                    <option value=""> Select City </option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3 form-group">
                            <label for="nama" class="col-sm-2 col-form-label text-right">
                                District :
                            </label>
                            <div class="col-sm-10">
                                <select class="form-control select2" data-live-search="true" name="city" id="city">
                                    {{--  --}}
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3 form-group">
                            <label for="nama" class="col-sm-2 col-form-label text-right">
                                Address :
                            </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Input Address" />
                            </div>
                        </div>
                        <div class="row mb-3 form-group">
                            <label for="nama" class="col-sm-2 col-form-label text-right">
                                Phone Number :
                            </label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="la la-phone"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Input Phone Number"name="phone" id="phone" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3 form-group">
                            <label for="nama" class="col-sm-2 col-form-label text-right">
                                Contact Person :
                            </label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="la la-user-o"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Input Contact Person"
                                        name="contact" id="contact" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3 form-group">
                            <label for="nama" class="col-sm-2 col-form-label text-right">
                                Master Store :
                            </label>
                            <div class="col-sm-10">
                                <select class="form-control" id="master-store" name="master-store">
                                    <option value="">-- Select Value --</option>
                                    <option value="columbia">Columbia</option>
                                    <option value="index">Index</option>
                                    <option value="tenten">Tenten</option>
                                    <option value="global">Global</option>
                                    <option value="others">Others</option>
                                    <option value="indosuara">Indosuara</option>
                                    <option value="Ana sanchong">Ana Sanchong</option>
                                    <option value="Telkom (ds)">Telkom (DS)</option>
                                    <option value="consignment">Consignment</option>
                                    <option value="grapari">GraPARI</option>
                                    <option value="Nan ping">Nan Ping</option>
                                </select>
                            </div>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary font-weight-bold" id="submitStore">Save changes</button>
                </div>
            </div>
        </div>
    </div>

@endsection

{{-- Styles Section --}}
@push('styles')
    {{--  --}}
@endpush


{{-- Scripts Section --}}
@push('scripts')
    <script src="{{ asset('js/pages/crud/forms/widgets/bootstrap-datepicker.js') }}"></script>

    {{-- page scripts --}}
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script>
        "use strict";

        let KTBootstrapDatepicker = function() {
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

            return {
                // public functions
                init: function() {
                    // Birth Date
                    $('#birthdate').datepicker({
                        rtl: KTUtil.isRTL(),
                        todayHighlight: true,
                        format: 'yyyy-mm-dd',
                        orientation: "bottom left",
                        templates: arrows
                    });

                    // Alert
                    $('#alert').datepicker({
                        rtl: KTUtil.isRTL(),
                        todayHighlight: true,
                        orientation: "bottom left",
                        templates: arrows
                    });
                }
            };
        }();
        let createLead = (function() {
            let _handleCreateLead = function(e) {
                let addLeadValidation;
                let form = KTUtil.getById("create-lead");

                addLeadValidation = FormValidation.formValidation(form, {
                    fields: {
                        name: {
                            validators: {
                                notEmpty: {
                                    message: "Name is required"
                                }
                            }
                        },
                        birthdate: {
                            validators: {
                                notEmpty: {
                                    message: "Birthdate is required"
                                },
                                date: {
                                    format: 'YYYY-MM-DD',
                                    message: "Date format is Invalid"
                                }
                            }
                        },
                        passport: {
                            validators: {
                                notEmpty: {
                                    message: "Number Identity is required"
                                }
                            }
                        },
                        nationality: {
                            validators: {
                                notEmpty: {
                                    message: "Nationality is required"
                                }
                            }
                        },
                        tempat_lahir: {
                            validators: {
                                notEmpty: {
                                    message: "Place of Birth is required"
                                }
                            }
                        },
                        activation_store: {
                            validators: {
                                notEmpty: {
                                    message: "Activation Store is required"
                                }
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap()
                    }
                });

                $("#submitLead").on("click", function(e) {
                    e.preventDefault();

                    addLeadValidation.validate().then(function(status) {
                        if (status == "Valid") {
                            var data = new FormData();
                            data.append('nama', $('#name').val());
                            data.append('tgl_lahir', $('#birthdate').val());
                            data.append('negara', $('#nationality').val());
                            data.append('nomor_identity[]', $('#passport').val());
                            data.append('id_activation_store', $('#activation_store').val());
                            data.append('availibility', $('input[name="availability"]:checked')
                                .val());
                            data.append('information', $('#information').val());
                            data.append('status', 'lead');
                            data.append('id_type[]', 'passport');
                            data.append('tipe_number', 'kartu_as');
                            data.append("tempat_lahir", $('#tempat_lahir').val());
                            $.ajax({
                                url: "{{ config('app.api.url') }}create_customer",
                                type: "post",
                                headers: {
                                    "Authorization": authorization,
                                },
                                data: data,
                                contentType: false,
                                processData: false,
                                success: function(result) {
                                    swal.fire({
                                        text: `${result.status.msg}!`,
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn font-weight-bold btn-light-primary"
                                        }
                                    }).then(function() {
                                        KTUtil.scrollTop();
                                        Previous();
                                    });
                                },
                                error: function(xhr, status, error) {
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
                                }
                            });
                        } else {
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
                        }
                    });
                });

                let activationForm = KTUtil.getById("activationForm");
                let addActivationValidation = FormValidation.formValidation(activationForm, {
                    fields: {
                        nameStore: {
                            validators: {
                                notEmpty: {
                                    message: "Activation Store Name is Required"
                                }
                            }
                        },
                        contact: {
                            validators: {
                                notEmpty: {
                                    message: "Contact Name  is Required"
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
                        phone: {
                            validators: {
                                notEmpty: {
                                    message: "Phone Number is Required"
                                }
                            }
                        },
                        storeType: {
                            validators: {
                                notEmpty: {
                                    message: "Store Type is Required"
                                }
                            }
                        },
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap()
                    }
                });

                $('#submitStore').on('click', (e) => {
                    e.preventDefault();

                    addActivationValidation.validate().then(function(status) {
                        if (status == "Valid") {
                            $.ajax({
                                type: 'post',
                                url: "{{ url('data-master/store') }}",
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                        'content')
                                },
                                data: {
                                    "nama": $('#nameStore').val(),
                                    "contact_person": $('#contact').val(),
                                    "id_city": $('#city').val(),
                                    "id_district": $('#district').val(),
                                    "master_store": $('#master-store').val(),
                                    "nomor_telp": $('#phone').val(),
                                    "status": "Y",
                                    "store_type": $('#storeType').val()
                                },
                                success: (result) => {
                                    swal.fire({
                                        text: `${result.status.msg}!`,
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn font-weight-bold btn-light-primary"
                                        }
                                    }).then(function() {
                                        activationForm.reset();
                                        $('.modal').modal('hide');
                                        $('.rmInUpdate').remove();
                                        getActivationStore();
                                    });
                                },
                                error: (xhr, status, error) => {
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
                                }
                            })
                        } else {
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
                        }
                    });
                });
            };

            return {
                init: function() {
                    _handleCreateLead();
                }
            };
        })();

        jQuery(document).ready(function() {
            KTBootstrapDatepicker.init();
            createLead.init();

            $('#activation_store').select2({
                placeholder: "Select Store",
                allowClear: true
            });

            let selectCity = $('#city').select2({
                placeholder: "Select City",
                width: 'resolve'
            }).on('change', () => {
                let cityValue = selectCity.val();
                selectDistrict.val(null);
                return getDistrict(cityValue);
            });

            let selectDistrict = $('#district').select2({
                placeholder: "Select City First",
            });

            $('#add-activationBtn').on('click', () => {
                $.ajax({
                    type: "GET",
                    url: "{{ route('data-master.area.city') }}",
                    success: function(result) {
                        for (let i = 0; i < result.length; i++) {
                            let option = new Option(result[i].city, result[i].id);
                            selectCity.append(option);
                        }
                    }
                });
            });

            const getDistrict = (value) => {
                $.ajax({
                    type: "GET",
                    url: "{{ url('data-master/area/district') }}" + '/' + value,
                    success: function(result) {
                        selectDistrict.empty();
                        for (let i = 0; i < result.length; i++) {
                            let option = new Option(result[i].district, result[i].id);
                            selectDistrict.append(option);
                        }
                    }
                });
            }

            getActivationStore();
        });
        let masterStore = $('#master-store');
        const getActivationStore = () => {
            $.ajax({
                type: "GET",
                url: "{{ route('data-master.stores') }}",
                success: function(result) {
                    let data = result.data;
                    let option;
                    for (let i = 0; i < data.length; i++) {
                        option =
                            `<option class="rmInUpdate" value="${data[i].id}">${data[i].nama}</option>`;
                        // masterStore.append(option);
                        $('#activation_store').append(option);
                    }
                }
            });
        };

        function addSpace(main_string, instring, pos) {
            if (typeof(pos) == "undefined") {
                pos = 0;
            }
            if (typeof(instring) == "undefined") {
                instring = '';
            }
            return main_string.slice(0, pos) + instring + main_string.slice(pos);
        };

        let quickInformation = $('#quick-information');
        quickInformation.on('input paste', function() {
            var quickcontent = $(this).val();
            if (quickcontent != '') {
                var tmp = quickcontent.split(' ');
                if (tmp != null) {
                    $("#passport").val(tmp[0]);
                }
                var tmp = quickcontent.match(/\b[^\d\W]+\b/gm);
                if (tmp != null) {
                    $("#name").val(tmp.join(" "));
                }
                var tmp = quickcontent.match(/(\d){4}(\d){2}(\d){2}/ig);
                if (tmp != null) {
                    let dd = tmp[0].replace(/(\d{4})(\d{2})(\d{2})/ig, "$1-$2-$3");
                    $("#birthdate").val(dd);
                }
            }
        });

    </script>
@endpush
