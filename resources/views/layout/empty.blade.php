<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {{ Metronic::printAttrs('html') }}
    {{ Metronic::printClasses('html') }}>

<head>
    <meta charset="utf-8" />

    {{-- Title Section --}}
    <title>{{ config('app.name') }} | @yield('title', $page_title ?? '')</title>

    {{-- Meta Data --}}
    <meta name="description" content="@yield('page_description', $page_description ?? '')" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('media/logos/favicon-tltw.ico') }}" />

    {{-- Fonts --}}
    {{ Metronic::getGoogleFontsInclude() }}

    {{-- Global Theme Styles (used by all pages) --}}
    @foreach (config('layout.resources.css') as $style)
        <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($style)) : asset($style) }}"
            rel="stylesheet" type="text/css" />
    @endforeach

    {{-- Layout Themes (used by all pages) --}}
    @foreach (Metronic::initThemes() as $theme)
        <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($theme)) : asset($theme) }}"
            rel="stylesheet" type="text/css" />
    @endforeach

    {{-- Includable CSS --}}
    @stack('styles')
    @stack('addon-style')

</head>

<body {{ Metronic::printAttrs('body') }} {{ Metronic::printClasses('body') }}>

    @if (config('layout.page-loader.type') != '')
        @include('layout.partials._page-loader')
    @endif

    <!-- Page Content -->
    @yield('content')

    {{-- Global Config (global config for global JS scripts) --}}
    <script>
        var KTAppSettings = {!! json_encode(config('layout.js'), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) !!};

    </script>

    {{-- Global Theme JS Bundle (used by all pages) --}}
    @foreach (config('layout.resources.js') as $script)
        <script src="{{ asset($script) }}" type="text/javascript"></script>
    @endforeach

    {{-- Includable JS --}}
    <script>
        let encodedUsername = '{{ Session::get('user')[1]['username'] }}';
        let encodedPassword = '{{ Session::get('user')[1]['password'] }}';
        const authorization = "Basic " + btoa(atob(encodedUsername) + ":" + atob(encodedPassword));
        document.addEventListener('DOMContentLoaded', function() {
            if (Notification.permission !== "granted") {
                Notification.requestPermission();
            }
        });

        function customnotify(title, desc, url) {
            if (Notification.permission !== "granted") {
                Notification.requestPermission();
            } else {
                var notification = new Notification(title, {
                    icon: '{{ asset('media/logos/favicon-tltw.ico') }}',
                    body: desc,
                });
                /* Remove the notification from Notification Center when clicked.*/
                notification.onclick = function() {
                    window.open(url);
                };
                /* Callback function when the notification is closed. */
                notification.onclose = function() {
                    console.log('Notification closed');
                };
            }
        }
        // customnotify('New Customer Registered', 'Enter Description Here', '#');

        let canvasNotif = document.getElementById('notification-canvas');
        const notifItem = `
        <a href="url" class="navi-item">
            <div class="navi-link rounded">
                <div class="symbol symbol-50 symbol-circle mr-3">
                    <div class="symbol-label"><i class="flaticon-bell text-success icon-lg"></i></div>
                </div>
                <div class="navi-text">
                    <div class="font-weight-bold font-size-lg">
                        title
                    </div>
                    <div class="text-muted">
                        description
                    </div>
                </div>
            </div>
        </a>`;

        $(document).ready(function() {
            // setInterval("console.log('Interval Ok');", 5000);
            canvasNotif.insertAdjacentHTML('afterbegin', notifItem);
        });

        function Previous() {
            window.history.go(-1);
        }

        const logFormData = (formData) => {
            for (var i of formData.entries()) {
                console.log('KEY: ', i[0] + ', ' + 'VALUE: ', i[1]);
            }
        };

        const successAlert = (res) => {
            swal.fire({
                text: `${res.status.msg}!`,
                icon: "success",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn font-weight-bold btn-light-primary"
                }
            }).then(function() {
                Previous();
            });
        };

        const failedAlert = (xhr) => {
            var err = JSON.parse(xhr.responseText);
            swal.fire({
                text: `Sorry, ${err.status.msg}, please try again.`,
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn font-weight-bold btn-light-primary"
                }
            }).then(function() {
                KTUtil.scrollTop();
            });
        };

        const errorAlert = () => {
            swal.fire({
                text: "Sorry, looks like there are some errors detected, please try again.",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn font-weight-bold btn-light-primary"
                }
            }).then(function() {
                KTUtil.scrollTop();
            });
        };

    </script>
    @stack('scripts')


</body>

</html>
