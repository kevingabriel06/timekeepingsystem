<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dleohr.dreamstechnologies.com/template-1/dleohr-horizontal/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Jun 2025 00:21:45 GMT -->

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login Page</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/favicon.png') ?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">

    <!-- Linearicon Font -->
    <link rel="stylesheet" href="<?= base_url('assets/css/lnr-icon.css') ?>">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/font-awesome.min.css') ?>">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->

</head>

<body>

    <!-- Main Wrapper -->
    <div class="inner-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox shadow-sm">
                    <div class="login-left">
                        <img class="img-fluid" src="assets/img/logo.png" alt="Logo">
                    </div>
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Login</h1>
                            <p class="account-subtitle">Access to our dashboard</p>

                            <!-- Login Form -->
                            <form id="loginForm">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="email" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-theme button-1 text-white ctm-border-radius btn-block" type="submit">Login</button>
                                </div>
                            </form>

                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                            <script>
                                $(document).ready(function() {
                                    $('#loginForm').submit(function(e) {
                                        e.preventDefault();

                                        $.ajax({
                                            url: "<?= site_url('login/submit') ?>",
                                            type: 'POST',
                                            data: $(this).serialize(),
                                            dataType: 'json',
                                            success: function(response) {
                                                if (response.status === 'success') {
                                                    Swal.fire({
                                                        icon: 'success',
                                                        title: 'Success!',
                                                        text: response.message,
                                                        confirmButtonText: 'OK'
                                                    }).then(() => {
                                                        window.location.href = response.redirect_url;
                                                    });
                                                } else {
                                                    Swal.fire({
                                                        icon: 'error',
                                                        title: 'Login Failed',
                                                        text: response.message
                                                    });
                                                }
                                            },
                                            error: function() {
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'Server Error',
                                                    text: 'Something went wrong. Please try again.'
                                                });
                                            }
                                        });
                                    });
                                });
                            </script>



                            <div class="text-center forgotpass"><a href="forgot-password.html">Forgot Password?</a></div>
                            <div class="login-or">
                                <span class="or-line"></span>
                                <span class="span-or">or</span>
                            </div>

                            <!-- Social Login -->
                            <div class="social-login">
                                <span>Login with</span>
                                <a href="javascript:void(0)" class="facebook"><i class="fa fa-facebook"></i></a><a href="javascript:void(0)" class="google"><i class="fa fa-google"></i></a>
                            </div>
                            <!-- /Social Login -->

                            <div class="text-center dont-have">Don’t have an account? <a href="register.html">Register</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url('assets/js/jquery-3.2.1.min.js') ?>" type="8eb145dfe49a41ddc42709af-text/javascript"></script>

    <!-- Bootstrap Core JS -->
    <script src="<?= base_url('assets/js/popper.min.js') ?>" type="8eb145dfe49a41ddc42709af-text/javascript"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>" type="8eb145dfe49a41ddc42709af-text/javascript"></script>

    <!-- Sticky sidebar JS -->
    <script src="<?= base_url('assets/plugins/theia-sticky-sidebar/ResizeSensor.js') ?>" type="8eb145dfe49a41ddc42709af-text/javascript"></script>
    <script src="<?= base_url('assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') ?>" type="8eb145dfe49a41ddc42709af-text/javascript"></script>

    <!-- Custom Js -->
    <script src="<?= base_url('assets/js/script.js') ?>" type="8eb145dfe49a41ddc42709af-text/javascript"></script>


    <!-- <script src="../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="8eb145dfe49a41ddc42709af-|49" defer></script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"9492c7f77b0e5df9","version":"2025.5.0","serverTiming":{"name":{"cfExtPri":true,"cfEdge":true,"cfOrigin":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"3ca157e612a14eccbb30cf6db6691c29","b":1}' crossorigin="anonymous"></script> -->
</body>

<!-- Mirrored from dleohr.dreamstechnologies.com/template-1/dleohr-horizontal/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Jun 2025 00:21:46 GMT -->

</html>