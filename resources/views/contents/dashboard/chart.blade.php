{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <div class="alert alert-custom alert-white alert-shadow fade show gutter-b" role="alert">
        <div class="alert-icon">
            <span class="svg-icon svg-icon-primary svg-icon-xl">
                {{-- begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Tools/Compass.svg --}}
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24" />
                        <path
                            d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                            fill="#000000" fill-rule="nonzero" opacity="0.3" />
                        <path
                            d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                            fill="#000000" fill-rule="nonzero" />
                    </g>
                </svg>
                {{-- end::Svg Icon --}}
            </span>
        </div>
        <div class="alert-text">
            <div class="form-group row">
                <div class="col-md-2 mt-4">
                    <h5 class="mt-4">Stat. Details On</h5>
                </div>
                <div class="col-md-10">
                    <select class="form-control selectpicker mt-5" id="year-filter" name="year-filter"
                        data-live-search="true">
                        <option value="2021">2021</option>
                        <option value="2020">2020</option>
                        <option value="2019">2019</option>
                        <option value="2018">2018</option>
                        <option value="2017">2017</option>
                        <option value="2016">2016</option>
                        <option value="2015">2015</option>
                        <option value="2002">2002</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            {{-- begin::Charts Widget 4 --}}
            <div class="card card-custom card-stretch gutter-b">
                {{-- begin::Body --}}
                <div class="card-body">
                    <figure class="highcharts-figure">
                        <div class="generatedChart" id="monthlyContainer"></div>
                    </figure>
                </div>
                {{-- end::Body --}}
            </div>
            {{-- end::Charts Widget 4 --}}
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            {{-- begin::Card --}}
            <div class="card card-custom gutter-b">
                <div class="card-body">
                    {{-- begin::Chart --}}
                    <figure class="highcharts-figure">
                        <div class="generatedChart" id="ageContainer"></div>
                    </figure>
                    {{-- end::Chart --}}
                </div>
            </div>
            {{-- end::Card --}}
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            {{-- begin::Card --}}
            <div class="card card-custom gutter-b">
                <div class="card-body">
                    {{-- begin::Chart --}}
                    <figure class="highcharts-figure">
                        <div class="generatedChart" id="genderContainer"></div>
                    </figure>
                    {{-- end::Chart --}}
                </div>
            </div>
            {{-- end::Card --}}
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            {{-- begin::Card --}}
            <div class="card card-custom gutter-b">
                <div class="card-body">
                    {{-- begin::Chart --}}
                    <figure class="highcharts-figure">
                        <div class="generatedChart" id="cityContainer"></div>
                    </figure>
                    {{-- end::Chart --}}
                </div>
            </div>
            {{-- end::Card --}}
        </div>
    </div>

@endsection

{{-- Styles Section --}}
@push('styles')
    <style>
        .generatedChart {
            height: 400px;
        }

        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 310px;
            max-width: 800px;
            margin: 1em auto;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #EBEBEB;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }

    </style>
@endpush


{{-- Scripts Section --}}
@push('scripts')
    {{-- vendors --}}
    <script src="{{ asset('plugins/custom/higcharts/highcharts-bundle.js') }}" type="text/javascript"></script>

    {{-- page scripts --}}
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script>
        $(() => {
            getDataChart();
        });

        const getDataChart = () => {
            var chart = [],
                city = [],
                gender = [],
                monthly = [];
            var categories = [];
            $.ajax({
                url: "{{ config('app.api.url') }}dashboard/get_chart",
                method: "POST",
                timeout: 0,
                headers: {
                    "Authorization": authorization,
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                data: {
                    "tipe_number": "kartu_as",
                    "year": "2021"
                },
                success: (res) => {
                    const data = res.data,
                        chart = data.chart,
                        table = data.table,
                        ageChart = chart.age,
                        cityChart = chart.city,
                        genderChart = chart.gender,
                        monthlyChart = chart.monthly;

                    getMonthlyData(monthlyChart);
                    getGenderData(genderChart);
                    getAgeData(ageChart);
                    getCityData(cityChart);
                },
                error: (xhr, status, error) => {
                    var err = JSON.parse(xhr.responseText);
                    console.error('Error :', err);
                }
            });
        };

        const getMonthlyData = (object) => {
            const data = object,
                categories = data.categories,
                series = data.series[0];

            return generateChart(
                'monthlyContainer', 'area', 'Monthly Registration', 'More than 500+ new orders',
                categories, series);
        };

        const getAgeData = (object) => {
            const data = object,
                categories = data.categories,
                series = data.series[0];

            return generateChart('ageContainer', 'area', `Subscribers' Age`, '', categories, series);
        };

        const getGenderData = (object) => {
            const data = object,
                series = data.series[0];
            Highcharts.chart('genderContainer', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Gender'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                        }
                    }
                },
                series: [series]
            });
        };

        const getCityData = (object) => {
            const data = object,
                categories = data.categories,
                series = data.series[0];

            return generateChart('cityContainer', 'column', 'City', '', categories, series);
        };

        const generateChart = (container, type, title, subtitle, categories, series) => {
            Highcharts.chart(container, {
                chart: {
                    type: type
                },
                title: {
                    text: title
                },
                subtitle: {
                    text: subtitle
                },
                xAxis: {
                    categories: categories
                },
                credits: {
                    enabled: false
                },
                series: [series]
            });
        };
    </script>
@endpush
