<!DOCTYPE html>
<html lang="en">


<!-- auth-register.html  21 Nov 2019 04:05:01 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token()}}">
    <title>Registration</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('assets/css/app.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/bundles/jquery-selectric/selectric.css')}}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    <link rel='shortcut icon' type='image/x-icon' href="{{asset('assets/img/favicon.ico')}}" />
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

   
   
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <!-- <div class="d-flex justify-content-center align-items-center" style="height: 100vh;"> -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 style="text-align: center; margin: 0 auto;">Register</h3>
                            </div>

                            <div class="card-body">
                                <!-- <form method="POST"> -->
                                <form type="post" enctype="multipart/form-data" id="registerUser">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="first_name">First Name</label>
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-address-book"></i></span>
                                                </div>
                                                <input id="first_name" type="text" class="form-control" name="first_name" placeholder="Enter your first name">
                                            </div>
                                            <span class="text-danger form-validate" id="firstNameError"></span>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="last_name">Last Name</label>
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-address-book"></i></span>
                                                </div>
                                                <input id="last_name" type="text" class="form-control" name="last_name" placeholder="Enter your last name">
                                            </div>
                                            <span class="text-danger form-validate" id="lastNameError"></span>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="email">Email</label>
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                </div>
                                                <input id="email" type="email" class="form-control" name="email" placeholder="example@mail.com">
                                            </div>
                                            <span class="text-danger form-validate" id="emailError"></span>
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="role">Role Select</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <select class="form-control" id="role" name="role">
                                                    <option value="" selected disabled>Select Your Role</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="User">User</option>
                                                </select>
                                            </div>
                                            <span class="text-danger form-validate" id="roleError"></span>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- <div class="form-group col-6">
                                            <label for="password" class="d-block">Password</label>
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                            <div id="pwindicator" class="pwindicator">
                                                <div class="bar"></div>
                                                <div class="label"></div>
                                            </div>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-lock"></span>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="form-group col-6">
                                            <label for="password" class="d-block">Password</label>
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                                </div>
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                            </div>
                                            <span class="text-danger form-validate" id="passwordError"></span>
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="rePassword" class="d-block">Password Confirmation</label>
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                                </div>
                                                <input id="rePassword" type="password" class="form-control" name="rePassword" placeholder="Retype password">
                                            </div>
                                            <span class="text-danger form-validate" id="rePasswordError"></span>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                                            <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                                        </div>
                                    </div> -->
                                    <!-- <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Register
                                        </button>
                                    </div> -->

                                    <div class="form-group">
                                        <div id="buttonRegisterUser">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
                                        </div>
                                        <div id="buttonRegisterUserLoading" style="display: none;">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block" disabled><i class="fa fa-spinner fa-spin"></i>Process
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="mb-4 text-muted text-center">
                                Already Registered? <a href="{{route('login')}}"> Login</a>
                            </div>
                        </div>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- General JS Scripts -->
    <script src="{{asset('assets/js/app.min.js')}}"></script>
    <!-- JS Libraies -->
    <!-- <script src="{{asset('assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js')}}"></script> -->
    <script src="{{asset('assets/bundles/jquery-selectric/jquery.selectric.min.js')}}"></script>
    <!-- Page Specific JS File -->
    <!-- <script src="{{asset('assets/js/page/auth-register.js')}}"></script> -->
    <!-- Template JS File -->
    <script src="{{asset('assets/js/scripts.js')}}"></script>
    <!-- Custom JS File -->
    <script src="{{asset('assets/js/custom.js')}}"></script>

    <script>
        $(document).ready(function() {
            $('#registerUser').on('submit', function(e) {
                e.preventDefault();
                var firstName = $("#first_name").val();
                var lastName = $("#last_name").val();
                var email = $("#email").val();
                var password = $("#password").val();
                var rePassword = $("#rePassword").val();
                var role = $("#role").val();

                var validation = 0;

                if (firstName.length == 0 || firstName == "") {
                    $('#firstNameError').text("First Name is required");
                    $('#first_name').addClass('form-error');
                    validation++;
                } else {
                    $('#firstNameError').text("");
                    $('#first_ame').removeClass('form-error');
                }

                if (lastName.length == 0 || lastName == "") {
                    $('#lastNameError').text("Last Name is required");
                    $('#last_name').addClass('form-error');
                    validation++;
                } else {
                    $('#lastNameError').text("");
                    $('#last_name').removeClass('form-error');
                }

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

                if (role !== "Admin" && role !== "User") {
                    $('#roleError').text("Please choose your role correctly");
                    $('#role').addClass('form-error');
                    validation++;
                } else {
                    $('#roleError').text("");
                    $('#role').removeClass('form-error');
                }

                if (password.length == 0 || password == "") {
                    $('#passwordError').text("Password is required");
                    $('#password').addClass('form-error');
                    validation++;
                } else {
                    $('#passwordError').text("");
                    $('#password').removeClass('form-error');
                }

                if (password !== rePassword) {
                    $('#rePasswordError').text("Retype password must be the same as the password");
                    $('#rePassword').addClass('form-error');
                } else {
                    $('#rePasswordError').text("");
                    $('#rePassword').removeClass('form-error');
                }

                if (validation > 0) {
                    document.getElementById("buttonRegisterUser").style.display = "block";
                    document.getElementById("buttonRegisterUserLoading").style.display = "none";
                    return false;
                }

                $.ajax({
                    url: "{{route('register.add')}}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    dataType: "JSON",
                    data: $(this).serialize(),
                    success: function(response) {
                        console.log(response);
                        if (response.status == 200) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Register Success',
                                text: 'Registration has been successful',
                            }).then(function() {
                                window.location.href = "{{route('login')}}"
                            });
                        } else if (response.status == 202) {
                            $('#emailError').text(response.message);
                            $('#email').addClass('form-error');
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Register Failed...',
                                text: 'User has been registered'
                            });
                        }
                    },
                    error: function(response) {
                        console.log(response);
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops!',
                            text: response.message
                        }).then(function() {
                            document.getElementById("buttonRegisterUser").style.display = "block";
                            document.getElementById("buttonRegisterUserLoading").style.display = "none";
                        });
                    }
                })
            })
        })
    </script>


    <!-- SweetAlert2 -->
    <script src="{{ asset('/assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>


</body>


</html>