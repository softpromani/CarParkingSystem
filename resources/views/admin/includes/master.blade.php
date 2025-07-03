<!DOCTYPE html>
<html lang="en" dir="ltr" data-startbar="light" data-bs-theme="light">

<head>
    @include('admin.includes.head')
    @yield('style')
</head>


<!-- Top Bar Start -->

<body>
    <!-- Top Bar Start -->
    @include('admin.includes.topbar')
    <!-- Top Bar End -->

    <!-- leftbar-tab-menu -->
    @include('admin.includes.sidebar')
    <!--end startbar-->
    <div class="startbar-overlay d-print-none"></div>
    <!-- end leftbar-tab-menu-->


    <div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content">
            <div class="container-fluid">

                @yield('content')

            </div><!-- container -->

            <!--Start Footer-->
            @include('admin.includes.footer')
            <!--end footer-->

        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->

    <!-- Javascript  -->
    @include('admin.includes.foot')

    @include('sweetalert::alert')
    @yield('script')
    @stack('scripts')
</body>
<!--end body-->

</html>
