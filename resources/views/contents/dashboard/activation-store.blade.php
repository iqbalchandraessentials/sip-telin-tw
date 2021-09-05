{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="table table-bordered table-checkable" id="activationStore-table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Act. Store</th>
                        <th>City</th>
                        <th>District</th>
                        <th>Act. Date (Earlier)</th>
                        <th>Act. Date (Recent)</th>
                        <th>Num Activation</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
            <!--end: Datatable-->
        </div>
    </div>
    <!--end::Card-->

@endsection

{{-- Styles Section --}}
@push('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush


{{-- Scripts Section --}}
@push('scripts')
    {{-- vendors --}}
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>

    {{-- page scripts --}}
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script>
        $(function() {
            let tblActivationStore = $('#activationStore-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: "{{ route('data-master.stores') }}",
                method: "GET",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'city_name',
                        name: 'city_name'
                    },
                    {
                        data: 'district_name',
                        name: 'district_name'
                    },
                    {
                        data: 'act_date_earlier',
                        name: 'act_date_earlier',
                    },
                    {
                        data: 'act_date_recent',
                        name: 'act_date_recent'
                    },
                    {
                        data: 'act_number',
                        name: 'act_number'
                    }
                ]
            });
        });

    </script>
@endpush
