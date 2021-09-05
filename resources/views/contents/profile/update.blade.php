{{-- Extends layout --}}
@extends('layout.default')

@push('styles')
    <link rel="stylesheet" href="{{ asset('plugins/custom/formvalidation/dist/css/formValidation.min.css') }}">
@endpush

{{-- Content --}}
@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Update Your Profile Information</h3>
                    </div>
                    <div class="card-toolbar">
                        <button type="button" class="btn btn-success mr-2" id="submitUpdate">Update Changes</button>
                        <button type="reset" class="btn btn-secondary">Cancel</button>
                    </div>
                </div>
                <form class="form" id="update-profile">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-alert">Name</label>
                            <div class="col-lg-9 col-xl-6">
                                <input type="text" class="form-control form-control-lg form-control-solid mb-2"
                                    value="{{ Session::get('user')[0]->getAuthIdentifierName() }}"
                                    placeholder="Input Your Name" name="nama" id="nama" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-alert">Current Password</label>
                            <div class="col-lg-9 col-xl-6">
                                <input type="password" class="form-control form-control-lg form-control-solid mb-2" value=""
                                    placeholder="Current password" id="currentPassword" name="currentPassword"
                                    autocomplete="off" />
                                {{-- <a href="#" class="text-sm font-weight-bold">Forgot password ?</a> --}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-alert">New Password</label>
                            <div class="col-lg-9 col-xl-6">
                                <input type="password" class="form-control form-control-lg form-control-solid" value=""
                                    placeholder="New password" name="newPassword" id="newPassword" autocomplete="off" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-alert">Verify Password</label>
                            <div class="col-lg-9 col-xl-6">
                                <input type="password" class="form-control form-control-lg form-control-solid" value=""
                                    placeholder="Verify password" name="verifyPassword" id="verifyPassword"
                                    autocomplete="off" />
                            </div>
                        </div>
                    </div>
                </form>
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

    {{-- page scripts --}}
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script>
        "use strict";
        var updateProfile = (function() {
            // Class Definition
            var _handleUpdateProfile = function(e) {
                var validation;
                var form = KTUtil.getById("update-profile");

                validation = FormValidation.formValidation(form, {
                    fields: {
                        nama: {
                            validators: {
                                notEmpty: {
                                    message: "Fulname is required"
                                }
                            }
                        },
                        currentPassword: {
                            validators: {
                                notEmpty: {
                                    message: "Current password is required"
                                },
                                identical: {
                                    compare: atob(encodedPassword),
                                    message: "The password and its confirm are not the same"
                                }
                            }
                        },
                        newPassword: {
                            validators: {
                                notEmpty: {
                                    message: "New password is required"
                                }
                            }
                        },
                        verifyPassword: {
                            validators: {
                                notEmpty: {
                                    message: "The password confirmation is required"
                                },
                                identical: {
                                    compare: function() {
                                        return form.querySelector('[name="newPassword"]')
                                            .value;
                                    },
                                    message: "The password and its confirm are not the same"
                                }
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        // defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                        bootstrap: new FormValidation.plugins.Bootstrap()
                    }
                });

                $("#submitUpdate").on("click", function(e) {
                    e.preventDefault();

                    validation.validate().then(function(status) {
                        if (status == "Valid") {
                            updatePost();
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
                    _handleUpdateProfile();
                }
            };
        })();

        function updatePost() {
            let data = {
                'email': '{{ Session::get('user')[0]->attributes['email'] }}',
                'username': '{{ Session::get('user')[0]->attributes['username'] }}',
                'password': $('#newPassword').val(),
                'password2': $('#verifyPassword').val(),
                'nama': $('#nama').val(),
                'image': '',
                'posisi': '{{ Session::get('user')[0]->attributes['posisi'] }}',
                'status': '{{ Session::get('user')[0]->attributes['status'] }}',
            };
            $.ajax({
                type: "POST",
                url: "{{ config('app.api.url') }}update_user",
                headers: {
                    "Authorization": authorization,
                },
                data: data,
                dataType: 'JSON',
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
                    });
                },
                error: function(jqXhr, textStatus, errorThrown) {
                    console.log(errorThrown);
                }
            });
        }

        // Class Initialization
        jQuery(document).ready(function() {
            updateProfile.init();
        });

    </script>
@endpush
