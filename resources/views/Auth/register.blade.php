@php use Illuminate\Support\Facades\Auth; @endphp
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Register - Sign Up | Hyper - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/auth/images/favicon.ico">


    <!-- App css -->
    <link href="{{asset('auth/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('auth/css/app-creative.min.css')}}" rel="stylesheet" type="text/css" id="light-style"/>
    <link href="{{asset('auth/css/app-creative-dark.min.css')}}" rel="stylesheet" type="text/css" id="dark-style"/>

</head>

<body class="authentication-bg" data-layout-config='{"darkMode":false}'>

<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card">
                    <!-- Logo-->
                    <div class="card-header pt-4 pb-4 text-center bg-primary">
                        <a href="index.html">
                            <span><img src="{{asset('auth/images/logo.png')}}" alt="" height="18"></span>
                        </a>
                    </div>

                    <div class="card-body p-4">

                        <div class="text-center w-75 m-auto">
                            <h4 class="text-dark-50 text-center mt-0 font-weight-bold">Free Sign Up</h4>
                            <p class="text-muted mb-4">Don't have an account? Create your account, it takes less than a
                                minute </p>
                        </div>

                        <form action="{{route('registering')}}" method="post">
                            @csrf
                            @auth()
                                <div class="form-group">
                                    <label for="fullname">Full Name</label>
                                    <input class="form-control" type="text" id="fullname" disabled
                                           value="{{Auth::user()->name}}">
                                </div>

                                <div class="form-group">
                                    <label for="emailaddress">Email address</label>
                                    <input class="form-control" type="email" id="emailaddress"
                                           disabled value="{{Auth::user()->email}}">
                                </div>
                            @endauth

                            @guest()
                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    <input class="form-control" type="text" id="name" name="name" placeholder="Enter your name"
                                           required>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input class="form-control" type="email" id="email" name="email" required
                                           placeholder="Enter your email">
                                </div>
                            @endguest


                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" name="password" class="form-control"
                                           placeholder="Enter your password">
                                    <div class="input-group-append" data-password="false">
                                        <div class="input-group-text">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkbox-signup">
                                    <label class="custom-control-label" for="checkbox-signup">I accept <a href="#"
                                                                                                          class="text-muted">Terms
                                            and Conditions</a></label>
                                </div>
                            </div>

                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary" type="submit"> Sign Up</button>
                            </div>

                        </form>
                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-muted">Already have account? <a href="pages-login.html"
                                                                       class="text-muted ml-1"><b>Log In</b></a></p>
                    </div> <!-- end col-->
                </div>
                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->

<footer class="footer footer-alt">
    2018 - 2020 ?? Hyper - Coderthemes.com
</footer>

<!-- bundle -->
<script src="{{asset('auth/js/vendor.min.js')}}"></script>
<script src="{{asset('auth/js/app.min.js')}}"></script>

</body>
</html>
