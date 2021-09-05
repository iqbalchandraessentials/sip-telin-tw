<!DOCTYPE html>
{{-- Template Name: Metronic - Bootstrap 4 HTML, React, Angular 11 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project. --}}
<html lang="en">
{{-- begin::Head --}}

<head>
    </script>
    {{-- End Google Tag Manager --}}
    <meta charset="utf-8" />
    <title>Login | SIP</title>
    <meta name="description" content="Login page example" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="canonical" href="https://keenthemes.com/metronic" />
    {{-- begin::Fonts --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    {{-- end::Fonts --}}
    {{-- begin::Page Custom Styles(used by this page) --}}
    <link href="{{ asset('css/pages/login/login-1.css') }}" rel="stylesheet" type="text/css" />
    {{-- end::Page Custom Styles --}}
    {{-- begin::Global Theme Styles(used by all pages) --}}
    <link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    {{-- end::Global Theme Styles --}}
    {{-- begin::Layout Themes(used by all pages) --}}
    <link href="{{ asset('css/themes/layout/header/base/light.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/themes/layout/header/menu/light.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/themes/layout/aside/dark.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/themes/layout/brand/dark.css') }}" rel="stylesheet" type="text/css" />
    {{-- end::Layout Themes --}}
    <link rel="shortcut icon" href="{{ asset('media/logos/favicon-tltw.ico') }}" />
</head>
{{-- end::Head --}}
{{-- begin::Body --}}

<body id="kt_body"
    class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
    {{-- Google Tag Manager (noscript) --}}
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
    </noscript>
    {{-- End Google Tag Manager (noscript) --}}
    {{-- begin::Main --}}
    <div class="d-flex flex-column flex-root">
        {{-- begin::Login --}}
        <div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white"
            id="kt_login">
            {{-- begin::Aside --}}
            <div class="login-aside d-flex flex-column flex-row-auto" style="background-color: #b71c1c;">
                {{-- begin::Aside Top --}}
                <div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
                    {{-- begin::Aside header --}}
                    <a href="#" class="text-center mb-10">
                        <img src="{{ asset('media/logos/logo-xl-tw-white.png') }}" class="max-h-70px" alt="" />
                    </a>
                    {{-- end::Aside header --}}
                    {{-- begin::Aside title --}}
                    <h3 class="font-weight-bolder text-center font-size-h4 font-size-h1-lg" style="color: #FFFFFF;">
                        Customer<br />Management Portal
                    </h3>
                    {{-- end::Aside title --}}
                </div>
                {{-- end::Aside Top --}}
                {{-- begin::Aside Bottom --}}
                {{-- <div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center"
                    style="background-image: url({{ asset('media/svg/illustrations/login-visual-2.svg') }})">
            </div> --}}
                {{-- end::Aside Bottom --}}
            </div>
            {{-- begin::Aside --}}
            {{-- begin::Content --}}
            <div
                class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
                {{-- begin::Content body --}}
                <div class="d-flex flex-column-fluid flex-center">
                    {{-- begin::Signin --}}
                    @include('contents.auth.shared.login')
                    {{-- end::Signin --}}

                    {{-- begin::Signup --}}
                    @include('contents.auth.shared.register')
                    {{-- end::Signup --}}

                    {{-- begin::Forgot --}}
                    {{-- @include('contents.auth.shared.forgot') --}}
                    {{-- end::Forgot --}}
                </div>
                {{-- end::Content body --}}
                {{-- begin::Content footer --}}
                <div class="d-flex justify-content-lg-start justify-content-center align-items-end py-7 py-lg-0">
                    <div class="text-dark-50 font-size-lg font-weight-bolder mr-10">
                        <span class="mr-1">2021©</span>
                        <a href="https://telin.tw/en/" target="_blank" class="text-dark-75 text-hover-primary">
                            Telin Taiwan
                        </a>
                    </div>
                </div>
                {{-- end::Content footer --}}
            </div>
            {{-- end::Content --}}
        </div>
        {{-- end::Login --}}
    </div>
    {{-- end::Main --}}

    {{-- begin::Global Config(global config for global JS scripts) --}}
    <script>
        var KTAppSettings = {
            "breakpoints": {
                "sm": 576,
                "md": 768,
                "lg": 992,
                "xl": 1200,
                "xxl": 1400
            },
            "colors": {
                "theme": {
                    "base": {
                        "white": "#ffffff",
                        "primary": "#3699FF",
                        "secondary": "#E5EAEE",
                        "success": "#1BC5BD",
                        "info": "#8950FC",
                        "warning": "#FFA800",
                        "danger": "#F64E60",
                        "light": "#E4E6EF",
                        "dark": "#181C32"
                    },
                    "light": {
                        "white": "#ffffff",
                        "primary": "#E1F0FF",
                        "secondary": "#EBEDF3",
                        "success": "#C9F7F5",
                        "info": "#EEE5FF",
                        "warning": "#FFF4DE",
                        "danger": "#FFE2E5",
                        "light": "#F3F6F9",
                        "dark": "#D6D6E0"
                    },
                    "inverse": {
                        "white": "#ffffff",
                        "primary": "#ffffff",
                        "secondary": "#3F4254",
                        "success": "#ffffff",
                        "info": "#ffffff",
                        "warning": "#ffffff",
                        "danger": "#ffffff",
                        "light": "#464E5F",
                        "dark": "#ffffff"
                    }
                },
                "gray": {
                    "gray-100": "#F3F6F9",
                    "gray-200": "#EBEDF3",
                    "gray-300": "#E4E6EF",
                    "gray-400": "#D1D3E0",
                    "gray-500": "#B5B5C3",
                    "gray-600": "#7E8299",
                    "gray-700": "#5E6278",
                    "gray-800": "#3F4254",
                    "gray-900": "#181C32"
                }
            },
            "font-family": "Poppins"
        };

    </script>
    {{-- end::Global Config --}}
    {{-- begin::Global Theme Bundle(used by all pages) --}}
    <script src="{{ asset('plugins/global/plugins.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/custom/prismjs/prismjs.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/scripts.bundle.js') }}" type="text/javascript"></script>
    {{-- end::Global Theme Bundle --}}
    <script src="{{ asset('js/pages/custom/login/login-general.js') }}"></script>
</body>
{{-- end::Body --}}

</html>
