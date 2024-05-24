<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8" />
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('/admin_assets/images/favicon.ico') }}">

    <!-- third party css -->
    <link href="{{ asset('/admin_assets/css/vendor/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
    <!-- third party css end -->

    <!-- App css -->
    <link href="{{ asset('/admin_assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin_assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />


    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <!-- IconPicker CSS -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-iconpicker@1.10.0/dist/css/bootstrap-iconpicker.min.css">



    <!-- Bootstrap Tags Input CSS -->
    {{-- <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"> --}}




    <script>
        var pusherAppKey = "{{ config('settings.pusher_key') }}";
        var pusherCluster = "{{ config('settings.pusher_cluster') }}";
    </script>


    @vite(['resources/js/app.js']);
</head>

<body class="loading" data-layout-color="light" data-leftbar-theme="dark" data-layout-mode="fluid"
    data-rightbar-onstart="true">
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        @include('admin.sidebar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                @include('admin.header')
                <!-- end Topbar -->

                <!-- Start Content-->
                @yield('content')
                <!-- container -->

            </div>
            <!-- content -->

            <!-- Footer Start -->
            @include('admin.footer')
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    <div class="end-bar">

        <div class="rightbar-title">
            <a href="javascript:void(0);" class="end-bar-toggle float-end">
                <i class="dripicons-cross noti-icon"></i>
            </a>
            <h5 class="m-0">Settings</h5>
        </div>

        <div class="rightbar-content h-100" data-simplebar>

            <div class="p-3">
                <div class="alert alert-warning" role="alert">
                    <strong>Customize </strong> the overall color scheme, sidebar menu, etc.
                </div>

                <!-- Settings -->
                <h5 class="mt-3">Color Scheme</h5>
                <hr class="mt-1" />

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="light"
                        id="light-mode-check" checked>
                    <label class="form-check-label" for="light-mode-check">Light Mode</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="dark"
                        id="dark-mode-check">
                    <label class="form-check-label" for="dark-mode-check">Dark Mode</label>
                </div>


                <!-- Width -->
                <h5 class="mt-4">Width</h5>
                <hr class="mt-1" />
                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="width" value="fluid" id="fluid-check"
                        checked>
                    <label class="form-check-label" for="fluid-check">Fluid</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="width" value="boxed" id="boxed-check">
                    <label class="form-check-label" for="boxed-check">Boxed</label>
                </div>


                <!-- Left Sidebar-->
                <h5 class="mt-4">Left Sidebar</h5>
                <hr class="mt-1" />
                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="theme" value="default" id="default-check">
                    <label class="form-check-label" for="default-check">Default</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="theme" value="light" id="light-check"
                        checked>
                    <label class="form-check-label" for="light-check">Light</label>
                </div>

                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" name="theme" value="dark" id="dark-check">
                    <label class="form-check-label" for="dark-check">Dark</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="compact" value="fixed" id="fixed-check"
                        checked>
                    <label class="form-check-label" for="fixed-check">Fixed</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="compact" value="condensed"
                        id="condensed-check">
                    <label class="form-check-label" for="condensed-check">Condensed</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="compact" value="scrollable"
                        id="scrollable-check">
                    <label class="form-check-label" for="scrollable-check">Scrollable</label>
                </div>

                <div class="d-grid mt-4">
                    <button class="btn btn-primary" id="resetBtn">Reset to Default</button>

                    <a href="https://themes.getbootstrap.com/product/hyper-responsive-admin-dashboard-template/"
                        class="btn btn-danger mt-3" target="_blank"><i class="mdi mdi-basket me-1"></i> Purchase
                        Now</a>
                </div>
            </div> <!-- end padding-->

        </div>
    </div>

    <div class="rightbar-overlay"></div>
    <!-- /End-bar -->

    <!-- bundle -->
    <script src="{{ asset('/admin_assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('/admin_assets/js/app.min.js') }}"></script>

    <!-- third party js -->
    <script src="{{ asset('/admin_assets/js/vendor/apexcharts.min.js') }}"></script>
    <script src="{{ asset('/admin_assets/js/vendor/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('/admin_assets/js/vendor/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- third party js ends -->

    <!-- demo app -->
    <script src="{{ asset('/admin_assets/js/pages/demo.dashboard.js') }}"></script>
    <!-- end demo js-->


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script>


    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>


    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>


    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
    </script>


    <script>
        $(document).ready(function() {
            $('.iconpicker').iconpicker();
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <script>
        $(document).ready(function() {
            $('.select').select2();
        });
    </script>

    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>



    <!-- Typehead -->
    <script src="{{ asset('/admin_assets/js/vendor/handlebars.min.js') }}"></script>
    <script src="{{ asset('/admin_assets/js/vendor/typeahead.bundle.min.js') }}"></script>

    <!-- Demo -->
    <script src="{{ asset('/admin_assets/js/pages/demo.typehead.js') }}"></script>

    <!-- Timepicker -->
    <script src="{{ asset('/admin_assets/js/pages/demo.timepicker.js') }}"></script>


    <!-- IconPicker JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-iconpicker@1.10.0/dist/js/bootstrap-iconpicker.bundle.min.js">
    </script>



    <!-- Bootstrap Tags Input JS -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#tagInput').tagsinput();
        });
    </script> --}}


    <script>
        $('.delete').on('click', function() {


            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    let link = $(this).data('link');
                    location.href = link;
                }
            });
        });
    </script>


    @stack('scripts')
</body>



</html>
