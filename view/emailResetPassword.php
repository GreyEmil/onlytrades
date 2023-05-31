<?php include('../controller/userController.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>OnlyTrades</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="img/favicon.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css" />
    <!--===============================================================================================-->
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

</head>

<body>
    <!-- preloader -->
    <div id="preloader">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <img src="img/icon/o.gif" alt="" />
            </div>
        </div>
    </div>
    <?php if ($_SESSION['reset_email'] == 'success') { ?>
        <script type="text/javascript">
            $(document).ready(function() {
                toastr.options.timeOut = 2500; // 1.5s
                toastr.success('Check your email', 'Reset Email Sent!');
            });
        </script>
    <?php } $_SESSION['reset_email']="";?>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt style="padding-bottom: 210px;">
                    <a href="index.php"><img src="img/logo/logo.png" alt="IMG" /></a>
                </div>


                <form method="POST" action="../controller//userController.php" class="login100-form validate-form">


                    <span class="login100-form-title">
                        RESET PASSWORD <span style="color: rgb(54, 169, 225)">NOW</span>
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" placeholder="Email" />
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button name="reset_pass_mail" class="login100-form-btn">Send reset email</button>
                    </div>

                    <div class="text-center p-t-12">
                        <span class="txt1"> Return to </span>
                        <a class="txt2" href="signin.php"> Sign In </a>
                    </div>


                </form>
            </div>
        </div>
        <footer>
            <div class="copyright-wrap s-copyright-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="copyright-text">
                                <p>
                                    Copyright © 2022 <a href="index.php">OnlyTrades</a> All
                                    Rights Reserved.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $(".js-tilt").tilt({
            scale: 1.1,
        });
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>
    <script src="js/login.js"></script>
</body>

</html>