<!doctype html>
<html lang="en" data-layout="vertical" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none"
    data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- aos css -->
    <link rel="stylesheet" href="{{ asset('assets/libs/aos/aos.css') }}" />

    <!-- Layout config Js -->
    <script src="{{ asset('assets/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />

    @yield('css')
</head>

<body>
<body>
    <main>
        <div id="layout-wrapper">
            <header id="page-topbar">
                @include('back-office.layout.topbar')
            </header>
            <div class="app-menu navbar-menu">
                <div class="navbar-brand-box">
                    @include('back-office.layout.logo')
                </div>
                <div id="scrollbar">
                    @include('back-office.layout.sidebar')
                </div>
            </div>
            <div class="vertical-overlay"></div>
            <div class="main-content overflow-hidden">
                

                        @yield('breadcrumb')


                        @yield('content')
                   

                <footer class="footer">
                    @include('back-office.layout.footer')
                </footer>

            </div>
        </div>
    </main>
    <!-- JAVASCRIPT -->
    <script src="{{ '/assets/libs/bootstrap/js/bootstrap.bundle.min.js' }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>

    <!-- aos js -->
    <script src="{{ asset('assets/libs/aos/aos.js') }}"></script>
    <!-- prismjs plugin -->
    <script src="{{ asset('assets/libs/prismjs/prism.js') }}"></script>
    <!-- animation init -->
    <script src="{{ asset('assets/js/pages/animation-aos.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    @yield('script')
</body>

</html>
