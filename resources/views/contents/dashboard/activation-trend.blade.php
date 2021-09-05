{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    {{-- begin::Card --}}
    <div class="card card-custom">
        <div class="card-body">
            {{-- begin: Search Form --}}
            {{-- begin::Search Form --}}
            <div class="mb-7">
                <div class="row align-items-center">
                    <div class="col-lg-9 col-xl-8">
                        <div class="input-daterange input-group">
                            <input type="text" class="form-control datatable-input" name="fromDate" id="fromDate"
                                placeholder="From" data-col-index="5" />
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="la la-ellipsis-h"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control datatable-input" name="toDate" id="toDate"
                                placeholder="To" data-col-index="5" />
                        </div>
                    </div>
                    <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                        <button type="button" class="btn btn-light-primary px-6 font-weight-bold" id="searchBtn">
                            <span>
                                <i class="la la-search"></i>
                                <span>Search</span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            {{-- end::Search Form --}}
            <figure class="highcharts-figure">
                <div id="container"></div>
            </figure>


            <h1 id="coba"></h1>
            {{-- <div class="table-responsive">
                <table
                    class="table table-bordered table-hover scroll-horizontal-vertical w-100 table-checkable highcharts-data-table"
                    id="tblActivationTrend">
                    <thead>
                        <tr>
                            <th>Channels</th>
                            <th>Jan</th>
                            <th>Feb</th>
                            <th>Mar</th>
                            <th>Apr</th>
                            <th>May</th>
                            <th>Jun</th>
                            <th>Jul</th>
                            <th>Aug</th>
                            <th>Sep</th>
                            <th>Oct</th>
                            <th>Nov</th>
                            <th>Dec</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div> --}}

            <table class="table table-bordered table-checkable highcharts-data-table text-center table-hover"
                id="tblByMonth">
                <thead>
                    <tr id="trMonth">
                        <th>Channels</th>
                    </tr>

                    <tr>
                </thead>
                <tbody id="tdData">


                </tbody>
            </table>
        </div>
    </div>

@endsection

{{-- Styles Section --}}
@push('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <style>
        #container {
            height: 400px;
        }

        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 310px;
            max-width: 800px;
            margin: 1em auto;
            margin-top: 20px;
        }

        #datatable {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #EBEBEB;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        #datatable caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }

        #datatable th {
            font-weight: 600;
            padding: 0.5em;
        }

        #datatable td,
        #datatable th,
        #datatable caption {
            padding: 0.5em;
        }

        #datatable thead tr,
        #datatable tr:nth-child(even) {
            background: #f8f8f8;
        }

        #datatable tr:hover {
            background: #f1f7ff;
        }

    </style>
@endpush


{{-- Scripts Section --}}
@push('scripts')
    {{-- vendors --}}

    {{-- page scripts --}}
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/pages/crud/forms/widgets/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/custom/higcharts/highcharts-bundle.js') }}" type="text/javascript"></script>
    <script>
        $(() => {
            initialDatePicker();

            let lastSixMonth = getCompleteDate(new Date(), 0);
            let currentDate = getCompleteDate(new Date(), 0);
            getActivationTrendData(lastSixMonth, currentDate);
        });

        const getCompleteDate = (date, months) => {
            date.setMonth(date.getMonth() + months);
            date = date.toISOString().slice(0, 10);
            return date;
        }

        const initialDatePicker = () => {
            var arrows;
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
            // From Date
            $('#fromDate').datepicker({
                rtl: KTUtil.isRTL(),
                todayHighlight: true,
                format: 'yyyy-mm-dd',
                orientation: "bottom left",
                templates: arrows
            });

            // To Date
            $('#toDate').datepicker({
                rtl: KTUtil.isRTL(),
                todayHighlight: true,
                format: 'yyyy-mm-dd',
                orientation: "bottom left",
                templates: arrows
            });
        };

        const getActivationTrendData = (start, end) => {
            $('#fromDate').val(start);
            $('#toDate').val(end);
            $.ajax({
                // url: "{{ config('app.api.url') }}dashboard/get_activation_trend",
                url: "https://sip.telin.tw:3000/api/dashboard/get_activation_trend",
                method: "POST",
                timeout: 0,
                headers: {
                    "Authorization": authorization,
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                data: {
                    "tipe_number": "kartu_as",
                    "tgl_start": start,
                    "tgl_end": end
                },
                success: (res) => {
                    // console.log(res);
                    const table = res.data.table,
                        chart = res.data.chart;
                    const categories = chart.categories,
                        series = chart.series;
                    getDataTable(table);
                    generateChart(categories, series);
                    appendMonthTable(res.data.chart.categories);
                    appendSeries(res.data.chart.series);
                },
                error: (xhr, status, error) => {
                    var err = JSON.parse(xhr.responseText);
                    console.error('Error :', err);
                }
            });
        };

        const appendSeries = (series) => {
            const name = series.name;
            const data = series.data;

            // const data = 
            // console.log(series);
            series.forEach(e => {
                $('#tdData ').append(renderData(e));
            });
        };

        // const getValueData = (data) => {
        //     // console.log(data);
        //     data.data.forEach(element => {
        //         // console.log('Data: ', element);
        //         return `${element}`;
        //     });
        // };

        const renderData = (value) => {

            return '<tr><td>' + value.name + '</td><td>' +
                value.data[0] + '</td><td>' +
                value.data[1] + '</td><td>' +
                value.data[2] + '</td><td>' +
                value.data[3] + '</td><td>' +
                value.data[4] + '</td><td>' +
                value.data[5] + '</td><td>' +
                value.data[6] + '</td><td>' +
                value.data[7] + '</td><td>' +
                value.data[8] + '</td><td>' +
                value.data[9] + '</td><td>' +
                value.data[10] + '</td><td>' +
                value.data[11] + '</td></tr>';
        };



        const appendMonthTable = (data) => {
            // console.log(data);
            data.forEach(e => {
                // console.log(e);
                $('#trMonth').append(`<th>${e}</th>`);
            });
        };

        const getDataTable = (array) => {
            $('#tblActivationTrend').DataTable({
                data: array,
                columns: [{
                    data: 'channels'
                }, {
                    data: 'month',
                    // data: 'value',
                    orderable: false

                }, {
                    data: 'value',
                    orderable: false
                }]
            });
        };

        const generateChart = (categories, series) => {
            Highcharts.chart('container', {
                chart: {
                    type: 'area'
                },
                title: {
                    text: 'Area chart with negative values'
                },
                xAxis: {
                    categories: categories
                },
                credits: {
                    enabled: false
                },
                series: series
            });
        };

        $('#searchBtn').on('click', () => {
            let fromDate = $('#fromDate').val();
            let toDate = $('#toDate').val();

            $.ajax({
                url: "{{ config('app.api.url') }}dashboard/get_activation_trend",
                method: "POST",
                timeout: 0,
                headers: {
                    "Authorization": authorization,
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                data: {
                    "tipe_number": "kartu_as",
                    "tgl_start": fromDate,
                    "tgl_end": toDate
                },
                success: (res) => {
                    console.log(res);
                    // const table = res.data.table,
                    //     chart = res.data.chart;
                    // const categories = chart.categories,
                    //     series = chart.series;
                    // getDataTable(table);
                    // generateChart(categories, series);
                },
                error: (xhr, status, error) => {
                    var err = JSON.parse(xhr.responseText);
                    console.error('Error :', err);
                }
            })
        });
    </script>
@endpush
