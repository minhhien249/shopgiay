<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from shreyu.coderthemes.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 May 2020 14:56:19 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Shopgiay</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <base href="{{ asset('') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- plugins -->
        <link href="/assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
        <!-- plugin css -->
        <link href="/assets/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/libs/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/libs/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/libs/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 
        <!-- App css -->
        <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.css">
                <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/dropzone.js"></script>
        <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        <script type="text/javascript">
            var base_url = '{{ url('/') }}';
        </script>
        @yield('my_javascript')
</head>

    <body>
        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            @include('admin.layout.topbar')
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            @include('admin.layout.slidebar')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
            @yield('content')

            @include('admin.layout.footer')
            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
        <script src="/assets/js/jquery.min.js"></script>
        <!-- Vendor js -->
        <script src="/assets/js/vendor.min.js"></script>
        <!-- optional plugins -->
        <script src="/assets/libs/moment/moment.min.js"></script>
        <script src="/assets/libs/apexcharts/apexcharts.min.js"></script>
        <script src="/assets/libs/flatpickr/flatpickr.min.js"></script>
        <!-- page js -->
        <script src="/assets/js/pages/ckeditor/ckeditor.js"></script>
        <script src="/assets/js/pages/dashboard.init.js"></script>
        <!-- datatable js -->
        <script src="/assets/libs/datatables/jquery.dataTables.min.js"></script>
        <script src="/assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="/assets/libs/datatables/dataTables.responsive.min.js"></script>
        <script src="/assets/libs/datatables/responsive.bootstrap4.min.js"></script>
        
        <script src="/assets/libs/datatables/dataTables.buttons.min.js"></script>
        <script src="/assets/libs/datatables/buttons.bootstrap4.min.js"></script>
        <script src="/assets/libs/datatables/buttons.html5.min.js"></script>
        <script src="/assets/libs/datatables/buttons.flash.min.js"></script>
        <script src="/assets/libs/datatables/buttons.print.min.js"></script>

        <script src="/assets/libs/datatables/dataTables.keyTable.min.js"></script>
        <script src="/assets/libs/datatables/dataTables.select.min.js"></script>
        <!-- Datatables init -->
        <script src="assets/js/pages/datatables.init.js"></script>
        <!-- App js -->
        <script src="/assets/js/app.min.js"></script>
        <script src="/assets/js/main.js"></script>
    </body>

<!-- Mirrored from shreyu.coderthemes.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 May 2020 14:56:19 GMT -->
</html>