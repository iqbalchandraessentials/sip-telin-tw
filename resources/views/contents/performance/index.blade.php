{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<div class="alert alert-custom alert-white alert-shadow fade show gutter-b" role="alert">
    <div class="alert-icon">
        <span class="svg-icon svg-icon-primary svg-icon-xl">
            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Tools/Compass.svg-->
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
            <!--end::Svg Icon-->
        </span>
    </div>
    <div class="alert-text">
        <div class="form-group row">
            <div class="col-md-3 mt-17">
                <h5>Selected Category</h5>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <select class="form-control selectpicker mt-5" id="year-filter" name="year-filter"
                            data-live-search="true">
                            <option value="">Monthly Activation</option>
                            <option value="">Monthly IDD Voice Usage</option>
                            <option value="">AMPU (Average Minute per User) Gross</option>
                            <option value="">AMPU (Average Minute per User) Nett</option>
                            <option value="">Monthly IDD SMS Usage</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-4">
                        <div class="input-daterange input-group" id="from-to-date">
                            <input type="text" class="form-control datatable-input" name="from-date" id="from-date"
                                placeholder="From Date" data-col-index="5" />
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="la la-calendar"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control datatable-input" name="to-date" id="to-date"
                                placeholder="To Date" data-col-index="5" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card card-custom gutter-b">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Performance View</h3>
                </div>
            </div>
            <div class="card-body">
                <div id="chart_3"></div>
            </div>
        </div>
    </div>
</div>

@endsection

{{-- Styles Section --}}
@push('styles')
{{--  --}}
@endpush


{{-- Scripts Section --}}
@push('scripts')
<script src="{{ asset('js/pages/crud/forms/widgets/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/pages/features/charts/apexcharts.js') }}" type="text/javascript"></script>

{{-- page scripts --}}
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
<script>
    $(document).ready(function() {
    var KTBootstrapDatepicker = function() {
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

        return {
            // public functions
            init: function() {
                // From Date
                $('#from-date').datepicker({
                    rtl: KTUtil.isRTL(),
                    todayHighlight: true,
                    orientation: "bottom left",
                    templates: arrows
                });

                // To Date
                $('#to-date').datepicker({
                    rtl: KTUtil.isRTL(),
                    todayHighlight: true,
                    orientation: "bottom left",
                    templates: arrows
                });
            }
        };
    }();

    jQuery(document).ready(function() {
        KTBootstrapDatepicker.init();
    });
});

</script>
@endpush
