@php
$direction = config('layout.extras.notifications.offcanvas.direction', 'right');
@endphp
{{-- Notifications Panel --}}
<div id="kt_quick_notifications" class="offcanvas offcanvas-{{ $direction }} p-10">
    {{-- Header --}}
    <div class="offcanvas-header d-flex align-items-center justify-content-between mb-10">
        <h3 class="font-weight-bold m-0">
            Notifications
            <small class="text-muted font-size-sm ml-2">24 New</small>
        </h3>
        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_notifications_close">
            <i class="ki ki-close icon-xs text-muted"></i>
        </a>
    </div>

    {{-- Content --}}
    <div class="offcanvas-content pr-5 mr-n5">
        {{-- Nav --}}
        <div class="navi navi-icon-circle navi-spacer-x-0" id="notification-canvas">
            {{-- Item --}}
            <a href="#" class="navi-item">
                <div class="navi-link rounded">
                    <div class="symbol symbol-50 symbol-circle mr-3">
                        <div class="symbol-label"><i class="flaticon-bell text-success icon-lg"></i></div>
                    </div>
                    <div class="navi-text">
                        <div class="font-weight-bold font-size-lg">
                            Notification Title
                        </div>
                        <div class="text-muted">
                            Notification Description
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
