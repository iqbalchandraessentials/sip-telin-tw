{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <!--begin::Notice-->
    <div class="alert alert-custom alert-white alert-shadow gutter-b" role="alert">
        <div class="alert-text">
            <form>
                <div class="row mb-6">
                    <div class="col-lg-3 mb-lg-0 mb-6">
                        <label>Sales Region:</label>
                        <select class="form-control selectpicker" data-live-search="true">
                            <option value=""> -- All -- </option>
                            <option value="">North Central</option>
                            <option value="">North</option>
                            <option value="">Central</option>
                            <option value="">South</option>
                            <option value="">East</option>
                            <option value="">Others</option>
                        </select>
                    </div>
                    <div class="col-lg-3 mb-lg-0 mb-6">
                        <label>Birthday:</label>
                        <div class="input-daterange input-group" id="kt_datepicker">
                            <input type="text" class="form-control datatable-input" name="start" placeholder="From"
                                data-col-index="5" />
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="la la-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control datatable-input" name="end" placeholder="To"
                                data-col-index="5" />
                        </div>
                    </div>
                    <div class="col-lg-3 mb-lg-0 mb-6">
                        <label>Residence Region:</label>
                        <select class="form-control selectpicker" data-live-search="true">
                            <option value=""> -- All -- </option>
                            <option value="">North Central</option>
                            <option value="">North</option>
                            <option value="">Central</option>
                            <option value="">South</option>
                            <option value="">East</option>
                            <option value="">Others</option>
                        </select>
                    </div>
                    <div class="col-lg-3 mb-lg-0 mb-6">
                        <label>AP. Form Status:</label>
                        <select class="form-control selectpicker" data-live-search="true">
                            <option value=""> -- All -- </option>
                            <option value="">At Store</option>
                            <option value="">Received by Telkom Taiwan</option>
                            <option value="">Validated by Telkom Taiwan</option>
                            <option value="">Sent to by Telkom Taiwan</option>
                            <option value="">Rejected by APT</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-8">
                    <div class="col-lg-3 mb-lg-0 mb-6">
                        <label>Sales City:</label>
                        <select class="form-control selectpicker" data-live-search="true">
                            <option value=""> -- All -- </option>
                            <option value="">
                                (Nothing Selected) Hsinchu City
                            </option>
                            <option value="">
                                (Nothing Selected) Hsinchu Country
                            </option>
                            <option value="">
                                (Nothing Selected) Keelung City
                            </option>
                            <option value="">
                                (Nothing Selected) New Taipei City
                            </option>
                        </select>
                    </div>
                    <div class="col-lg-3 mb-lg-0 mb-6">
                        <label>Regis Date:</label>
                        <div class="input-daterange input-group" id="kt_datepicker">
                            <input type="text" class="form-control datatable-input" name="start" placeholder="From"
                                data-col-index="5" />
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="la la-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control datatable-input" name="end" placeholder="To"
                                data-col-index="5" />
                        </div>
                    </div>
                    <div class="col-lg-3 mb-lg-0 mb-6">
                        <label>Residence City:</label>
                        <select class="form-control selectpicker" data-live-search="true">
                            <option value=""> -- All -- </option>
                            <option value="">
                                (Nothing Selected) Hsinchu City
                            </option>
                            <option value="">
                                (Nothing Selected) Hsinchu Country
                            </option>
                            <option value="">
                                (Nothing Selected) Keelung City
                            </option>
                            <option value="">
                                (Nothing Selected) New Taipei City
                            </option>
                        </select>
                    </div>
                    <div class="col-lg-3 mb-lg-0 mb-6">
                        <label>Customer Status:</label>
                        <select class="form-control selectpicker" data-live-search="true">
                            <option value="">
                                -- All --
                            </option>
                            <option value="">
                                Active
                            </option>
                            <option value="">
                                Terminate
                            </option>
                        </select>
                    </div>
                </div>
                <div class="row mb-8">
                    <div class="col-lg-3 mb-lg-0 mb-6">
                        <label>Act. Store:</label>
                        <select class="form-control selectpicker" data-live-search="true">
                            <option value="">
                                -- All --
                            </option>
                            <option value="COLUMBIA">
                                (Nothing Selected) COLUMBIA
                            </option>
                            <option value="INDELIVERY">
                                (Nothing Selected) INDELIVERY
                            </option>
                            <option value="PRE ORDER">
                                (Nothing Selected) PRE ORDER
                            </option>
                            <option value="TAIWAN STAR">
                                (Nothing Selected) TAIWAN
                                STAR
                            </option>
                        </select>
                    </div>
                    <div class="col-lg-3 mb-lg-0 mb-6">
                        <label>Act. Date:</label>
                        <div class="input-daterange input-group" id="kt_datepicker">
                            <input type="text" class="form-control datatable-input" name="start" placeholder="From"
                                data-col-index="5" />
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="la la-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control datatable-input" name="end" placeholder="To"
                                data-col-index="5" />
                        </div>
                    </div>
                    <div class="col-lg-6 mb-lg-0 mt-8">
                        <button class="btn btn-primary btn-primary--icon" id="kt_search">
                            <span>
                                <i class="la la-search"></i>
                                <span>Search</span>
                            </span>
                        </button>&#160;&#160;
                        <button class="btn btn-secondary btn-secondary--icon" id="kt_reset">
                            <span>
                                <i class="la la-close"></i>
                                <span>Reset</span>
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--end::Notice-->

    <div class="row">
        <div class="col-xl-12">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Result Query</h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="#" class="btn btn-success font-weight-bolder">
                            <span class="svg-icon svg-icon-md">
                                <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/Flatten.svg-->
                                <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g id="Stockholm-icons-/-Files-/-Download" stroke="none" stroke-width="1" fill="none"
                                        fill-rule="evenodd">
                                        <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                                        <path
                                            d="M2,13 C2,12.5 2.5,12 3,12 C3.5,12 4,12.5 4,13 C4,13.3333333 4,15 4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 C2,15 2,13.3333333 2,13 Z"
                                            id="Path-57" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                        <rect id="Rectangle" fill="#000000" opacity="0.3"
                                            transform="translate(12.000000, 8.000000) rotate(-180.000000) translate(-12.000000, -8.000000) "
                                            x="11" y="1" width="2" height="14" rx="1"></rect>
                                        <path
                                            d="M7.70710678,15.7071068 C7.31658249,16.0976311 6.68341751,16.0976311 6.29289322,15.7071068 C5.90236893,15.3165825 5.90236893,14.6834175 6.29289322,14.2928932 L11.2928932,9.29289322 C11.6689749,8.91681153 12.2736364,8.90091039 12.6689647,9.25670585 L17.6689647,13.7567059 C18.0794748,14.1261649 18.1127532,14.7584547 17.7432941,15.1689647 C17.3738351,15.5794748 16.7415453,15.6127532 16.3310353,15.2432941 L12.0362375,11.3779761 L7.70710678,15.7071068 Z"
                                            id="Path-102" fill="#000000" fill-rule="nonzero"
                                            transform="translate(12.000004, 12.499999) rotate(-180.000000) translate(-12.000004, -12.499999) ">
                                        </path>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>Download
                        </a>
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-checkable" id="result-query-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Phone (TW)</th>
                                <th>Act. Date</th>
                                <th>APForm Stat.</th>
                                <th>Information</th>
                                <th>Active</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    1
                                </td>
                                <td>
                                    <a href="#">
                                        Arviana Soetanto
                                    </a>
                                </td>
                                <td>
                                    0977749474
                                </td>
                                <td>
                                    2015-05-29 12:02:00
                                </td>
                                <td>
                                    Sent to APT by Telkom Taiwan
                                </td>
                                <td>
                                    Test
                                </td>
                                <td>
                                    1
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    2
                                </td>
                                <td>
                                    <a href="#">
                                        Arviandi Soetedjoe
                                    </a>
                                </td>
                                <td>
                                    098756444
                                </td>
                                <td>
                                    2015-05-29 12:02:00
                                </td>
                                <td>
                                    Sent to APT by Telkom Taiwan
                                </td>
                                <td>
                                    Test Example
                                </td>
                                <td>
                                    0
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!--end: Datatable-->
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
    {{-- page scripts --}}
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('#result-query-table').DataTable({
                // "pagingType": "full_numbers"
            });

        });

    </script>
@endpush
