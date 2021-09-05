{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Customer APForm SLA >= 45 Days</h3>
                    </div>
                    <div class="card-toolbar">
                        <ul class="nav nav-light-success nav-bold nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url('dashboard/apform-performance/sla') }}"  >
                                    <span class="nav-icon">
                                        <i class="flaticon-warning text-danger"></i>
                                    </span>
                                    <span class="nav-text text-danger">SLA</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('dashboard/apform-performance/type') }}"  >
                                    <span class="nav-icon">
                                        <i class="flaticon2-checking"></i>
                                    </span>
                                    <span class="nav-text">Type</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-xl-12">
                        <table class="table table-bordered" id="result-query-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Passport</th>
                                    <th>MSISDN Taiwan</th>
                                    <th>Act. Date</th>
                                    <th>Act. Store</th>
                                    <th>Nationality</th>
                                    <th>TSEL ExpDate</th>
                                    <th>APForm Location</th>
                                    <th>APForm SLA</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
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
        $(function() {
            const capitalize = (value) => {
                if (value == null) { // test for null or undefined
                    return "";
                }
                return value.replace(/(^\w{1})|(\s+\w{1})/g, letter => letter.toUpperCase());
            }
            var table = $('#result-query-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                pagingType: 'simple',
                ajax: {
                    url : "{{ url('dashboard/apform-performance/sla/list') }}",
                    type: 'GET',
                    data: function (data) {
                        if(table) {

                            var recordsTotal = table.page.info().recordsTotal
                            var currPage = table.page()
                            var offset = data.start
                            var length = data.length
                            var nextPage = (offset > 0) ? (offset/length)+1 : 0

                            if(nextPage > currPage) {
                                data.last_id_customer = table.row( ':last-child' ).data().id_customer
                                data.page_control = 'next'
                            }
                            else {
                                data.last_id_customer = table.row(':eq(0)').data().id_customer
                                data.page_control = 'prev'
                            }

                            data.records_total = recordsTotal
                        }
                    },
                },
                select: {
                    style: 'multi',
                    selector: 'td:first-child .checkable',
                },
                columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                }, {
                    data: null,
                    render: (data) => {
                        let value = capitalize(data.customer_nama);
                        return `<a href="#" name="detailActivated" data-toggle="modal" data-target="#ultimaActivated" data-id="${data.id}" data-id-customer="${data.id_customer}">${value}</a>`
                    },
                }, {
                    data: 'customer_nomor_identity_passpor',
                    render: (data) => {
                        if (data == null) {
                            return 'passport unavailable';
                        }
                        return data;
                    }
                }, {
                    data: 'msisdn_tw',
                    render: (data) => {
                        if (data == null) {
                            return 'msisdn unavailable';
                        }
                        return data;
                    }
                }, {
                    data: 'activation_date',
                    render: (data) => {
                        if (data == null) {
                            return 'activation date unavailable';
                        }
                        return data.substr(0, 10);
                    }
                }, {
                    data: 'activation_store_name',
                    name: 'activation_store_name',
                }, {
                    data: 'customer_nationality',
                    render: (data) => {
                        if (data == null) {
                            return 'nationality unavailable';
                        }
                        return capitalize(data);
                    }
                }, {
                    data: 'tsel_expired_date',
                    render: (data) => {
                        if (data == null) {
                            return 'tsel_exp unavailable';
                        }
                        return data;
                    }
                }, {
                    data: 'apform_location',
                    render: (data) => {
                        if (data == null) {
                            return '';
                        }
                        return data;
                    }
                },
                {
                    data: 'ap_form_sla',
                    render: (data) => {
                        if (data == null) {
                            return '';
                        }
                        return data;
                    }
                }],
                order: [
                    [1, 'asc']
                ]
            });
        });

    </script>
@endpush
