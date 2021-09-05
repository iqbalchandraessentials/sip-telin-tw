{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card card-custom gutter-b">
                {{-- <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">{{ $type }}</h3>
                    </div>
                </div> --}}
                <div class="card-body text-center">
                    <div class="row col-12 justify-content-md-center">
                        <div class="form-group col-6">
                            <div class="input-daterange input-group">
                                <input type="text" class="form-control datatable-input" id="startDate" value="{{ $start_date }}" name="start" placeholder="From"
                                    data-col-index="5" />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-calendar-alt"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control datatable-input" id="endDate" name="end" value="{{ $end_date }}" placeholder="To" data-col-index="5" />
                                <button class="btn btn-primary" id="btn-draw">Click to Refresh !!</button>
                            </div>
                        </div>
                    </div>
                    <div id="chart" align="center"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">{{ $type }}</h3>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="tableData">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Passport</th>
                                <th>MSISDN Taiwan</th>
                                <th>City</th>
                                <th>Act. Store</th>
                                <th>Act Time</th>
                                <th>Currently</th>
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
@endpush


{{-- Scripts Section --}}
@push('scripts')
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
        var startDate = '{{ $start_date }}';
        var endDate = '{{ $end_date }}';
        var oldDate = ''
        var tableData = $('#tableData').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            stateSave: false,
            ordering: false,
            oLanguage: {
                sSearch: "Search by MSISDN Taiwan: "
            },
            ajax: {
                url: "{{ url('dashboard/registration/table') }}",
                type: 'GET',
                data: function(data) {
                    data.start_date = startDate,
                    data.end_date = endDate

                    if (data.start > 0) data.records_total = tableData.page.info().recordsTotal
                },
            },
            select: {
                style: 'multi',
                selector: 'td:first-child .checkable',
            },
            columns: [{
                data: null,
                orderable: false,
                render: function(data) {
                    return `<label class="checkbox checkbox-single checkbox-primary mb-0"><input type="checkbox" name="apform_location" data-id="${data.id}" data-id-customer="${data.id_customer}" class="checkable"/><span></span></label>`;
                }
            }, {
                data: null,
                render: (data) => {
                    let value = String(data.customer_nama).toUpperCase();
                    return `<a href="#" name="detailActivated" data-toggle="modal" data-target="#ultimaActivated" data-id="${data.id}" data-id-customer="${data.id_customer}"  data-status="${data.status}">${value}</a>`
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
            },
            {
                data: 'customer_city_name',
                name: 'customer_city_name',
            },
            {
                data: 'activation_store_name',
                name: 'activation_store_name',
            },
            {
                data: 'activation_date',
                render: (data) => {
                    if (data == null) {
                        return 'activation date unavailable';
                    }
                    return data.substr(0, 10);
                }
            },
            {
                data: 'registration_status',
                render: (data) => {
                    return (data == 'Y') ? 'Active' : 'Inactive'
                }
            }],
        })

        var chart;
        function initChart () {
            var options = {
                chart: {
                    height: 350,
                    type: 'bar',
                    events: {
                        click(event, chartContext, config) {
                            const dateSelected = config.config.series[config.seriesIndex].data[config.dataPointIndex]
                            console.log(dateSelected)
                            startDate = dateSelected.x
                            endDate = dateSelected.x
                            tableData.ajax.reload()
                        }
                    }
                },
                dataLabels: {
                    enabled: false
                },
                series: [],
                title: {
                    text: '{{ $type }} chart',
                },
                noData: {
                    text: 'Loading...'
                },
            }

            chart = new ApexCharts(
                document.querySelector("#chart"),
                options
            );
            chart.render();
        }

        function getChartData(startDate,endDate) {
            var url = "{{ url('dashboard/registration/chart') }}";
            var params = {start_date: startDate,end_date: endDate}

            $.getJSON(url,params, function(response) {
                console.log(response)
                chart.updateSeries(response)
            });
        }
        initChart()
        getChartData(startDate,endDate)

        $('#startDate').datepicker({
			todayHighlight: true,
			templates: {
				leftArrow: '<i class="la la-angle-left"></i>',
				rightArrow: '<i class="la la-angle-right"></i>',
			},
            format: 'yyyy-mm-dd',
            orientation: "bottom left",
            todayBtn: "linked",
		});
        $('#endDate').datepicker({
			todayHighlight: true,
			templates: {
				leftArrow: '<i class="la la-angle-left"></i>',
				rightArrow: '<i class="la la-angle-right"></i>',
			},
            format: 'yyyy-mm-dd',
            orientation: "bottom left",
            todayBtn: "linked",
		});

        $('#btn-draw').on('click',() => {
            const startDate = $('#startDate').val()
            const endDate = $('#endDate').val()
            getChartData(startDate,endDate)
        })
    </script>
@endpush
