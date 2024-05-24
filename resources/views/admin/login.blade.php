<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <title>Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('/admin_assets/images/favicon.ico') }}">

    <!-- App css -->
    <link href="{{ asset('/admin_assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin_assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />



</head>

<body class="loading authentication-bg" data-layout-config='{"darkMode":false}'>

    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5">
                    <div class="card">
                        <!-- Logo-->
                        <div class="card-header bg-dark">
                            <h3 class="text-center text-white">Admin Login</h3>
                        </div>

                        <div class="card-body p-4">



                            <form action="{{ route('admin.login.store') }}" method="POST">
                                @csrf


                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Email*</label>
                                    <input class="form-control" name="email" type="email" id="emailaddress" required
                                        placeholder="Enter your email">

                                </div>

                                @error('email')
                                    <strong class="text-danger my-2">
                                        {{ $message }}
                                    </strong>
                                @enderror

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password*</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control"
                                            placeholder="Enter your password" name="password">


                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>


                                    </div>

                                    @error('password')
                                        <strong class="text-danger my-2">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <button class="btn btn-dark" type="submit"> Login </button>
                                </div>

                            </form>
                        </div> <!-- end card-body -->
                    </div>

                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->


    <!-- bundle -->
    <script src="{{ asset('/admin_assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('/admin_assets/js/app.min.js') }}"></script>



</body>


</html>
