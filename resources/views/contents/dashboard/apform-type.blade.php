{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Type</h3>
                    </div>
                    <div class="card-toolbar">


                        <ul class="nav nav-light-success nav-bold nav-pills">

                            <li class="nav-item">
                                <div id="reportrange"
                                    style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;">

                                    <span></span> <i class="fa fa-caret-down"></i>
                                </div>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('dashboard/apform-performance/sla') }}">
                                    <span class="nav-icon">
                                        <i class="flaticon-warning text-danger"></i>
                                    </span>
                                    <span class="nav-text text-danger">SLA</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url('dashboard/apform-performance/type') }}">
                                    <span class="nav-icon">
                                        <i class="flaticon2-checking"></i>
                                    </span>
                                    <span class="nav-text">Type</span>
                                </a>
                            </li>

                        </ul>
                    </div>

                </div>
                <div class="card-body text-center">
                    <div id="chart_3" align="center"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Detail</h3>
                    </div>
                </div>
                <div class="card-body">
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
                                <th>APForm Type</th>
                            </tr>
                        </thead>
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
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endpush


{{-- Scripts Section --}}
@push('scripts')
    {{-- date picker --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
        $('input[name="dates"]').daterangepicker();
        // date picker
        $(function() {

            var start = moment().subtract(29, 'days');
            var end = moment();

            function cb(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                console.log(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }

            $('#reportrange').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                }
            }, cb);
            cb(start, end);
        });
    </script>

    {{-- script download as png --}}

    <script>
        const saveToArchive = async (chartId) => {
            const chartInstance = window.Apex._chartInstances.find(chart => chart.id === chartId);
            const base64 = await chartInstance.chart.dataURI();
            return base64;
        }

        const toImage = () => {
            console.log('ok')
        }
    </script>

    {{-- page scripts --}}
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script>
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
                url: "{{ url('dashboard/apform-performance/type/list') }}",
                type: 'GET',
                data: function(data) {
                    if (table) {

                        var recordsTotal = table.page.info().recordsTotal
                        var currPage = table.page()
                        var offset = data.start
                        var length = data.length
                        var nextPage = (offset > 0) ? (offset / length) + 1 : 0

                        if (nextPage > currPage) {
                            data.last_id_customer = table.row(':last-child').data().id_customer
                            data.page_control = 'next'
                        } else {
                            data.last_id_customer = table.row(':eq(0)').data().id_customer
                            data.page_control = 'prev'
                        }

                        data.records_total = recordsTotal
                    }
                },
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
                    data: 'ap_form_type',
                    render: (data) => {
                        if (data == null) {
                            return '';
                        }
                        return data;
                    }
                }
            ],
            order: [
                [1, 'asc']
            ]
        });
    </script>

    <script>
        const apexChart = "#chart_3";
        var options = {
            series: <?= json_encode($chart['series']) ?>,

            legend: {
                show: true,
                showForSingleSeries: false,
                showForNullSeries: true,
                showForZeroSeries: true,
                position: 'bottom',
                horizontalAlign: 'center',
                floating: false,
                fontSize: '14px',
                fontFamily: 'Helvetica, Arial',
                fontWeight: 400,
                formatter: undefined,
                inverseOrder: false,
                width: undefined,
                height: undefined,
                tooltipHoverFormatter: undefined,
                customLegendItems: [],
                offsetX: 0,
                offsetY: 0,
                labels: {
                    colors: undefined,
                    useSeriesColors: false
                },
                markers: {
                    width: 12,
                    height: 12,
                    strokeWidth: 0,
                    strokeColor: '#fff',
                    fillColors: undefined,
                    radius: 12,
                    customHTML: undefined,
                    onClick: undefined,
                    offsetX: 0,
                    offsetY: 0
                },
                itemMargin: {
                    horizontal: 5,
                    vertical: 0
                },
                onItemClick: {
                    toggleDataSeries: true
                },
                onItemHover: {
                    highlightDataSeries: true
                },
            },


            chart: {
                width: '60%',
                type: 'pie',
                toolbar: {
                    show: true,
                    tools: {
                        download: true,
                        selection: true,
                        zoom: true,
                        zoomin: true,
                        zoomout: true,
                        pan: true,
                        // reset: true | '<img src="/static/icons/reset.png" width="80">',
                        customIcons: []
                    },
                    export: {
                        csv: {
                            filename: undefined,
                            columnDelimiter: ',',
                            headerCategory: 'category',
                            headerValue: 'value',
                            dateFormatter(timestamp) {
                                return new Date(timestamp).toDateString()
                            }
                        },
                        svg: {
                            filename: "APForm-Type-Performance",
                        },
                        png: {
                            filename: "APForm-Type-Performance",
                        }
                    },
                }
            },
            labels: ['APF Return', 'APF Sent', 'APF Return Back', 'APF Sent Back'],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }],
            colors: ['#D8A7B1', '#90ED7D', '#FFC107', '#E85B7F']
        };

        var chart = new ApexCharts(document.querySelector(apexChart), options);
        chart.render();
    </script>
@endpush
