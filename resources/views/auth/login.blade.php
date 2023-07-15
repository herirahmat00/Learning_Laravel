<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token()}}">
    <title>Login</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('assets/css/app.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/bundles/bootstrap-social/bootstrap-social.css')}}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    <link rel='shortcut icon' type='image/x-icon' href="{{asset('assets/img/favicon.ico')}}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <style>
        .text-danger {
            color: red;
        }

        .form-error {
            border: 2px solid red;
        }
    </style>
</head>

<body>
    <div class=" loader">
    </div>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="card card-primary">
                            <div class="card-header col-12 d-flex align-items-center justify-content-center">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <img src="{{asset('assets/img/favicon.ico')}}" alt="logo" class="logo" style="max-width: 100%; height: auto;">
                                    </div>
                                    <div class="col-12 text-center">
                                        <h3>Login</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body" style="padding-bottom: 0;">
                                <form type="post" enctype="multipart/form-data" id="loginUser">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <div class="input-group">
                                            <input id="email" type="email" class="form-control" name="email" placeholder="example@mail.com">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            </div>
                                        </div>
                                        <span class="text-danger form-validate" id="emailError"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="d-block">Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                            </div>
                                        </div>
                                        <span class="text-danger form-validate" id="passwordError"></span>
                                        <div class="float-right">
                                            <a href="#" class="text-small">
                                                Forgot Password?
                                            </a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                                            <label class="custom-control-label" for="remember-me">Remember Me</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div id="buttonLoginUser">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                                        </div>
                                        <div id="buttonLoginUserLoading" style="display: none;">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block" disabled><i class="fas fa-spinner"></i>Process
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-center">
                                Don't have an account? &nbsp;<a href="{{route('register')}}"> Create One</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- General JS Scripts -->
    <script src="{{asset('assets/js/app.min.js')}}"></script>
    <!-- JS Libraies -->
    <!-- Page Specific JS File -->
    <!-- Template JS File -->
    <script src="{{asset('assets/js/scripts.js')}}"></script>
    <!-- Custom JS File -->
    <script src="{{asset('assets/js/custom.js')}}"></script>

    <script>
        $(document).ready(function() {
            $('#loginUser').on('submit', function(e) {
                e.preventDefault();
                var email = $("#email").val();
                var password = $("#password").val();

                var validation = 0;

                if (email.length == 0 || email == "") {
                    $('#emailError').text("Email is required");
                    $('#email').addClass('form-error');
                    validation++;

                } else {
                    if (!email.toString().toLowerCase().match(
                            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                        )) {
                        $('#emailError').text("Please check the email format");
                        $('#email').addClass('form-error');
                        validation++;
                    } else {
                        $('#emailError').text("");
                        $('#email').removeClass('form-error');
                    }
                }

                if (password.length == 0 || password == "") {
                    $('#passwordError').text("Password is required");
                    $('#password').addClass('form-error');
                    validation++;
                } else {
                    $('#passwordError').text("");
                    $('#password').removeClass('form-error');
                }

                if (validation > 0) {
                    document.getElementById("buttonLoginUser").style.display = "block";
                    document.getElementById("buttonLoginUserLoading").style.display = "none";
                    return false;
                }

                $.ajax({
                    url: "{{route('login.action')}}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'Access-Control-Allow-Origin': "*"
                    },
                    type: "POST",
                    dataType: "JSON",
                    cache: false,
                    data: {
                        "email": email,
                        "password": password,
                        "_token": $('meta[name="csrf-token"]').attr("content")
                    },
                    success: function(response) {
                        if (response.status == 200) {
                            Swal.fire({
                                    icon: 'success',
                                    title: 'Login Success',
                                    text: 'Login has been successful',
                                    confirmButtonText: `Save`,
                                    showConfirmButton: true,
                                })
                                .then(function() {
                                    window.location.href = response.data.url_redirect
                                });
                            console.log('Anu');
                        } else {
                            Swal.fire({
                                    icon: 'error',
                                    title: 'Login Failed...',
                                    text: response.message,
                                })
                                .then(function() {
                                    document.getElementById("buttonLoginUser").style.display = "block";
                                    document.getElementById("buttonLoginUsernLoading").style.display = "none";
                                });
                        }
                    },
                    error: function(response) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops!',
                            text: response.message
                        }).then(function() {
                            document.getElementById("buttonLoginUser").style.display = "block";
                            document.getElementById("buttonLoginUserLoading").style.display = "none";
                        });
                    }
                })

            });
        });
    </script>

    <!-- SweetAlert2 -->
    <script src="{{ asset('/assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
</body>

</html>