{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<div class="row">
    <div class="col-xl-12">
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <a href="{{ url('/register/ultima/create') }}" class="btn btn-primary">
                        <i class="flaticon2-plus-1"></i>
                        Insert Lead
                    </a>
                </div>
                <div class="card-toolbar">
                    <ul class="nav nav-light-success nav-bold nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tab-lead">
                                <span class="nav-icon">
                                    <i class="flaticon2-rocket"></i>
                                </span>
                                <span class="nav-text">Lead</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-process">
                                <span class="nav-icon">
                                    <i class="flaticon-rotate"></i>
                                </span>
                                <span class="nav-text">Process</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-activated">
                                <span class="nav-icon">
                                    <i class="flaticon2-checking"></i>
                                </span>
                                <span class="nav-text">Activated</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-lead" role="tabpanel" aria-labelledby="tab-lead">
                        <form class="mb-8 form">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="checkbox-inline">
                                            <label class="checkbox">
                                                <input type="checkbox" name="okFilterLead" value="ok_new" />
                                                <span></span>
                                                OK
                                            </label>
                                            <label class="checkbox">
                                                <input type="checkbox" name="okFilterLead" value="ok_former" />
                                                <span></span>
                                                OK (Former)
                                            </label>
                                            <label class="checkbox">
                                                <input type="checkbox" name="okFilterLead" value="terminate" />
                                                <span></span>
                                                OK (Terminate)
                                            </label>
                                        </div>
                                        <span class="form-text text-muted">
                                            Select Displayed Status. Default: <b>All</b>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4 text-right">
                                    <a id="exportTable" data-id="lead" href="{{ url('register/ultima/export/lead') }}" class="btn btn-success px-6 font-weight-bold ml-4">
                                        Export
                                    </a>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-bordered scroll-horizontal-vertical w-100 table-checkable" id="table-lead">
                                <thead>
                                    <tr>
                                        <th width="0.5%">No.</th>
                                        <th>Name</th>
                                        <th>Passport</th>
                                        <th>Act Store</th>
                                        <th>Timestamp</th>
                                        <th>Action</th>
                                        {{-- <th>Availability</th> --}}
                                    </tr>
                                </thead>
                                <tbody class="text-capitalize"></tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-process" role="tabpanel" aria-labelledby="tab-process">
                        <form class="mb-8 form">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="checkbox-inline">
                                            <label class="checkbox">
                                                <input type="checkbox" name="okFilterProcess" value="ok_new" />
                                                <span></span>
                                                OK
                                            </label>
                                            <label class="checkbox">
                                                <input type="checkbox" name="okFilterProcess" value="ok_former" />
                                                <span></span>
                                                OK (Former)
                                            </label>
                                            <label class="checkbox">
                                                <input type="checkbox" name="okFilterProcess" value="terminate" />
                                                <span></span>
                                                OK (Terminate)
                                            </label>
                                        </div>
                                        <span class="form-text text-muted">
                                            Select Displayed Status. Default: <b>All</b>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-bordered scroll-horizontal-vertical w-100 table-checkable" id="table-process">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Passport</th>
                                        <th>AP Form</th>
                                        <th>Act Store</th>
                                        <th>Timestamp</th>
                                        <th>Action</th>
                                        {{-- <th>Availability</th> --}}
                                    </tr>
                                </thead>
                                <tbody class="text-capitalize"></tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-activated" role="tabpanel" aria-labelledby="tab-activated">
                        <div class="row mb-8 ml-4 ">
                            {{-- <div class="col-md-12">

                                </div> --}}
                            <div class="col-md-10">
                                <label class="col-form-label col-lg-0">AP. Form Location:</label>
                                <div class="form-group row">
                                    {{-- <div class="col-lg-3">
                                            <select class="form-control select2" id="apformSelect2" name="apform-select">
                                                <option value=""></option>
                                                <option value="Store/ASPro">Store/ASPro</option>
                                                <option value="Telkom Taiwan">Telkom Taiwan</option>
                                                <option value="T-Star">T-Star</option>
                                            </select>
                                        </div>
                                        <button id="update-apForm"
                                            class="btn btn-light-primary px-6 font-weight-bold ml-4 mr-4">
                                            Update
                                        </button> --}}
                                    <select class="custom-select select2" name="apform-select" id="inputGroupSelect04">
                                        <option value=""></option>
                                        <option value="Store/ASPro">Store/ASPro</option>
                                        <option value="Telkom Taiwan">Telkom Taiwan</option>
                                        <option value="T-Star">T-Star</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-light-primary px-6 font-weight-bold ml-4 mr-4" id="update-apForm">Update</button>
                                    </div>
                                    <p>OR</p>
                                    <a id="downloadTemplate" class="btn btn-primary px-6 font-weight-bold ml-4">
                                        Download Template
                                    </a>
                                    <button id="uploadActivated" class="btn btn-warning px-6 font-weight-bold ml-4" data-toggle="modal" data-target="#uploadActivatedModal">
                                        Upload
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-2 text-right">
                                <button id="uploadActivated" class="btn btn-success px-6 font-weight-bold ml-4" data-toggle="modal" data-target="#exportActivatedModal">
                                    {{-- <a href="{{ url('register/ultima/export/activated') }}" class="btn btn-success px-6 font-weight-bold ml-4"> --}}
                                    Export
                                    {{-- </a> --}}
                                </button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <div id="table-activated-search-input" class="row"></div>
                            <table class="table table-bordered scroll-horizontal-vertical w-100 table-checkable" id="table-activated">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Passport</th>
                                        <th>MSISDN Taiwan</th>
                                        <th class="w-100">Act. Date</th>
                                        <th>Act. Store</th>
                                        <th>Nationality</th>
                                        <th>TSEL ExpDate</th>
                                        <th>APForm Location</th>
                                        <th>Check</th>
                                    </tr>
                                </thead>
                                <tbody class="text-capitalize"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ultimaDetail" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="container">
        <div class="col-8 m-auto">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ultimaDetail">
                            View Registration Kartu AS Detail
                        </h5>
                        <button type="button" class="close isClose" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form" novalidate="novalidate" id="detail-lead">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="customerName">Customer Name:</label>
                                    <input class="form-control" disabled type="text" id="customerName" name="customerName" style="text-transform: capitalize;" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="birthdate">Birthdate:</label>
                                    <div class="input-group date">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="flaticon-calendar"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" disabled placeholder="YYYY-MM-DD" name="birthdate" id="birthdate" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="passport">Passport:</label>
                                    <input type="text" class="form-control" disabled id="passport" name="passport" placeholder="Input Passport Here" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nationality">Nationality:</label>
                                    <input type="text" class="form-control" disabled id="nationality" name="nationality" style="text-transform: capitalize;" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="activationStore">Activation Store:</label>
                                    <input type="text" class="form-control" disabled id="activationStore" name="activationStore" style="text-transform: capitalize;" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="pic">P.I.C:</label>
                                    <input type="text" class="form-control" disabled id="pic" name="pic" style="text-transform: capitalize;" />
                                </div>
                            </div>
                            <div class=" col-md-12">
                                <div class="form-group">
                                    <label for="information">Information:</label>
                                    <textarea class="form-control" disabled id="information" name="information" rows="4" style="text-transform: capitalize;"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="availability">Availability:</label>
                                    <input type="text" class="form-control" disabled id="availability" name="availability" />
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <a href="" target="_blank" name="identityFile" id="printLead" class="btn btn-success font-weight-bold btn-cetak">
                            PRINT
                        </a>
                        <button type="button" class="btn btn-light-primary font-weight-bold isClose" data-dismiss="modal">Close</button>
                        <a id="editLead" class="btn btn-primary font-weight-bold">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="modal fade" id="ultimaActivated" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">

    <!-- <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        View Registration Kartu AS Detail
                    </h5>
                    <button type="button" class="close isClose" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form" novalidate="novalidate" id="detail-activated">
                        <div class="row">
                            <div class="col-md-12 col-lg-4">
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input class="form-control" type="text" disabled id="nameActivated" name="name" value=""
                                        style="text-transform: capitalize;" />
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4">
                                <div class="form-group">
                                    <label for="birthdate">Birthdate:</label>
                                    <div class="input-group date">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="flaticon-calendar"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="YYYY-MM-DD" name="birthdate"
                                            disabled id="birthdateActivated" value="" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4">
                                <div class="form-group">
                                    <label for="passportActivated">Passport:</label>
                                    <input type="text" class="form-control" id="passportActivated" name="passport" disabled
                                        value="" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-4">
                                <div class="form-group">
                                    <label for="nationality">Nationality:</label>
                                    <input type="text" class="form-control" id="nationalityActivated" name="nationality"
                                        disabled style="text-transform: capitalize;" />
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4">
                                <div class="form-group">
                                    <label for="activationStore">Activation Store:</label>
                                    <input type="text" class="form-control" id="activationStoreActivated"
                                        name="activationStoreActivated" disabled style="text-transform: capitalize;" />
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4">
                                <div class="form-group">
                                    <label for="pic">P.I.C:</label>
                                    <input type="text" class="form-control" id="picActivated" name="picActivated" disabled
                                        style="text-transform: capitalize;" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>File(s): </label>
                                <table class="table">
                                    <thead>
                                        <td>APFORM File(s)</td>
                                    </thead>
                                    <tbody id="apFileLinks">

                                    </tbody>
                                    <table class="table">
                                        <thead>
                                            <th>ID File(s)</th>
                                        </thead>
                                        <tbody id="idFileLinks">

                                        </tbody>
                                    </table>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-6">
                                <div class="form-group">
                                    <label for="information">Information:</label>
                                    <textarea class="form-control" disabled placeholder="Input Other Information"
                                        id="informationActivated" name="information" rows="4"
                                        style="text-transform: capitalize;"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row mt-2">
                                    <label class="col-3">Availability:</label>
                                    <div class="radio-list">
                                        <input type="text" class="form-control" id="availabilityActivated"
                                            name="availabilityActivated" disabled />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <a href="#" target="_blank" name="customerGrapApi" class="btn btn-success font-weight-bold mr-auto">API
                        Cust Profile</a>
                    <a href="#" target="_blank" name="identityFile" id="printLinkActivated"
                        class="btn btn-success font-weight-bold">
                        PRINT
                    </a>
                    <button type="button" class="btn btn-light-primary font-weight-bold isClose"
                        data-dismiss="modal">Close</button>
                    <a id="editActivated" class="btn btn-primary font-weight-bold">Edit</a>
                </div>
                </div>
            </div> -->


    <div class="container">
        <div class="col-md-8 m-auto">
            <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            View Registration Kartu AS Detail
                        </h5>
                        <button type="button" class="close isClose" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form" novalidate="novalidate" id="detail-activated">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input class="form-control" type="text" disabled id="nameActivated" name="name" value="" style="text-transform: capitalize;" />
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="birthdate">Birthdate:</label>
                                        <div class="input-group date">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="flaticon-calendar"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="YYYY-MM-DD" name="birthdate" disabled id="birthdateActivated" value="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="passportActivated">Passport:</label>
                                        <input type="text" class="form-control" id="passportActivated" name="passport" disabled value="" />
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="nationality">Nationality:</label>
                                        <input type="text" class="form-control" id="nationalityActivated" name="nationality" disabled style="text-transform: capitalize;" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="activationStore">Activation Store:</label>
                                        <input type="text" class="form-control" id="activationStoreActivated" name="activationStoreActivated" disabled style="text-transform: capitalize;" />
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="pic">P.I.C:</label>
                                        <input type="text" class="form-control" id="picActivated" name="picActivated" disabled style="text-transform: capitalize;" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>File(s): </label>
                                    <table class="table">
                                        <thead>
                                            <td>APFORM File(s)</td>
                                        </thead>
                                        <tbody id="apFileLinks">

                                        </tbody>

                                        <table class="table">
                                            <thead>
                                                <th>ID File(s)</th>
                                            </thead>
                                            <tbody id="idFileLinks">

                                            </tbody>
                                        </table>
                                    </table>
                                </div>
                            </div>
                            <div class=" col-md-12">
                                <div class="form-group">
                                    <label for="information">Information:</label>
                                    <textarea class="form-control" disabled placeholder="Input Other Information" id="informationActivated" name="information" rows="4" style="text-transform: capitalize;"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="availability">Availability:</label>
                                    <input type="text" class="form-control" id="availabilityActivated" name="availabilityActivated" disabled />
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <a target="_blank" name="customerGrapApi" id="apiFileLink" class="btn btn-success font-weight-bold mr-auto">API
                            Cust Profile</a>
                        <a href="#" target="_blank" name="identityFile" id="printLinkActivated" class="btn btn-success font-weight-bold">
                            PRINT
                        </a>
                        <button type="button" class="btn btn-light-primary font-weight-bold isClose" data-dismiss="modal">Close</button>
                        <a id="editActivated" class="btn btn-primary font-weight-bold">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="uploadActivatedModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Upload APForm Template
                </h5>
                <button type="button" class="close isClose" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form class="form" method="POST" action="{{ url('register/ultima/activated/upload/apformexcel') }}" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                @csrf
                                <input class="form-control" type="file" id="uploadFile" name="file" value="" placeholder="Input Name Here" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-danger font-weight-bold isClose" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="exportActivatedModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Export Date Rage
                </h5>
                <button type="button" class="close isClose" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form class="form" method="GET" action="{{ url('register/ultima/export/activated') }}" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            @csrf
                            <div class="input-group date">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="flaticon-calendar"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" placeholder="Start Date" name="start_date" id="exportStartDate">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group date">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="flaticon-calendar"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" placeholder="End Date" name="end_date" id="exportEndDate">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-danger font-weight-bold isClose" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

{{-- Styles Section --}}



@push('styles')
<link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<style>
    table.table-bordered.dataTable tbody th,
    table.table-bordered.dataTable tbody td {
        white-space: nowrap !important
    }
</style>
@endpush
{{-- Scripts Section --}}
@push('scripts')
<script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
{{-- vendors --}}
<script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
{{-- page scripts --}}
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
<script>
    var currYear = new Date().getFullYear()
    $(function() {
        var mstNations = JSON.parse('<?=json_encode($nationalities)?>')
        var mstStores = <?=json_encode($activationStores)?>;
        $('#inputGroupSelect04').select2({
            placeholder: "AP. Form Location"
        });

        var tableLeadSearch = {}
        var tableLead = $('#table-lead').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            stateSave: false,
            ordering: false,
            // searching: false,
            oLanguage: {
                sSearch: "Search by Name: "
            },
            ajax: {
                url: "{{ route('register.ultima.table.lead') }}",
                type: 'GET',
                data: function(data) {
                    if (tableLead) {
                        data.records_total = tableLead.page.info().recordsTotal
                    }
                    data.filter = tableLeadSearch
                    data.year = currYear
                },
            },
            columnDefs: [{
                targets: "_all",
                orderable: false
            }],
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    width: '5%',
                },
                {
                    data: null,
                    render: (data) => {
                        let value = String(data.customer_nama).toUpperCase();
                        return `<a href="#" name="detailLead" data-toggle="modal" data-target="#ultimaDetail" data-id="${data.id}" data-id-customer="${data.id_customer}" data-status="${data.status}">${value}</a>`
                    },
                    width: '36%'
                },
                {
                    data: 'customer_nomor_identity_passpor',
                    name: 'customer_nomor_identity_passpor',
                    width: '15%',
                },
                {
                    data: 'activation_store_name',
                    name: 'activation_store_name',
                    width: '17%'
                },
                {
                    data: 'lead_date',
                    render: (data) => {
                        return data.substr(0, 10);
                    },
                    with: '17%'
                },
                {
                    data: null,
                    orderable: false,
                    searchable: false,
                    render: (data) => {
                        let id = data.id_customer;
                        let id_customer = data.id;
                        return updateLead(id, id_customer);
                    },

                }
            ],
            initComplete: function() {
                    var thisTable = this;
                    var rowFilterLead = $('<tr class="filter"></tr>').appendTo($(tableLead.table().header()));
                    this.api().columns().every(function() {
                        const column = this;
                        var input;

                        switch (column.index()) {
                            case 1:
                                input = $(`
                                    <input type="text" class="form-control form-control-sm form-filter datatable-input" data-type="string" data-key="customer_nama" data-col-index="` + column.index() + `"/>`
                                );
                            break;
                            case 2:
                                input = $(`
                                    <input type="text" class="form-control form-control-sm form-filter datatable-input" data-type="string" data-key="customer_nomor_identity_passpor" data-col-index="` + column.index() + `"/>`
                                );
                            break;
                            case 3:
                                input = `<select class="custom-select datatable-input" data-type="string" data-key="activation_store_name" data-col-index="` + column.index() + `"> `
                                input += `<option value="">All Stores</option>`
                                for (const key of mstStores) {
                                    input += `<option value="${String(key.nama).toLowerCase()}">${String(key.nama).toUpperCase()}</option>`
                                }
                                input += `</select>`
                            break;
                            case 4:
                                input = $(`
                                    <div class="input-group date">
                                        <input type="text" class="form-control form-control-sm datatable-input" data-type="date" readonly data-key="lead_date" placeholder="From" id="kt_datepicker_1" data-col-index="` + column.index() + `"/>
                                    </div>
                                    <div class="input-group date d-flex align-content-center">
                                        <input type="text" class="form-control form-control-sm datatable-input" data-type="date" readonly data-key="lead_date" placeholder="To" id="kt_datepicker_2" data-col-index="` + column.index() + `"/>
                                    </div>`
                                );
                            break;
                            case 5:
                                var search = $(`
                                    <button class="btn btn-primary kt-btn btn-sm kt-btn--icon d-block">
                                        <span>
                                            <i class="la la-search"></i>
                                        </span>
                                    </button>
                                `);

                                var reset = $(`
                                    <button class="btn btn-secondary kt-btn btn-sm kt-btn--icon">
                                        <span>
                                            <i class="la la-close"></i>
                                        </span>
                                        </button>
                                `);

                                $('<th>').append(search).append(reset).appendTo(rowFilterLead);

                                $(search).on('click', function(e) {
                                    e.preventDefault();
                                    var params = {};
                                    $(rowFilterLead).find('.datatable-input').each(function() {
                                        var i = $(this).data('col-index');
                                        const key = $(this).data('key');
                                        const type = $(this).data('type');

                                        if( $(this).val() !='') {
                                            if (params[key]) {
                                                params[key]['end'] = $(this).val();
                                            } else {
                                                if(type == 'date') {
                                                    params[key] = {}
                                                    params[key]['start'] = $(this).val();
                                                }
                                                else {
                                                    params[key] = $(this).val();
                                                }
                                            }
                                        }
                                    });
                                    tableLeadSearch = params
                                    tableLead.draw();
                                });

                                $(reset).on('click', function(e) {
                                    e.preventDefault();
                                    $(rowFilterLead).find('.datatable-input').each(function(i) {
                                        $(this).val('');
                                        tableLeadSearch = {}
                                    });
                                    tableLead.draw();
                                });
                            break;
                        }
                        if (column.index() !== 5) {
                            $(input).appendTo($('<th class="sorting_disabled">').appendTo(rowFilterLead));
                        }
                    })

                    $('#kt_datepicker_1,#kt_datepicker_2').datepicker({
                        todayHighlight: true,
                        format: 'yyyy-mm-dd',
                        orientation: "bottom left",
                    });
                }
        });
        // .on( 'processing.dt', function ( e, settings, processing ) {
        //     console.log('processing')
        //     $('#processingIndicator').css( 'display', processing ? 'block' : 'none' );
        // });
        var tableProcessSearch = {}
        var tableProcess = $('#table-process').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                stateSave: false,
                // ordering: false,
                oLanguage: {
                    sSearch: "Search by Name: "
                },
                ajax: {
                    url: "{{ route('register.ultima.table.process') }}",
                    type: 'GET',
                    data: function(data) {
                        if (tableProcess) {
                            data.records_total = tableProcess.page.info().recordsTotal
                        }
                        data.filter = tableProcessSearch
                        data.year = currYear
                    },
                },
                columnDefs: [{
                    targets: [0],
                    orderable: false
                }],
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        width: '5%',
                        class: "text-center"
                    },
                    {
                        data: null,
                        orderable: false,
                        render: (data) => {
                            let value = String(data.customer_nama).toUpperCase();
                            return `<a href="#" name="detailLead" data-toggle="modal" data-target="#ultimaDetail" data-id="${data.id}" data-id-customer="${data.id_customer}"  data-status="${data.status}">${value}</a>`
                        },
                        width: "35%"
                    },

                    {
                        data: 'customer_nomor_identity_passpor',
                        orderable: false,
                        render: (data) => {
                            if (!data) {
                                return 'Passport is not defined'
                            }
                            return data;
                        },
                        width: "15%"
                    },
                    {
                        data: 'ap_form',
                        orderable: false,
                        render: (data) => {
                            if (data != null) {
                                return '1'
                            } else {
                                return '0'
                            }
                        },
                        width: "10%",
                        class: 'text-center'
                    },
                    {
                        data: 'activation_store_name',
                        name: 'activation_store_name',
                        orderable: false,
                        width: "15%"
                    },
                    {
                        data: 'lead_date',
                        orderable: false,
                        render: (data) => {
                            return data.substr(0, 10);
                        },
                        width: "10%"
                    },
                    {
                        data: null,
                        orderable: false,
                        searchable: false,
                        render: (data) => {
                            let id = data.id_customer;
                            let id_customer = data.id;
                            return updateProcess(id, id_customer);
                        },
                        width: "10%"
                    }
                ],
                initComplete: function() {
                    var thisTable = this;
                    var rowFilterProcess = $('<tr class="filter"></tr>').appendTo($(tableProcess.table().header()));
                    this.api().columns().every(function() {
                        const column = this;
                        var input;

                        switch (column.index()) {
                            case 1:
                                input = $(`
                                    <input type="text" class="form-control form-control-sm form-filter datatable-input" data-type="string" data-key="customer_nama" data-col-index="` + column.index() + `"/>`
                                );
                            break;
                            case 2:
                                input = $(`
                                    <input type="text" class="form-control form-control-sm form-filter datatable-input" data-type="string" data-key="customer_nomor_identity_passpor" data-col-index="` + column.index() + `"/>`
                                );
                            break;
                            case 3:
                                input = `<select class="custom-select datatable-input" data-type="string" data-key="ap_form" data-col-index="` + column.index() + `"> `
                                input += `<option value="">All ApForm</option>`
                                input += `<option value="1">1</option>`
                                input += `<option value="0">0</option>`
                                input += `</select>`
                                // input = $(
                                //     `<input type="text" class="form-control form-control-sm form-filter datatable-input" data-type="string" data-key="ap_form" data-col-index="` + column.index() + `"/>`
                                // );
                            break;
                            case 4:
                                input = `<select class="custom-select datatable-input" data-type="string" data-key="activation_store_name" data-col-index="` + column.index() + `"> `
                                input += `<option value="">All Stores</option>`
                                for (const key of mstStores) {
                                    input += `<option value="${String(key.nama).toLowerCase()}">${String(key.nama).toUpperCase()}</option>`
                                }
                                input += `</select>`
                            break;
                            case 5:
                                input = $(`
                                    <div class="input-group date">
                                        <input type="text" class="form-control form-control-sm datatable-input" data-type="date" readonly data-key="lead_date" placeholder="From" id="kt_datepicker_1" data-col-index="` + column.index() + `"/>
                                    </div>
                                    <div class="input-group date d-flex align-content-center">
                                        <input type="text" class="form-control form-control-sm datatable-input" data-type="date" readonly data-key="lead_date" placeholder="To" id="kt_datepicker_2" data-col-index="` + column.index() + `"/>
                                    </div>`
                                );
                            break;
                            case 6:
                                var search = $(`
                                    <button class="btn btn-primary kt-btn btn-sm kt-btn--icon d-block">
                                        <span>
                                            <i class="la la-search"></i>
                                        </span>
                                    </button>
                                `);

                                var reset = $(`
                                    <button class="btn btn-secondary kt-btn btn-sm kt-btn--icon">
                                        <span>
                                            <i class="la la-close"></i>
                                        </span>
                                        </button>
                                `);

                                $('<th>').append(search).append(reset).appendTo(rowFilterProcess);

                                $(search).on('click', function(e) {
                                    e.preventDefault();
                                    var params = {};
                                    $(rowFilterProcess).find('.datatable-input').each(function() {
                                        var i = $(this).data('col-index');
                                        const key = $(this).data('key');
                                        const type = $(this).data('type');

                                        if( $(this).val() !='') {
                                            if (params[key]) {
                                                params[key]['end'] = $(this).val();
                                            } else {
                                                if(type == 'date') {
                                                    params[key] = {}
                                                    params[key]['start'] = $(this).val();
                                                }
                                                else {
                                                    params[key] = $(this).val();
                                                }
                                            }
                                        }
                                    });
                                    tableProcessSearch = params
                                    tableProcess.draw();
                                });

                                $(reset).on('click', function(e) {
                                    e.preventDefault();
                                    $(rowFilterProcess).find('.datatable-input').each(function(i) {
                                        $(this).val('');
                                        tableProcessSearch = {}
                                    });
                                    tableProcess.draw();
                                });
                            break;
                        }
                        if (column.index() !== 6) {
                            $(input).appendTo($('<th class="sorting_disabled">').appendTo(rowFilterProcess));
                        }
                    })

                    $('#kt_datepicker_1,#kt_datepicker_2').datepicker({
                        todayHighlight: true,
                        format: 'yyyy-mm-dd',
                        orientation: "bottom left",
                    });
                }
            })
            .on('processing.dt', function(e, settings, processing) {
                $('#processingIndicator').css('display', 'block');
                // $('#table-process').css('background-color', processing ? '#00000038' : 'white')
            });
        $("#downloadTemplate").click(function() {
            var data = '';
            $.ajax({
                type: 'GET',
                url: "{{ config('app.api.url') }}download_template_apf",
                data: data,
                xhrFields: {
                    responseType: 'blob'
                },
                headers: {
                    "Authorization": authorization,
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                success: function(response) {
                    var blob = new Blob([response]);
                    var link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = "template apf form.xlsx";
                    link.click();
                },
                error: function(blob) {
                    console.log(blob);
                }
            });
        });
        let checkedId = [];

        var tableActivatedSearch = {}
        var tableActivated = $('#table-activated').DataTable({
            processing: true,
            serverSide: true,
            // responsive: true,
            stateSave: false,
            ordering: false,
            searching: false,
            dom: `<'row'<'col-sm-12'tr>>
			<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
            // oLanguage: {
            //     sSearch: "Search by MSISDN Taiwan: "
            // },
            ajax: {
                url: "{{ route('register.ultima.table.activated') }}",
                type: 'GET',
                data: function(data) {
                    if (tableActivated) data.records_total = tableActivated.page.info().recordsTotal
                    data.filter = tableActivatedSearch
                    data.year = currYear
                },
            },
            select: {
                style: 'multi',
                selector: 'td:first-child .checkable',
            },
            columns: [
                {
                    data: null,
                    render: (data) => {
                        let value = String(data.customer_nama).toUpperCase();
                        return `<a href="#" name="detailActivated" data-toggle="modal" data-target="#ultimaActivated" data-id="${data.id}" data-id-customer="${data.id_customer}"  data-status="${data.status}">${value}</a>`
                    },
                    // width: "20%"
                },
                {
                    data: 'customer_nomor_identity_passpor',
                    render: (data) => {
                        if (data == null) {
                            return 'passport unavailable';
                        }
                        return String(data).toUpperCase();
                    },
                    // width: "5%",
                    class: 'text-center'
                },
                {
                    data: 'msisdn_tw',
                    render: (data) => {
                        if (data == null) {
                            return 'msisdn unavailable';
                        }
                        return data;
                    },
                    // width: "5%",
                    class: 'text-center'
                },
                {
                    data: 'activation_date',
                    render: (data) => {
                        if (data == null) {
                            return 'activation date unavailable';
                        }
                        return data.substr(0, 10);
                    },
                    class: 'text-center',
                    width: "100%"
                },
                {
                    data: 'activation_store_name',
                    name: 'activation_store_name',
                    render: (data) => {
                        return String(data).toUpperCase();
                    },
                    class: 'text-center',
                    width: '10%'

                },
                {
                    data: 'customer_nationality',
                    render: (data) => {
                        if (data == null) {
                            return 'nationality unavailable';
                        }
                        return String(data).toUpperCase();
                    },
                    // width: "8%",
                    class: 'text-center'
                },
                {
                    data: 'tsel_expired_date',
                    render: (data) => {
                        if (data == null) {
                            return 'tsel_exp unavailable';
                        }
                        return data;
                    },
                    // width: "18%",
                    class: 'text-center'
                },
                {
                    data: 'apform_location',
                    render: (data) => {
                        if (data == null) {
                            return 'STORE/ASPRO';
                        }
                        return String(data).toUpperCase();
                    },
                    // width: "8%",
                    class: 'text-center'
                },
                {
                    data: null,
                    render: function(data) {
                        return `<label class="checkbox checkbox-single checkbox-primary mb-0"><input type="checkbox" name="apform_location" data-id="${data.id}" data-id-customer="${data.id_customer}" class="checkable"/><span></span></label>`;
                    },
                    // width: "5%"
                },
            ],
            initComplete: function() {
                var thisTable = this;
                var rowFilterActivated = $('<tr class="filter"></tr>').appendTo($(tableActivated.table().header()));
                var rowFilterActivated = $('#table-activated-search-input')
                this.api().columns().every(function() {
                    const column = this;
                    var input;

                    switch (column.index()) {
                        case 0:
                            input = $(`
                                <div class="form-group col-3 mb-6">
                                    <label>Name</label>
                                    <input type="text" class="form-control form-control-sm form-filter datatable-input" data-type="string" data-key="customer_nama" data-col-index="` + column.index() + `"/>
                                </div>
                            `);
                        break;
                        case 1:
                            input = $(`
                                <div class="form-group col-3 mb-6">
                                    <label>Passport</label>
                                    <input type="text" class="form-control form-control-sm form-filter datatable-input" data-type="string" data-key="customer_nomor_identity_passpor" data-col-index="` + column.index() + `"/>
                                </div
                            `);
                        break;
                        case 2:
                            input = $(`
                                <div class="form-group col-3 mb-6">
                                    <label>MSISDN TW</label>
                                    <input type="text" class="form-control form-control-sm form-filter datatable-input" data-type="string" data-key="msisdn_tw" data-col-index="` + column.index() + `"/>
                                </div>`);
                        break;
                        case 3:
                            input = $(`
                                <div class=" col-3 mb-6">
                                    <label>Activation Date</label>
                                    <div class="input-daterange input-group">
                                        <input type="text" class="form-control datatable-input" data-type="date" readonly data-key="activation_date" placeholder="From" id="kt_datepicker_1" data-col-index="` + column.index() + `"/>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-ellipsis-h"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control datatable-input" data-type="date" readonly data-key="activation_date" placeholder="To" id="kt_datepicker_2" data-col-index="` + column.index() + `"/>
                                    </div>
                                </div>
                            `);
                        break;
                        case 4:
                            input = `<div class=" col-3 mb-6">`
                            input += `<label>Activation Store</label>`
                            input += `<select class="custom-select datatable-input" data-type="string" data-key="activation_store_name" data-col-index="` + column.index() + `"> `
                            input += `<option value="">All Stores</option>`
                            for (const key of mstStores) {
                                input += `<option value="${String(key.nama).toLowerCase()}">${String(key.nama).toUpperCase()}</option>`
                            }
                            input += `</select>`
                            input += `</div>`
                            // input = $(`
                            //     <input type="text" class="form-control form-control-sm form-filter datatable-input" data-type="string" data-key="activation_store_name" data-col-index="` + column.index() + `"/>`
                            // );
                        break;
                        case 5:
                            input = `<div class=" col-3 mb-6">`
                            input += `<label>Nationality</label>`
                            input += `<select class="custom-select datatable-input" data-type="string" data-key="customer_nationality" data-col-index="` + column.index() + `"> `
                            input += `<option value="">All Nations</option>`
                            for (const key in mstNations) {
                                const nation = capitalize(mstNations[key])
                                input += `<option value="`+String(nation).toLocaleLowerCase()+`">${nation}</option>`
                            }
                            input += `</select>`
                            input += `</div>`
                        break;
                        case 6 :
                            input = $(`
                                <div class="form-group col-3 mb-6">
                                    <label>TSEL EXP</label>
                                    <div class="input-daterange input-group">
                                        <input type="text" class="form-control form-control-sm datatable-input" data-type="date" readonly data-key="tsel_expired_date" placeholder="From" id="kt_datepicker_1" data-col-index="` + column.index() + `"/>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-ellipsis-h"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control form-control-sm datatable-input" data-type="date" readonly data-key="tsel_expired_date" placeholder="To" id="kt_datepicker_2" data-col-index="` + column.index() + `"/>
                                    </div>
                                </div>`
                            );
                        break;
                        case 7:
                            input = `<div class=" col-3 mb-6">`
                            input += `<label>AP. Form Location</label>`
                            input += `<select class="custom-select datatable-input" data-type="string" data-key="apform_location" data-col-index="` + column.index() + `"> `
                            input +=`   <option value="">All Location</option>`
                            input +=`   <option value="Store/ASPro">Store/ASPro</option>`
                            input +=`   <option value="Telkom Taiwan">Telkom Taiwan</option>`
                            input +=`   <option value="T-Star">T-Star</option>`
                            input +=`</select>`
                            input +=`</div>`
                        break;
                        case 8:
                            var divSearch = $(`<div class=" col-12 mb-6">`)
                            var search = $(`
                                <button class="btn btn-primary kt-btn btn-sm kt-btn--icon">
                                    <span>
                                        <i class="la la-search"></i>
                                        <span>Search</span>
                                    </span>
                                </button>
                            `);

                            var reset = $(`
                                <button class="btn btn-secondary kt-btn btn-sm kt-btn--icon">
                                    <span>
                                        <i class="la la-close"></i>
                                        <span>Reset</span>
                                    </span>
                                    </button>
                            `);

                            divSearch.append(search).append(`&nbsp;&nbsp`).append(reset).appendTo(rowFilterActivated);

                            $(rowFilterActivated).find('.datatable-input').keypress(function (e) {
                                var key = e.which;
                                if(key == 13)  // the enter key code
                                {
                                    $(search).click();
                                    return false;
                                }
                            });

                            $(search).on('click', function(e) {
                                e.preventDefault();
                                var params = {};
                                $(rowFilterActivated).find('.datatable-input').each(function() {
                                    var i = $(this).data('col-index');
                                    const key = $(this).data('key');
                                    const type = $(this).data('type');
                                    if( $(this).val() !='') {
                                        if (params[key]) {
                                            params[key]['end'] = $(this).val();
                                        } else {
                                            if(type == 'date') {
                                                params[key] = {}
                                                params[key]['start'] = $(this).val();
                                            }
                                            else {
                                                params[key] = $(this).val();
                                            }
                                        }
                                    }
                                });
                                tableActivatedSearch = params
                                tableActivated.draw();
                            });

                            $(reset).on('click', function(e) {
                                e.preventDefault();
                                $(rowFilterActivated).find('.datatable-input').each(function(i) {
                                    $(this).val('');
                                    tableActivatedSearch = {}
                                });
                                tableActivated.draw();
                            });
                        break;
                    }
                    if (column.index() !== 8) {
                        // $(input).appendTo($('<th class="sorting_disabled">').appendTo(rowFilterActivated));
                            $(input).appendTo(rowFilterActivated);
                    }
                })

                $('#kt_datepicker_1,#kt_datepicker_2').datepicker({
                    todayHighlight: true,
                    format: 'yyyy-mm-dd',
                    orientation: "bottom left",
                });
            }
        }).on('change', 'input[type="checkbox"]:checked', function() {
            $.each($("input[name='apform_location']:checked"), function() {
                // checkedId.push($(this).val());
            });
            // console.log(checkedId);
        });

        const convertActivationStore = (data) => {
            var store = [];
            var resData;
            console.log('Current ', data);
            $.ajax({
                type: "GET",
                url: "{{ route('data-master.stores') }}",
                async: false,
                success: function(res) {
                    const result = res.data;
                    console.log('Result: ', result);
                    for (let i = 0; i < result.length; i++) {
                        if (result[i].id == data.id_activation_store) {
                            store.push(result[i]);
                        }
                    }
                    resData = store[0].nama;
                }
            });
            if (resData == undefined) {
                return data.id_activation_store;
            } else {
                return resData;
            }
        };

        let updateApForm = $('#update-apForm');
        updateApForm.on('click', () => {
            checkedId = [];
            $.each($("input[name='apform_location']:checked"), function() {
                let id_customer = $(this).attr('data-id');
                let id = $(this).attr('data-id-customer');
                const form = {
                    id: id,
                    id_customer: id_customer
                };
                checkedId.push(form);
            });
            //
            return postUpdateApForm(checkedId);
        });

        const postUpdateApForm = (object) => {
            const data = object;
            const apFormLocation = $('#inputGroupSelect04').val();
            // console.log('Processing Data: ', data);
            // console.log('Processing ApForm: ', apFormLocation);
            for (let i = 0; i < data.length; i++) {
                $.ajax({
                    url: "{{ config('app.api.url') }}update_ap_form_customer",
                    method: "POST",
                    timeout: 0,
                    headers: {
                        "Authorization": authorization,
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    data: {
                        "apform_location": apFormLocation,
                        "tipe_number": "kartu_as",
                        "id_customer": data[i].id,
                        "id_customer_number": data[i].id_customer,
                    },
                    success: function(result) {
                        console.log(result);
                        swal.fire({
                            text: `${result.status.msg}!`,
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn font-weight-bold btn-light-primary"
                            }
                        });
                        tableActivated.ajax.reload()
                    },
                    error: function(xhr, status, error) {
                        var err = JSON.parse(xhr.responseText);
                        console.log(err);
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
        }

        const updateLead = (id, id_customer) => {
            const url = `{{ url('register/ultima/update/lead/${id}/${id_customer}') }}`;
            return `<a href="${url}" name="updateLead" class="btn btn-success btn-sm btn-block waves-effect waves-light">Update</a>`;
        }

        const updateProcess = (id, id_customer) => {
            const url = `{{ url('register/ultima/update/process/${id}/${id_customer}') }}`;
            return `<a href="${url}" class="btn btn-success btn-sm btn-block waves-effect waves-light">Update</a>`;
        }

        $("input[name='okFilterLead']").on('change', () => {
            let typeLeads = $('input:checkbox[name="okFilterLead"]:checked').map(function() {
                return '^' + this.value + '\$';
            }).get().join('|');
            tableLead.column(6).search(typeLeads, true, false, false).draw(false);
        });

        $("input[name='okFilterProcess']").on('change', () => {
            let checkedType = $('input:checkbox[name="okFilterProcess"]:checked').map(function() {
                return '^' + this.value + '\$';
            }).get().join('|');
            tableProcess.column(7).search(checkedType, true, false, false).draw(false);
        });

        $(document).on("click", "a[name='detailLead']", function() {
            let id_customer = $(this).attr('data-id');
            let id = $(this).attr('data-id-customer');
            // let id = $(this).attr('data-id-customer');
            let status = $(this).data('status')
            if (status == 'lead') {
                $('.btn-cetak').hide();
            } else {
                $('.btn-cetak').show();
            }
            return getUltimaDetail(id, id_customer);
        });

        $(document).on("click", "a[name='detailProcess']", function() {
            let id_customer = $(this).attr('data-id');
            let id = $(this).attr('data-id-customer');
            return getUltimaDetail(id, id_customer);
        });

        $(document).on("click", "a[name='detailActivated']", function() {
            let id_customer = $(this).attr('data-id');
            let id = $(this).attr('data-id-customer');

            return getActivatedDetail(id, id_customer);
        });
        const getActivatedDetail = (id, id_customer) => {
            $.ajax({
                url: `{{ url('register/ultima/detailSummary/${id}/${id_customer}') }}`,
                type: "GET",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(result) {
                    // console.log(result);
                    let customer = result.customer;
                    let customerIdentity = result.customer_identity[1];
                    let customerIdentityData = result.customer_identity;
                    const testIqbal = customerIdentityData.pop().upload_identity;
                    uploadIdDatas = testIqbal.split(';');
                    // console.log (uploadIdDatas);

                    let customerNumber = result.customer_number;
                    $('#nameActivated').val(customer.nama);
                    $('#birthdateActivated').val(customer.tgl_lahir);
                    $('#passportActivated').val(customerNumber
                        .customer_nomor_identity_passpor);
                    $('#nationalityActivated').val(customer.negara);
                    $('#picActivated').val(customerNumber.create_by);
                    $('#activationStoreActivated').val(customerNumber
                        .activation_store_name);
                    $('#informationActivated').val(customer.information);
                    $('tr[name="appended"]').remove();


                    $('#apiFileLink').attr('href',
                        `http://api-mygp.kartuas2in1.tw/info/${customerNumber.msisdn_tw}`
                    );

                    // Append AP Form Image Link
                    let ap_formDataActivated = customerNumber.ap_form;
                    const apformData = ap_formDataActivated.split(';');


                    const apFile_URI = `${ap_formDataActivated}`;
                    if (ap_formDataActivated != null) {
                        for(const apFileUriArray in apformData ) {
                            const apLinkList =
                                `<tr name="appended"> <td> <a href="${apformData[apFileUriArray]}" target="_blank">${apformData[apFileUriArray]} </a> </td> </tr>`;
                            $('#apFileLinks').append(apLinkList);
                        }

                        // if (apFile_URI.split(':')[0] == "https") {
                        //     const apLinkList =
                        //         `<tr name="appended"> <td> <a href="${apFile_URI}" target="_blank">${ap_formDataActivated} </a> </td> </tr>`;
                        //     $('#apFileLinks').append(apLinkList);
                        // } else {
                        //     for (var ApData in apformData) {
                        //         const APurl = apformData[ApData];
                        //         const apLinkList =
                        //             `<tr name="appended"> <td> <a href="http://sip.telin.tw:3000/${APurl}" target="_blank">${APurl} </a> </td> </tr>`;
                        //         // console.log(APurl);
                        //         $('#apFileLinks').append(apLinkList);
                        //     }
                        // }
                    }

                    // Append Customer Identity Image Link


                    let IdformDataActivated = customerIdentity.upload_identity;
                    console.log(customerIdentity)
                    const uploadID_URI = `${IdformDataActivated}`;
                    // console.log(uploadID_URI);

                    if(IdformDataActivated != null) {
                        const idFileArrays = uploadID_URI.split(';')
                        for (const indexIdFileArray in idFileArrays) {
                            const identityLinkList =
                                `<tr name="appended"> <td> <a href="${idFileArrays[indexIdFileArray]}" target="_blank">${idFileArrays[indexIdFileArray]} </a> </td> </tr>`;
                            $('#idFileLinks').append(identityLinkList);
                        }
                    }

                    // if (IdformDataActivated != null) {
                    //     if (uploadID_URI.split(':')[0] == "https") {
                    //         const identityLinkList =
                    //             `<tr name="appended"> <td> <a href="${uploadID_URI}" target="_blank">${IdformDataActivated} </a> </td> </tr>`;
                    //         $('#idFileLinks').append(identityLinkList);
                    //     } else {
                    //         const identityLinkList =
                    //             `<tr name="appended"> <td> <a href="http://sip.telin.tw:3000/${uploadID_URI}" target="_blank">${IdformDataActivated} </a> </td> </tr>`;
                    //         $('#idFileLinks').append(identityLinkList);
                    //     }
                    // } else {
                    //     for (var idData in uploadIdDatas) {
                    //         const IdUrl = uploadIdDatas[idData];
                    //         // console.log(IdUrl);
                    //         const identityLinkList =
                    //             `<tr name="appended"> <td> <a href="http://sip.telin.tw:3000/${IdUrl}" target="_blank">${IdUrl} </a> </td> </tr>`;
                    //         $('#idFileLinks').append(identityLinkList);
                    //     };
                    // }

                    if (customerNumber.availibility == 'ok_new') {
                        $('#availabilityActivated').val('OK NEW');
                    } else if (customerNumber.availibility == 'ok_former') {
                        $('#availabilityActivated').val('OK FORMER');
                    } else if (customerNumber.availibility == 'terminate') {
                        $('#availabilityActivated').val('Terminated');
                    } else {
                        $('#availabilityActivated').val('NOT OK');
                    }

                    editLinkActivated(id, id_customer);
                    printLinkActivated(id, id_customer);


                },
            });
        };


        const printLinkLead = (id, id_customer) => {
            const url =
                `{{ url('register/ultima/print/${id}/${id_customer}') }}`;
            // console.log('Detail Lead: ', url);
            $('#printLead').attr('href', url)
        };

        const printLinkActivated = (id, id_customer) => {
            const url =
                `{{ url('register/ultima/print/${id}/${id_customer}') }}`;
            // console.log('Detail Lead: ', url);
            $('#printLinkActivated').attr('href', url)
        };

        const editLinkLead = (id, id_customer) => {
            const url =
                `{{ url('register/ultima/update/lead/${id}/${id_customer}') }}`;
            // console.log('Detail Lead: ', url);
            $('#editLead').attr('href', url)
        };

        const editLinkActivated = (id, id_customer) => {
            const url =
                `{{ url('register/ultima/update/activated/${id}/${id_customer}') }}`;
            $('#editActivated').attr('href', url)
        };



        // (function($) {
        //     // declare function
        //     $.fn.toggleDisabled = function() {
        //         return this.each(function() {
        //             var $this = $(this);
        //             if ($this.attr('disabled')) $this.removeAttr('disabled');
        //             else $this.attr('disabled', 'disabled');
        //         });
        //     };
        // })(jQuery);

        // $('#editActivated').click(function() {
        //     // toggleActivatedForm();
        //     console.log(this);
        // });

        // const toggleActivatedForm = () => {
        //     $('#nameActivated').toggleDisabled();
        //     $('#birthdateActivated').toggleDisabled();
        //     $('#passportActivated').toggleDisabled();
        //     $('#nationalityActivated').toggleDisabled();
        //     $('#picActivated').toggleDisabled();
        //     $('#activationStoreActivated').toggleDisabled();
        //     $('#informationActivated').toggleDisabled();
        //     $('#availabilityActivated').toggleDisabled();
        //     $('#apFormUploadActivated').toggleDisabled();
        //     $('#customerIdUploadActivated').toggleDisabled();
        // }


        const getUltimaDetail = (id, id_customer) => {
            $.ajax({
                url: `{{ url('register/ultima/detailSummary/${id}/${id_customer}') }}`,
                type: "GET",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(result) {
                    let customer = result.customer;
                    let customerIdentity = result.customer_identity[0];
                    let customerNumber = result.customer_number;
                    // console.log(customerNumber.msisdn_tw);
                    // let msisdn_tw = result.customer_number;
                    $('#customerName').val(customer.nama);
                    $('input[name="birthdate"]').val(customer.tgl_lahir);
                    $('input[name="passport"]').val(customerNumber
                        .customer_nomor_identity_passpor);
                    $('input[name="nationality"]').val(customer.negara);
                    $('#pic').val(customerNumber.create_by);
                    $('#availability').val(customerNumber.availibility);
                    if (customerNumber.availibility == 'ok_new') {
                        $('#availability').val('OK NEW');
                    } else if (customerNumber.availibility == 'ok_former') {
                        $('#availability').val('OK FORMER');
                    } else if (customerNumber.availibility == 'terminate') {
                        $('#availability').val('Terminated');
                    } else {
                        $('#availability').val('NOT OK');
                    }
                    $('textarea[name="information"]').val(customer.information);
                    $('#APIdetail').attr('href',
                        `http://api-mygp.kartuas2in1.tw/info/${customerNumber.msisdn_tw}`
                    );
                    // $("a[name='identityFile']").attr('href',
                    //     'http://20.194.7.52:3000/' + customerNumber.ap_form);

                    // getActivationStore(customerNumber.id_activation_store);
                    $('input[name="activationStore"]').val(customerNumber
                        .activation_store_name);

                    editLinkLead(id, id_customer);

                    printLinkLead(id, id_customer);
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
        const capitalize = (value) => {
            if (!value) {
                value = ''
            }

            return value.replace(/(^\w{1})|(\s+\w{1})/g, letter => letter.toUpperCase());

        }

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
                    $('#exportStartDate').datepicker({
                        rtl: KTUtil.isRTL(),
                        todayHighlight: true,
                        format: 'yyyy-mm-dd',
                        orientation: "bottom left",
                        templates: arrows
                    });

                    // Alert
                    $('#exportEndDate').datepicker({
                        rtl: KTUtil.isRTL(),
                        todayHighlight: true,
                        format: 'yyyy-mm-dd',
                        orientation: "bottom left",
                        templates: arrows
                    });
                }
            };
        }();
        KTBootstrapDatepicker.init();
        // $(function() {
        //     $('#editProcess').click(function() {
        //         // menggunakan id:
        //         $('#customerName').toggleDisabled();
        //         $('#birthdate').toggleDisabled();
        //         $('#passport').toggleDisabled();
        //         $('#nationality').toggleDisabled();
        //         $('#activationStore').toggleDisabled();
        //         $('#pic').toggleDisabled();
        //         $('#information').toggleDisabled();
        //         $('#availability').toggleDisabled();
        //     });
        // });



    });
</script>

@endpush
