{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    {{-- begin::Card --}}
    <div class="card card-custom">
        <div class="card-header flex-wrap py-3">
            <div class="card-title">
                <h4>Activation Store List</h4>
            </div>
            <div class="card-toolbar">
                {{-- begin::Button --}}
                <button type="button" data-toggle="modal" data-target="#add-activation"
                    class="btn btn-success font-weight-bolder mr-8" id="add-activationBtn">
                    @addSvg
                    Add Activation Store
                </button>
                {{-- end::Button --}}
                {{-- begin::Button --}}
                {{-- <a href="#" class="btn btn-primary font-weight-bolder">
                    @downloadSvg
                    CSV Download
                </a> --}}
                {{-- end::Button --}}
            </div>
        </div>
        <div class="card-body">
            {{-- begin: Datatable --}}
            <table class="table table-bordered table-checkable" id="activationStore-table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Act. Name</th>
                        <th>Person</th>
                        <th>Phone</th>
                        <th>City</th>
                        <th>District</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
            {{-- end: Datatable --}}
        </div>
    </div>
    {{-- end::Card --}}

    {{-- Modal --}}
    <div class="modal fade" id="add-activation" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdrop" aria-hidden="true" id="addActivationModal">
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
                    <form class="form" id="createActivationStore" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="storeType">Name</label>
                                    <select class="form-control selectpicker" id="storeType" name="storeType">
                                        <option value="" default> - Select -</option>
                                        <option value="DIRECT">DIRECT</option>
                                        <option value="ASPROF">ASPROF</option>
                                        <option value="ASPROT">ASPROT</option>
                                        <option value="TOKO">TOKO</option>
                                        <option value="INDEX">INDEX</option>
                                        <option value="PRE-EMPTIVE">PRE-EMPTIVE</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">&nbsp;</label>
                                    <input type="text" class="form-control" id="name" name="name" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Address:</label>
                            <div class="input-group">
                                <select class="form-control select2" data-live-search="true" name="city" id="city">
                                    {{--  --}}
                                </select>
                                <select class="form-control select2" data-live-search="true" name="district" id="district">
                                    <option value=""> Select City </option>
                                </select>
                                <input type="text" class="form-control" placeholder="Input Address" name="address"
                                    id="address" />
                            </div>
                        </div>
                        <div class=" row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="la la-phone"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Input Phone Number"
                                            name="phone" id="phone" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contact">Contact Person</label>
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
                        </div>
                        <div class="form-group">
                            <label for="masterStore">Master Store:</label>
                            <select class="form-control" data-live-search="true" id="masterStore" name="masterStore">
                                <option value=""> -- Select Value -- </option>
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
                    </form>
                    {{-- end::Form --}}
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
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush


{{-- Scripts Section --}}
@push('scripts')
    {{-- vendors --}}
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/pages/crud/forms/widgets/select2.js') }}" type="text/javascript"></script>

    {{-- page scripts --}}
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script>
        $(function() {
            let tblActivationStore = $('#activationStore-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: "{{ route('data-master.stores') }}",
                method: "GET",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'nama',
                        render: (data) => {
                            let updateBtn =
                                `<a href="#" name="updateStore" data-name="${data}">${data}</a>`
                            return updateBtn;
                        }
                    },
                    {
                        data: 'contact_person',
                        name: 'contact_person'
                    },
                    {
                        data: 'nomor_telp',
                        name: 'nomor_telp'
                    },
                    {
                        data: 'city_name',
                        name: 'city_name',
                    },
                    {
                        data: 'district_name',
                        name: 'district_name',
                    },
                    {
                        data: null,
                        render: (data) => {
                            return storeAction(data);
                        }
                    }
                ]
            });

            const storeAction = (data) => {
                const nama = data.nama;
                let deleteBtn =
                    `<a href="#" name="deleteStore" class="btn btn-danger btn-xs btn-block waves-effect waves-light" data-name="${nama}">Delete</a>`;
                return deleteBtn;
            }

            $(document).on("click", "a[name='updateStore']", function() {
                let nama = $(this).attr('data-name');
                return updateStore(nama);
            });

            $(document).on("click", "a[name='deleteStore']", function() {
                let nama = $(this).attr('data-name');
                return deleteStore(nama);
            });

            const updateStore = (nama) => {
                $.ajax({
                    url: "{{ config('app.api.url') }}list_activation_store",
                    method: "POST",
                    timeout: 0,
                    headers: {
                        "Authorization": authorization,
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    data: {
                        "last_nama": nama,
                        "limit": "1",
                        "keyword": nama
                    },
                    success: (res) => {
                        let resNama = res.data[0].nama
                        if (resNama == nama) {
                            console.log('Nama Sama: ', resNama);
                        } else {
                            console.error('Nama Tidak Sama: ', nama);
                        }
                    }
                });
            }

            const deleteStore = (nama) => {
                swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((res) => {
                    if (res.isConfirmed) {
                        $.ajax({
                            url: "{{ config('app.api.url') }}delete_activation_store",
                            method: "POST",
                            timeout: 0,
                            headers: {
                                "Authorization": authorization,
                                "Content-Type": "application/x-www-form-urlencoded"
                            },
                            data: {
                                "nama[]": nama
                            },
                            success: (res) => {
                                tblActivationStore.ajax.reload();
                                swal.fire(
                                    'Deleted!',
                                    `${res.status.msg}`,
                                    'success'
                                );
                            }
                        });
                    }
                });
            }

            const convertCity = (data) => {
                var city = [];
                var resData;
                $.ajax({
                    type: "GET",
                    url: "{{ url('data-master/area/city') }}",
                    async: false,
                    success: function(result) {
                        for (let i = 0; i < result.length; i++) {
                            if (result[i].id == data) {
                                city.push(result[i]);
                            }
                        }
                        resData = city[0].city;
                    }
                });
                return resData;
            }

            const convertDistrict = (id_city, id_district) => {
                var district = [];
                var resData;
                $.ajax({
                    type: "GET",
                    url: "{{ url('data-master/area/district') }}" + '/' + id_city,
                    success: function(result) {
                        for (let i = 0; i < result.length; i++) {
                            if (result[i].id == id_district) {
                                district.push(result[i]);
                                console.log(
                                    `Current: ${id_district}, Same with: ${result[i].district}`);
                            }
                        }
                    }
                });

                if (district.length == 0) {
                    return id_district;
                } else {
                    return district[0].district;
                }
            }

            let selectCity = $('#city').select2({
                placeholder: "Select City",
                width: 'resolve'
            });
            let selectDistrict = $('#district').select2({
                placeholder: "Select City First",
            });
            let masterStore = $('#masterStore');
            let activationForm = KTUtil.getById("createActivationStore");

            $('#add-activationBtn').on('click', () => {
                $.ajax({
                    type: "GET",
                    url: "{{ url('data-master/area/city') }}",
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

            selectCity.on('change', () => {
                selectDistrict.val(null);
                return getDistrict(selectCity.val());
            });

            let addActivationValidation = FormValidation.formValidation(activationForm, {
                fields: {
                    name: {
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
                    address: {
                        validators: {
                            notEmpty: {
                                message: "Address is Required"
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
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                "nama": $('#name').val(),
                                "contact_person": $('#contact').val(),
                                "id_city": $('#city').val(),
                                "id_district": $('#district').val(),
                                "address": $('#address').val(),
                                "master_store": $('#masterStore').val(),
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
                                    tblActivationStore.ajax.reload();
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
        });

    </script>
@endpush
