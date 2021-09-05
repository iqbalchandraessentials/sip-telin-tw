{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        {{-- <h3 class="card-label">Card Title With Icons</h3> --}}
                    </div>
                    <div class="card-toolbar">
                        <ul class="nav nav-light-danger nav-bold nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tab-idd">
                                    <span class="nav-text">IDD Usage</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-topup">
                                    <span class="nav-text">TopUp History</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-purchase">
                                    <span class="nav-text">Purchase History</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-idd" role="tabpanel" aria-labelledby="tab-idd">
                            <table class="table table-bordered table-checkable" id="table-idd-usage">
                                <thead>
                                    <tr>
                                        <th>Tipe</th>
                                        <th>Taiwan Number</th>
                                        <th>Time Start</th>
                                        <th>Time End</th>
                                        <th>Peer Number</th>
                                        <th>Keterangan</th>
                                        <th>Channel</th>
                                        <th>Filename</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="8" class="text-center">No data available on table</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="tab-topup" role="tabpanel" aria-labelledby="tab-topup">
                            <table class="table table-bordered table-checkable" id="table-topup">
                                <thead>
                                    <tr>
                                        <th>Upload Time</th>
                                        <th>Recharge Time</th>
                                        <th>MSISDN</th>
                                        <th>Amount</th>
                                        <th>Serial</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="5" class="text-center">No data available on table</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="tab-purchase" role="tabpanel" aria-labelledby="tab-purchase">
                            <table class="table table-bordered table-checkable" id="table-purchase">
                                <thead>
                                    <tr>
                                        <th>Upload Time</th>
                                        <th>Purchase Date</th>
                                        <th>MSISDN</th>
                                        <th>Product</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="4" class="text-center">No data available on table</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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
    {{-- vendors --}}
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>

    {{-- page scripts --}}
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('#table-idd-usage').DataTable({
                //
            });

            $('#table-topup').DataTable({
                //
            });

            $('#table-purchase').DataTable({
                //
            });
        });

    </script>
@endpush
