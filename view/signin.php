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
  <?php if ($_SESSION['loginAs'] == 'not_admin') { ?>
    <script type="text/javascript">
      $(document).ready(function() {
        toastr.options.timeOut = 3000; // 1.5s
        toastr.warning('You are not an admin. Please login from here.');
      });
    </script>
  <?php } ?>
  <?php if ($_SESSION['reset'] == 'success') { ?>
    <script type="text/javascript">
      $(document).ready(function() {
        toastr.options.timeOut = 2500; // 1.5s
        toastr.success('Your password is reset', 'Success!');
      });
    </script>
  <?php }$_SESSION["reset"]= ''; ?>

  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
          <a href="index.php"><img src="img/logo/logo.png" alt="IMG" /></a>
        </div>


        <form id="form" method="POST" action="../controller//userController.php" class="login100-form validate-form">


          <span class="login100-form-title">
            SIGN IN <span style="color: rgb(54, 169, 225)">NOW</span>
          </span>

          <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
            <input class="input100" type="text" id="email" name="email" placeholder="Email" />
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Password is required">
            <input class="input100" type="password" id="password" name="password" placeholder="Password" />
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>
          <input class="input100" name="login_user" style="display:none" />
          <div class="container-login100-form-btn">
          <input type="submit"  class="login100-form-btn" id="login_user" value="login">
          </div>
          <div id="error"></div>

          <div class="text-center p-t-12">
            <span class="txt1"> Forgot </span>
            <a class="txt2" href="emailResetPassword.php"> Password? </a>
          </div>

          <div class="text-center p-t-120">
            <a class="txt2" href="signup.php">
              Create your Account
              <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
            </a>
          </div>
          <div class="text-center p-t-10">
            <a class="txt2" href="signinAdmin.php">
              Are you an admin?
              <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
            </a>
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
   <script>
    var email=document.getElementById("email");
    var password=document.getElementById("password");
    var xhr=new XMLHttpRequest();
    var submitB=document.getElementById('login_user');
    var form=document.getElementById('form');
    var error=document.getElementById('error');
    submitB.addEventListener('click',checkInfo)
    var response;
    function checkInfo(e)
    {
      e.preventDefault();
      xhr.open('POST',"../controller/checkSignIn.php");
      xhr.setRequestHeader("Content-Type","application/json");
      var infoJson='{"email":"'+email.value+'","password":"'+password.value+'"}';
      xhr.onload=function()
      {
        response=this.responseText.trim()
        if(response=='') form.submit() ;
        else error.innerHTML=response;
        
      }
      xhr.send(infoJson);
    }
    
  </script>
  <!--===============================================================================================-->
  <script src="js/main.js"></script>
  <script src="js/login.js"></script>
</body>

</html>