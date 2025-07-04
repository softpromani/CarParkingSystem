<!DOCTYPE html>
<html lang="en" dir="ltr" data-startbar="light" data-bs-theme="light">

<head>


    <meta charset="utf-8" />
    <title>Register | Mifty - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}">


    <!-- App css -->
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
</head>


<!-- Top Bar Start -->

<body>
    <div class="container-xxl">
        <div class="row vh-100 d-flex justify-content-center">
            <div class="col-12 align-self-center">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 mx-auto">
                            <div class="card">
                                <div class="card-body p-0 bg-black auth-header-box rounded-top">
                                    <div class="text-center p-3">
                                        <a href="index.html" class="logo logo-admin">
                                            <img src="{{ asset('admin/assets/images/logo-sm.png') }}" height="50"
                                                alt="logo" class="auth-logo">
                                        </a>
                                        <h4 class="mt-3 mb-1 fw-semibold text-white fs-18">Create an account</h4>
                                        <p class="text-muted fw-medium mb-0">Enter your detail to Create your account
                                            today.</p>
                                    </div>
                                </div>
                                <div class="card-body pt-0">

                                    @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif

                                    <form class="my-4" action="{{ route('admin.register.store') }}" method="post">
                                        @csrf

                                        <div class="row form-group mb-2">
                                            <div class="col-md-6">
                                                <x-input-box name="first_name" id="first_name" label="First Name"
                                                    placeholder="First name" />
                                            </div>
                                            <div class="col-md-6">
                                                <x-input-box name="last_name" id="last_name" label="Last Name"
                                                    placeholder="Last Name" />
                                            </div>
                                        </div>


                                        <div class="form-group mb-2">
                                            <x-input-box name="email" id="email" label="Email"
                                                placeholder="Enter email" type="email" />

                                        </div><!--end form-group-->

                                        <div class="form-group mb-2">
                                            <x-input-box name="password" id="password" label="Password"
                                                placeholder="Enter password" type="password" />

                                        </div><!--end form-group-->

                                        <div class="form-group mb-2">
                                            <x-input-box name="password_confirmation" id="password_confirmation"
                                                label="Confirm Password" placeholder="Enter Confirm password"
                                                type="password" />

                                        </div><!--end form-group-->

                                        <div class="form-group mb-2">
                                            <x-input-box name="mobile_number" id="mobile_number" label="Mobile Number"
                                                placeholder="Enter Mobile Number" type="text" />

                                        </div><!--end form-group-->



                                        <div class="form-group mb-0 row">
                                            <div class="col-12">
                                                <div class="d-grid mt-3">
                                                    <button class="btn btn-primary" type="submit">Log In <i
                                                            class="fas fa-sign-in-alt ms-1"></i></button>
                                                </div>
                                            </div><!--end col-->
                                        </div> <!--end form-group-->
                                    </form><!--end form-->
                                    <div class="text-center">
                                        <p class="text-muted">Already have an account ? <a href="auth-login.html"
                                                class="text-primary ms-2">Log in</a></p>
                                    </div>
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end card-body-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!-- container -->
</body>
<!--end body-->

</html>
