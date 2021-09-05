{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<div class="row">
    <div class="col-xl-12">
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    {{-- <a href="{{ url('/register/fascon/create') }}" class="btn btn-primary">
                    <i class="flaticon2-plus-1"></i>
                    Insert Lead
                    </a> --}}
                </div>
                <div class="card-toolbar">
                    <ul class="nav nav-light-success nav-bold nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tab-pending" id="pending-tab">
                                <span class="nav-icon">
                                    <i class="flaticon-rotate"></i>
                                </span>
                                <span class="nav-text">Pending</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-registered" id="registered-tab">
                                <span class="nav-icon">
                                    <i class="flaticon2-checking"></i>
                                </span>
                                <span class="nav-text">Registered</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-rejected" id="rejected-tab">
                                <span class="nav-icon">
                                    <i class="flaticon2-cross"></i>
                                </span>
                                <span class="nav-text">Rejected</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-trash" id="trashed-tab">
                                <span class="nav-icon">
                                    <i class="flaticon2-trash"></i>
                                </span>
                                <span class="nav-text">Trash</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pending" role="tabpanel" aria-labelledby="tab-pending">
                        <form class="mb-8 form">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="checkbox-inline">
                                            <label class="checkbox">
                                                <input type="checkbox" name="okFilterPending" value="Indonesia" />
                                                <span></span>
                                                Indonesia
                                            </label>
                                            <label class="checkbox">
                                                <input type="checkbox" name="okFilterPending" value="Vietnam" />
                                                <span></span>
                                                Vietnam
                                            </label>
                                            <label class="checkbox">
                                                <input type="checkbox" name="okFilterPending" value="Philippines" />
                                                <span></span>
                                                Philippines
                                            </label>
                                        </div>
                                        <span class="form-text text-muted">
                                            Select Displayed Status. Default: <b>All</b>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <table class="table table-bordered table-checkable scroll-horizontal-vertical w-100" id="table-pending">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Nationality</th>
                                    <th>Birthdate</th>
                                    <th>City</th>
                                    <th>Phone</th>
                                    <th>Passport</th>
                                    <th>No. ARC</th>
                                    <th>Action</th>
                                    <th>Availability</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="tab-registered" role="tabpanel" aria-labelledby="tab-registered">
                        <form class="mb-8 form">
                            <div class="row">
                                <div class="form-group">
                                    <div class="checkbox-inline">
                                        <label class="checkbox">
                                            <input type="checkbox" name="okFilterPending" value="Indonesia" />
                                            <span></span>
                                            Indonesia
                                        </label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="okFilterPending" value="Vietnam" />
                                            <span></span>
                                            Vietnam
                                        </label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="okFilterPending" value="Philippines" />
                                            <span></span>
                                            Philippines
                                        </label>
                                    </div>
                                    <span class="form-text text-muted">
                                        Select Displayed Status. Default: <b>All</b>
                                    </span>
                                </div>
                            </div>
                        </form>

                        <table class="table table-bordered table-checkable" id="table-registered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Nationality</th>
                                    <th>Birthdate</th>
                                    <th>City</th>
                                    <th>Phone</th>
                                    <th>No. ARC</th>
                                    <th>Passport</th>
                                    <th>Exp. ARC</th>
                                    <th>Action</th>
                                    <th>Availability</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>

                    <div class="tab-pane fade" id="tab-rejected" role="tabpanel" aria-labelledby="tab-rejected">
                        <form class="mb-8 form">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="checkbox-inline">
                                            <label class="checkbox">
                                                <input type="checkbox" name="okFilterPending" value="Indonesia" />
                                                <span></span>
                                                Indonesia
                                            </label>
                                            <label class="checkbox">
                                                <input type="checkbox" name="okFilterPending" value="Vietnam" />
                                                <span></span>
                                                Vietnam
                                            </label>
                                            <label class="checkbox">
                                                <input type="checkbox" name="okFilterPending" value="Philippines" />
                                                <span></span>
                                                Philippines
                                            </label>
                                        </div>
                                        <span class="form-text text-muted">
                                            Select Displayed Status. Default: <b>All</b>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <table class="table table-bordered table-checkable" id="table-rejected">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Nationality</th>
                                    <th>Birthdate</th>
                                    <th>City</th>
                                    <th>Phone</th>
                                    <th>No. ARC</th>
                                    <th>Passport</th>
                                    <th>Exp. ARC</th>
                                    <th>Action</th>
                                    <th>Availability</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>

                    <div class="tab-pane fade" id="tab-trash" role="tabpanel" aria-labelledby="tab-trash">
                        <form class="mb-8 form">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="checkbox-inline">
                                            <label class="checkbox">
                                                <input type="checkbox" name="okFilterPending" value="Indonesia" />
                                                <span></span>
                                                Indonesia
                                            </label>
                                            <label class="checkbox">
                                                <input type="checkbox" name="okFilterPending" value="Vietnam" />
                                                <span></span>
                                                Vietnam
                                            </label>
                                            <label class="checkbox">
                                                <input type="checkbox" name="okFilterPending" value="Philippines" />
                                                <span></span>
                                                Philippines
                                            </label>
                                        </div>
                                        <span class="form-text text-muted">
                                            Select Displayed Status. Default: <b>All</b>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <table class="table table-bordered table-checkable" id="table-trashed">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Nationality</th>
                                    <th>Birthdate</th>
                                    <th>City</th>
                                    <th>Phone</th>
                                    <th>No. ARC</th>
                                    <th>Passport</th>
                                    <th>Exp. ARC</th>
                                    <th>Action</th>
                                    <th>Availability</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="fasconDetail" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fasconDetail">
                    View Registration Fascon Detail
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" novalidate="novalidate" id="create-lead">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="customerName">Customer Name:</label>
                                <input class="form-control" type="text" id="customerName" name="customerName" disabled />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="birthdate">Birthdate:</label>
                                <div class="input-group date">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="flaticon-calendar"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="YYYY-MM-DD" name="birthdate" id="birthdate" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="passport">Passport:</label>
                                <input type="text" class="form-control" id="passport" name="passport" placeholder="Input Passport Here" disabled />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nationality">MSISDN:</label>
                                <input type="text" class="form-control" id="msisdn" name="msisdn" disabled />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nationality">Nationality:</label>
                                <input type="text" class="form-control" id="nationality" name="nationality" disabled />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pic">P.I.C:</label>
                                <input type="text" class="form-control" id="pic" name="pic" disabled />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-md-6">
                            <div class="form-group">
                                <label for="information">Information:</label>
                                <textarea class="form-control" id="information" name="information" rows="4" disabled></textarea>
                            </div>
                        </div>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <a id="linkToPending" class="btn btn-primary font-weight-bold">Edit</a>
            </div>
        </div>
    </div>
</div>

@endsection

{{-- Styles Section --}}
@push('styles')
<link href=" {{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush


{{-- Scripts Section --}}
@push('scripts')
{{-- vendors --}}
<script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>

{{-- page scripts --}}
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $('#apform-select2').select2({
            placeholder: "Select AP. Form Location"
        });
        let tablePending, tableRejected, tableTrashed, tableRegistered;
        if (!$.fn.DataTable.isDataTable('#table-pending')) {
            tablePending = $('#table-pending').DataTable({
                processing: true,
                serverSide: true,
                // responsive: true,
                ajax: {
                    url: "{{ route('register.fascon.table.pending') }}",
                    error: function(jqXHR, exception, error) {
                        console.log('Error status: ' + jqXHR.status);
                        console.log('Exception: ' + exception);
                        console.log('Error message: ' + error);
                    },
                },
                method: "GET",
                columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable : false,
                }, {
                    data: null,
                    render: function(data) {
                        let value = capitalize(data.customer_nama);
                        return `<a href="#" name="detailPending"  data-toggle="modal" data-target="#fasconDetail" data-id="${data.id}" data-idc="${data.id_customer}">${value}</a>`
                    },
                }, {
                    data: 'customer_nationality',
                    name: 'customer_nationality'
                }, {
                    data: 'customer_tgl_lahir',
                    name: 'customer_tgl_lahir',
                }, {
                    data: 'customer_city_name',
                    name: 'customer_city_name'
                }, {
                    data: 'msisdn_kn',
                    name: 'msisdn_kn'
                }, {
                    data: 'customer_nomor_identity_passpor',
                    name: 'customer_nomor_identity_passpor',
                }, {
                    data: 'customer_nomor_identity_arc',
                    name: 'customer_nomor_identity_arc',
                }, {
                    data: null,
                    orderable: false,
                    searchable: false,
                    render: (data) => {
                        let id = data.id_customer;
                        let id_customer = data.id;
                        return updatePending(id, id_customer);
                    }
                }, {
                    data: 'availibility',
                    visible: false
                }],
                order: [
                    [1, 'asc']
                ]
            });
        }


        if (!$.fn.DataTable.isDataTable('#table-registered')) {


            tableRegistered = $('#table-registered').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: "{{ route('register.fascon.table.registered') }}",
                method: "GET",
                columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                }, {
                    data: null,
                    render: function(data, row) {
                        return `<a href="#" name="detailRegistered" data-toggle="modal" data-target="#fasconDetail" data-id="${data.id}" data-idc="${data.id_customer}">${data.customer_nama}</a>`
                    },
                }, {
                    data: 'customer_nationality',
                    name: 'customer_nationality'
                }, {
                    data: 'customer_tgl_lahir',
                    name: 'customer_tgl_lahir',
                }, {
                    data: 'customer_city_name',
                    name: 'customer_city_name'
                }, {
                    data: 'msisdn_kn',
                    name: 'msisdn_kn'
                }, {
                    data: 'customer_nomor_identity_arc',
                    name: 'customer_nomor_identity_arc',
                }, {
                    data: 'customer_nomor_identity_passpor',
                    name: 'customer_nomor_identity_passpor',
                }, {
                    data: 'customer_arc_expired',
                    name: 'customer_arc_expired',
                }, {
                    data: null,
                    render: (data) => {
                        let id = data.id_customer;
                        let id_customer = data.id;
                        return updateRegistered(id, id_customer);
                    }
                }, {
                    data: 'availibility',
                    visible: false
                }],
                order: [
                    [1, 'asc']
                ]
            });
        }

        if (!$.fn.DataTable.isDataTable('#table-rejected')) {

            tableRejected = $('#table-rejected').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: "{{ route('register.fascon.table.rejected') }}",
                method: "GET",
                columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                }, {
                    data: null,
                    render: function(data, row) {
                        // console.log(data);
                        return `<a href="#" name="detailRejected" data-toggle="modal" data-target="#fasconDetail" data-id="${data.id}" data-idc="${data.id_customer}">${data.customer_nama}</a>`
                    },
                }, {
                    data: 'customer_nationality',
                    name: 'customer_nationality'
                }, {
                    data: 'customer_tgl_lahir',
                    name: 'customer_tgl_lahir',
                }, {
                    data: 'customer_city_name',
                    name: 'customer_city_name'
                }, {
                    data: 'msisdn_tw',
                    name: 'msisdn_tw'
                }, {
                    data: 'customer_nomor_identity_arc',
                    name: 'customer_nomor_identity_arc',
                }, {
                    data: 'customer_nomor_identity_passpor',
                    name: 'customer_nomor_identity_passpor',
                }, {
                    data: 'customer_arc_expired',
                    name: 'customer_arc_expired',
                }, {
                    data: null,
                    render: function (data) {
                        console.log(data)
                        const tipe_number = data.tipe;
                        const id_customer = data.id_customer;
                        const id_customer_number = data.id;
                        return updateRejected(tipe_number,id_customer,id_customer_number);
                    }
                }, {
                    data: 'availibility',
                    visible: false
                }],
                order: [
                    [1, 'asc']
                ]
            });
        }

        if (!$.fn.DataTable.isDataTable('#table-trashed')) {

            tableTrashed = $('#table-trashed').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: "{{ route('register.fascon.table.trashed') }}",
                method: "GET",
                columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                }, {
                    data: null,
                    render: function(data, row) {
                        // console.log(data);
                        return `<a href="#" name="detailRejected" data-toggle="modal" data-target="#fasconDetail" data-id="${data.id}" data-idc="${data.id_customer}">${data.customer_nama}</a>`
                    },
                }, {
                    data: 'customer_nationality',
                    name: 'customer_nationality'
                }, {
                    data: 'customer_tgl_lahir',
                    name: 'customer_tgl_lahir',
                }, {
                    data: 'customer_city_name',
                    name: 'customer_city_name'
                }, {
                    data: 'msisdn_tw',
                    name: 'msisdn_tw'
                }, {
                    data: 'customer_nomor_identity_arc',
                    name: 'customer_nomor_identity_arc',
                }, {
                    data: 'customer_nomor_identity_passpor',
                    name: 'customer_nomor_identity_passpor',
                }, {
                    data: 'customer_arc_expired',
                    name: 'customer_arc_expired',
                }, {
                    data: null,
                    render: (data) => {
                        const tipe_number = data.tipe;
                        const id_customer = data.id_customer;
                        return actionTrashed(tipe_number, id_customer);
                    }
                }, {
                    data: 'availibility',
                    visible: false
                }],
                order: [
                    [1, 'asc']
                ]
            });
        }

        const updatePending = (id, id_customer) => {
            const url = `{{ url('register/fascon/update/pending/${id}/${id_customer}') }}`;
            return `<a href="${url}" name="updatePending" class="btn btn-success btn-xs btn-block waves-effect waves-light">Update</a>`;
        }

        const updateRegistered = (id, id_customer) => {
            const url = `{{ url('register/fascon/update/registered/${id}/${id_customer}') }}`;
            return `<a href="${url}" class="btn btn-success btn-xs btn-block waves-effect waves-light">Update</a>`;
        }

        // const updateRejected = (name) => {
        //     const url = `{{ url('register/fascon/update/rejected/${name}') }}`;
        //     return `<a href="#" class="btn btn-danger btn-xs btn-block waves-effect waves-light">Move to Trash</a>`;
        // }

        const updateRejected = (tipe_number, id_customer, id_customer_number) => {
            return `<a href="#" name="moveToTrash" class="btn btn-danger btn-xs btn-block waves-effect waves-light" data-type="${tipe_number}" data-id-customer="${id_customer}" data-id-customer-number="${id_customer_number}">Move to Trash</a>`;
        }

        const actionTrashed = (tipe_number, id_customer) => {
            return `<a href="#" class="btn btn-danger btn-xs btn-block waves-effect waves-light" name="deletePermanent" data-type="${tipe_number}" data-id-customer="${id_customer}">Delete</a>`;
        }

        $("input[name='okFilterPending']").on('change', () => {
            let typePendings = $('input:checkbox[name="okFilterPending"]:checked').map(function() {
                return '^' + this.value + '\$';
            }).get().join('|');
            tablePending.column(2).search(typePendings, true, false, false).draw(false);
        });

        $("input[name='okFilterRegistered']").on('change', () => {
            let typeRegistered = $('input:checkbox[name="okFilterRegistered"]:checked').map(function() {
                return '^' + this.value + '\$';
            }).get().join('|');
            tableRegistered.column(2).search(typeRegistered, true, false, false).draw(false);
        });

        $("input[name='okFilterRejected']").on('change', () => {
            let typeRejected = $('input:checkbox[name="okFilterRejected"]:checked').map(function() {
                return '^' + this.value + '\$';
            }).get().join('|');
            tableRejected.column(2).search(typeRejected, true, false, false).draw(false);
        });

        $("input[name='okFilterTrashed']").on('change', () => {
            let typeTrashed = $('input:checkbox[name="okFilterTrashed"]:checked').map(function() {
                return '^' + this.value + '\$';
            }).get().join('|');
            tableTrashed.column(2).search(typeTrashed, true, false, false).draw(false);
        });

        $(document).on("click", "a[name='detailPending']", function() {
            // let customer_nama = $(this).attr('data-id');
            let customer_id = $(this).attr('data-id');
            let customer_idc = $(this).attr('data-idc');
            // return getFasconDetail(customer_nama, 'pending', customer_idc);
            return getFasconDetail(customer_id, 'pending', customer_idc);
        });

        $(document).on("click", "a[name='detailRegistered']", function() {
            let customer_nama = $(this).attr('data-id');
            let customer_idc = $(this).attr('data-idc');
            return getFasconDetail(customer_nama, 'registered', customer_idc);
        });

        $(document).on("click", "a[name='detailRejected']", function() {
            let customer_id = $(this).attr('data-id');
            let customer_idc = $(this).attr('data-idc');
            return getFasconDetail(customer_id, 'rejected', customer_idc);
        });

        $(document).on("click", "a[name='detailTrashed']", function() {
            let customer_nama = $(this).attr('data-id');
            return getFasconDetail(customer_nama, 'trashed');
        });

        $(document).on("click", "a[name='moveToTrash']", function() {
            let tipe_number = $(this).attr('data-type');
            let id_customer = $(this).attr('data-id-customer');
            let id_customer_number = $(this).attr('data-id-customer-number');
            return fnMoveToTrash(tipe_number, id_customer,id_customer_number);
        });

        $(document).on("click", "a[name='deletePermanent']", function() {
            let tipe_number = $(this).attr('data-type');
            let id_customer = $(this).attr('data-id-customer');
            return fnDeletePermanent(tipe_number, id_customer);
        });


        const updateModalPending = (id, id_customer) => {
            const url = `{{ url('register/fascon/update/pending/${id}/${id_customer}') }}`;
            $('#linkToPending').attr('href', url)
        }

        const getFasconDetail = (id, status, idc = null) => {
            $.ajax({
                url: "{{ route('register.fascon.detail') }}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id,
                    idc,
                    status,
                },
                success: function(res) {
                    if (res.status.code == '200') {

                        res = res.data;
                        const idCustomer = res.customer_number;
                        const result = res.customer;
                        $('#customerName').val(result.nama);
                        $('#msisdn').val(res.customer_number.msisdn_kn);
                        $('#birthdate').val(result.tgl_lahir);
                        $('#passport').val(res.customer_identity[0].nomor);
                        $('#nationality').val(result.negara);
                        $('#information').val(result.deskripsi);
                        // $('#activationStore').val(result.id_activation_store);
                        $('#pic').val(result.update_by);
                        updateModalPending(idCustomer.id_customer, idCustomer.id);
                    } else {
                        toastr.success(res.status.msg, res.status.code);
                        $("#fasconDetail").modal('hide');
                    }

                },
                error: function(jqXhr, textStatus, errorThrown) {
                    console.log(errorThrown);
                }
            })
        }

        const getActivationStore = (id_store) => {
            $.ajax({
                type: "GET",
                url: "{{ route('data-master.stores') }}",
                success: function(result) {
                    let data = result.data;
                    var store = [];
                    var resData;
                    for (let i = 0; i < data.length; i++) {
                        if (data[i].id == id_store) {
                            store.push(data[i]);
                        }
                    }
                    resData = store[0].nama;
                    $('#activationStore').val(resData);
                }
            });
        };

        const fnMoveToTrash = (tipe_number, id_customer,id_customer_number) => {
            // console.log(`Tipe Number: ${tipe_number}, ID: ${id_customer}`);
            $.ajax({
                url: "{{ config('app.api.url') }}move_restore_trash_customer",
                method: "POST",
                timeout: 0,
                headers: {
                    "Authorization": authorization,
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                data: {
                    "status_trash": 'Y',
                    "tipe_number": tipe_number,
                    "id_customer": id_customer,
                    "id_customer_number": id_customer_number
                },
                success: (res) => {
                    console.log(res);
                    swal.fire({
                        text: `${res.status.msg}`,
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-primary"
                        }
                    });
                    tableRejected.ajax.reload()
                    tableTrashed.ajax.reload()
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
                    });
                }
            });
        }

        const fnDeletePermanent = (tipe_number, id_customer) => {
            // console.log(`Tipe Number: ${tipe_number}, ID: ${id_customer}`);
            $.ajax({
                url: "{{ config('app.api.url') }}delete_customer",
                method: "POST",
                timeout: 0,
                headers: {
                    "Authorization": authorization,
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                data: {
                    "tipe_number": tipe_number,
                    "id_customer": id_customer
                },
                success: (res) => {
                    console.log(res);
                    swal.fire({
                        text: `${res.status.msg}`,
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-primary"
                        }
                    });
                    // tableRejected.ajax.reload()
                    tableTrashed.ajax.reload()
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
                    });
                }
            });
        }

        const capitalize = (value) => {
            return value.replace(/(^\w{1})|(\s+\w{1})/g, letter => letter.toUpperCase());
        }
    });
</script>
@endpush
