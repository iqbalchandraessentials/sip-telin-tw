{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    {{-- Dashboard 1 --}}

    <div class="row">
        <div class="col-xl-4">
            <!--begin::Stats Widget 13-->
            <a href="{{ url('dashboard/registration/detail/daily') }}" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b">
                <!--begin::Body-->
                <div class="card-body">
                    <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                        <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Media/Equalizer.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5" />
                                <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />
                                <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />
                                <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                    <div class="text-inverse-danger font-weight-bolder font-size-h5 mb-2 mt-5">
                        Today
                    </div>
                    <div class="font-weight-bold text-inverse-danger font-size-lg" id="todayData">
                        {{-- today data --}}
                    </div>
                </div>
                <!--end::Body-->
            </a>
            <!--end::Stats Widget 13-->
        </div>
        <div class="col-xl-4">
            <!--begin::Stats Widget 13-->
            <a href="#" class="card card-custom bg-warning bg-hover-state-warning card-stretch gutter-b">
                <!--begin::Body-->
                <div class="card-body">
                    <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                        <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Media/Equalizer.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5" />
                                <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />
                                <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />
                                <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                    <div class="text-inverse-warning font-weight-bolder font-size-h5 mb-2 mt-5">
                        This Week
                    </div>
                    <div class="font-weight-bold text-inverse-warning font-size-lg" id="weekData">
                        {{-- week data --}}
                    </div>
                </div>
                <!--end::Body-->
            </a>
            <!--end::Stats Widget 13-->
        </div>
        <div class="col-xl-4">
            <!--begin::Stats Widget 13-->
            <a href="#" class="card card-custom bg-primary bg-hover-state-primary card-stretch gutter-b">
                <!--begin::Body-->
                <div class="card-body">
                    <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                        <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Media/Equalizer.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5" />
                                <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />
                                <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />
                                <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                    <div class="text-inverse-primary font-weight-bolder font-size-h5 mb-2 mt-5">
                        This Month
                    </div>
                    <div class="font-weight-bold text-inverse-primary font-size-lg" id="monthData">
                        {{-- month data --}}
                    </div>
                </div>
                <!--end::Body-->
            </a>
            <!--end::Stats Widget 13-->
        </div>
    </div>

    <div class="row">
        <div class="col-xl-4">
            <!--begin::Stats Widget 13-->
            <a href="#" class="card card-custom bg-success bg-hover-state-success card-stretch gutter-b">
                <!--begin::Body-->
                <div class="card-body">
                    <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                        <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Media/Equalizer.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5" />
                                <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />
                                <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />
                                <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                    <div class="text-inverse-success font-weight-bolder font-size-h5 mb-2 mt-5">
                        This Year
                    </div>
                    <div class="font-weight-bold text-inverse-success font-size-lg" id="yearData">
                        {{-- year data --}}
                    </div>
                </div>
                <!--end::Body-->
            </a>
            <!--end::Stats Widget 13-->
        </div>
        <div class="col-xl-4">
            <!--begin::Stats Widget 16-->
            <a href="#" class="card card-custom card-stretch gutter-b">
                <!--begin::Body-->
                <div class="card-body">
                    <span class="svg-icon svg-icon-2x svg-icon-info">
                        <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Media/Equalizer.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5" />
                                <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />
                                <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />
                                <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                    <div class="text-inverse-white font-weight-bolder font-size-h5 mb-2 mt-5">Activation</div>
                    <div class="font-weight-bold text-inverse-white font-size-sm" id="activationData">
                        {{-- activaion data --}}
                    </div>
                </div>
                <!--end::Body-->
            </a>
            <!--end::Stats Widget 16-->
        </div>

        <div class="col-xl-4">
            <!--begin::Stats Widget 16-->
            <a href="#" class="card card-custom card-stretch gutter-b">
                <!--begin::Body-->
                <div class="card-body">
                    <span class="svg-icon svg-icon-2x svg-icon-info">
                        <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Media/Equalizer.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5" />
                                <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />
                                <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />
                                <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                    <div class="text-inverse-white font-weight-bolder font-size-h5 mb-2 mt-5">Active</div>
                    <div class="font-weight-bold text-inverse-white font-size-sm" id="activeData">
                        {{-- active data --}}
                    </div>
                </div>
                <!--end::Body-->
            </a>
            <!--end::Stats Widget 16-->
        </div>
    </div>
@endsection

{{-- Scripts Section --}}
@push('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
    <script>
        $(function() {
            $.ajax({
                url: "{{ config('app.api.url') }}dashboard/get_registration",
                method: "POST",
                timeout: 0,
                headers: {
                    "Authorization": authorization,
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                data: {
                    "tipe_number": "kartu_as"
                },
                success: (res) => {
                    let data = res.data;
                    $('#todayData').html(data.today_activated + '/' + data.today_activation);
                    $('#weekData').html(data.week);
                    $('#monthData').html(data.month);
                    $('#yearData').html(data.year);
                    $('#activationData').html(data.activation);
                    $('#activeData').html(data.active);
                }
            });
        });
    </script>
@endpush
