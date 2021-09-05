{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Taiwan MAP</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div id="mapTaiwan"></div>
                </div>
            </div>
        </div>
    </div>

@endsection

{{-- Styles Section --}}
@push('styles')
    {{-- <link rel="stylesheet" href="{{ asset('plugins/custom/jqvmap/jqvmap.bundle.css') }}"> --}}
    <style>
        #mapTaiwan {
            height: 500px;
            min-width: 310px;
            max-width: 800px;
            margin: 0 auto;
        }

        .loading {
            margin-top: 10em;
            text-align: center;
            color: gray;
        }

    </style>
@endpush


{{-- Scripts Section --}}
@push('scripts')
    {{-- vendors --}}
    <script src="{{ asset('plugins/custom/higcharts/highmap-bundle.js') }}" type="text/javascript"></script>

    {{-- page scripts --}}
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script>
        let dataResult = [];
        $.ajax({
            url: "{{ config('app.api.url') }}dashboard/get_map",
            method: "POST",
            timeout: 0,
            headers: {
                "Authorization": authorization,
                "Content-Type": "application/x-www-form-urlencoded"
            },
            async: false,
            data: {
                "tipe_number": "kartu_as",
                "year": "2021"
            },
            success: (res) => {
                let dtChart = res.data.chart;
                console.log(res.data);
                var data = [];

                var dataChart = [];

                for (let i = 1; i < dtChart.length; i++) { // Start from 1 because array[0] is null
                    data.push(dtChart[i]);
                    dataChart.push(dtChart[i]);
                }

                // Create the chart
                Highcharts.mapChart('mapTaiwan', {
                    chart: {
                        map: 'countries/tw/tw-all'
                    },

                    title: {
                        text: 'Dashboard Taiwan Map Activation And In-Activation'
                    },

                    subtitle: {
                        text: 'Customer Telin Taiwan By City'
                    },

                    mapNavigation: {
                        enabled: true,
                        buttonOptions: {
                            verticalAlign: 'bottom'
                        }
                    },
                    tooltip: {
                        formatter: function() {
                            return '<span>Total Active Registration :  ' + this.point.options
                                .value + '</span><br><span>Total In- Active Registration : ' +
                                dataChart[this.point.index][2] + '</span>';
                        },
                        shared: true
                    },
                    colorAxis: {
                        min: 0
                    },
                    plotOptions: {
                        series: {
                            point: {
                                events: {
                                    click: function() {
                                        alert(this.name + ' : ' + this.value + ' : ' + dataChart[
                                            this.index][2]);
                                    }
                                }
                            }
                        }
                    },
                    series: [{
                        data: data,
                        name: 'Customer Telin Taiwan',
                        states: {
                            hover: {
                                color: '#BADA55'
                            }
                        },
                        dataLabels: {
                            enabled: true,
                            format: '{point.name}'
                        }
                    }]
                });
            }
        });
    </script>
@endpush
