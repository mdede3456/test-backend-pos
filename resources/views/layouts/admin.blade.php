<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{$page}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Test backend website" name="description" />
    <meta content="MDH DIGITAL" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    <!-- plugins -->
    <link href="{{asset('assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />

    @yield('styles')

    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('assets/libs/toastr/toastr.min.css')}}">
    <!-- End Toastr -->

</head>

<body>
    <!-- Begin page -->
    <div id="wrapper">

        <x-admin.header-component></x-admin.header-component>

        <!-- ========== Left Sidebar Start ========== -->
        <x-admin.sidebar-component></x-admin.sidebar-component>
        <!-- Left Sidebar End -->
        <div class="content-page">

            @yield('content')
            <!-- Footer Start -->
            <x-admin.footer-component></x-admin.footer-component>
            <!-- end Footer -->

        </div>
    </div>
    <!-- END wrapper -->


    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- Vendor js -->
    <script src="{{asset('assets/js/vendor.min.js')}}"></script>

    <!-- optional plugins -->

    @yield('scripts')
    <!-- page js -->

    <!-- Toastr -->
    <script src="{{ asset('assets/libs/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/libs/toastr/evolution.js') }}"></script>
    <!-- End Toastr -->

    <!-- App js -->
    <script src="{{asset('assets/js/app.min.js')}}"></script>



</body>

</html>