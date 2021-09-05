{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')




<figure class="highcharts-figure">
    <div id="container"></div>
    <!-- <p class="highcharts-description">
        Venn diagrams are used to show logical relations between
        sets. This chart is showing the relationship between the
        sets "Good", "Bad", and "Cheap", with labels for the
        different intersections.
    </p>  -->
</figure>








<div class="row">
    <div class="col-xl-12">
        <div class="card card-custom">
            <div class="card-body">
                <table class="table table-bordered table-checkable" id="table-summary">
                    <thead class="text-center">
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>No. ARC</th>
                            <th>Passport</th>
                            <th>Kartu AS</th>
                            <th>Kartu Fascon</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td>1</td>
                            <td>Ryan Dika Putra</td>
                            <td>1234662297</td>
                            <td>H1255297</td>
                            <td>08651723812</td>
                            <td>083451723812</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Trianto</td>
                            <td>H1255297</td>
                            <td>1234662297</td>
                            <td>08651723812</td>
                            <td>083451723812</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Sulaiman Rasyid</td>
                            <td>H1255297</td>
                            <td>1234662297</td>
                            <td>08651723812</td>
                            <td>083451723812</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

{{-- Styles Section --}}
@push('styles')
<link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />

<style>
    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 320px;
        max-width: 700px;
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
{{-- highchart diagram --}}
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/venn.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
{{-- vendors --}}
<script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
{{-- page scripts --}}
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
<script>
    Highcharts.chart('container', {
        accessibility: {
            point: {
                descriptionFormatter: function(point) {
                    var intersection = point.sets.join(', '),
                        name = point.name,
                        ix = point.index + 1,
                        val = point.value;
                    return ix + '. Intersection: ' + intersection + '. ' +
                        (point.sets.length > 1 ? name + '. ' : '') + 'Value ' + val + '.';
                }
            }
        },
        series: [{
            type: 'venn',
            name: 'Customer Summary',
            data: [{
                    sets: ['Kartu Nusantara'],
                    value: 189
                }, {
                    sets: ['Kartu As'],
                    value: 230
                },
                {
                    sets: ['Kartu Nusantara', 'Kartu As'],
                    value: 80
                }
            ]
        }],
        title: {
            text: 'Customer Summary'
        }
    });











    // $(function() {
    //     let tableSummary = $('#table-summary').DataTable({
    //         processing: true,
    //         serverSide: true,
    //         responsive: true,
    //         ajax: "{{ route('register.summary.table') }}",
    //         method: "GET",
    //         columns: [{
    //             data: 'DT_RowIndex',
    //             name: 'DT_RowIndex'
    //         }, {
    //             data: 'customer_nama',
    //             render: function(data) {
    //                 return `<a href="#" name="detailPending" data-toggle="modal" data-target="#fasconDetail" data-id="${data}">${data}</a>`
    //             },
    //         }, {
    //             data: 'customer_nomor_identity_arc',
    //             name: 'customer_nomor_identity_arc'
    //         }, {
    //             data: 'customer_nomor_identity_passpor',
    //             name: 'customer_nomor_identity_passpor',
    //         }, {
    //             data: 'customer_arc_expired',
    //             name: 'customer_arc_expired',
    //         }, {
    //             data: 'availibility',
    //             visible: false
    //         }],
    //         order: [
    //             [1, 'asc']
    //         ]
    //     });
    // });
</script>
@endpush