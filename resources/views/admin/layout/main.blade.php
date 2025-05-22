<!doctype html>
<html lang="en">

@include('admin.layout.head')

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        @include('admin.layout.sidebar')
        <!--end sidebar wrapper -->
        <!--start header -->
       @include('admin.layout.header')
        <!--end header -->
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                @yield('content')
            </div>
        </div>
        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
                class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
       @include('admin.layout.footer')
    </div>
    <!--end wrapper-->
    <!--start switcher-->
    @include('admin.layout.switcher')
    <!--end switcher-->
    @include('admin.layout.script')
</body>

</html>
