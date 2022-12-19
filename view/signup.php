<?php include('../controller/userController.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags-->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="Colorlib Templates" />
  <meta name="author" content="Colorlib" />
  <meta name="keywords" content="Colorlib Templates" />

  <!-- Title Page-->
  <title>OnlyTrades</title>
  <link rel="icon" type="image/png" href="img/favicon.png" />
  <!-- Vendor CSS-->
  <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all" />
  <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all" />
  <link rel="stylesheet" href="css/register.css" />
  <link rel="stylesheet" href="css/login.css" />
  <link rel="stylesheet" href="css/style.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
  <!-- Main CSS-->
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
  
  <!-- preloader-end -->
  <!-- <header>
      <div id="sticky-header" class="transparent-header-login">
        <div class="container-fluid s-container-full-padding">
          <div class="row">
            <div class="col-12">
              <div class="main-menu menu-style-two">
                <nav>
                  <div id="mobile-menu" class="navbar-wrap d-none d-lg-flex">
                    <ul>
                      <li class="show"><a href="index.php">Home</a></li>
                      <li><a href="trade.html">Trade</a></li>
                      <li><a href="Auction.html">Auction</a></li>
                      <li><a href="POINTSSHOP.html">POINTS SHOP</a></li>
                      <li><a href="forums.html">FORUM</a></li>
                      <li><a href="contact.html">contact</a></li>
                    </ul>
                  </div>
                  <div class="header-action"></div>
                </nav>
              </div>
              <div class="mobile-menu"></div>
            </div>
          </div>
        </div>
      </div>
    </header> -->
  <div class="limiter">
    <div class="page-wrapper bg-gra-02">
      <div class="wrapper wrapper--w960">
        <div class="card card-4">
          <div class="card-body">
            <div class="register100-pic js-tilt" data-tilt>
              <a href="index.php"><img src="img/logo/logo.png" alt="IMG" /></a>
            </div>
            <h2 class="title">
              Register <span style="color: rgb(54, 169, 225)">Now !</span>
            </h2>

            <form  id="formid" method="POST" action="../controller//userController.php" enctype="multipart/form-data">
            <div class="row row-space">
                  <div class="col-2">
                    <div class="input-group">
                      <label class="label">Username</label>
                      <input class="input--style-4" type="text" name="username" id="username" />
                    </div>
                  </div>
                </div>

              <div class="row row-space">
                <div class="col-2">
                  <div class="input-group">
                    <label class="label">first name</label>
                    <input class="input--style-4" type="text" name="firstName" id="firstName" />
                  </div>
                </div>
                <div class="col-2">
                  <div class="input-group">
                    <label class="label">last name</label>
                    <input class="input--style-4" type="text" name="lastName" id="lastName" />
                  </div>
                </div>
              </div>
              <div class="row row-space">
                <div class="col-2">
                  <div class="input-group">
                    <label class="label">Birthday</label>
                    <div class="input-group-icon">
                      <input class="input--style-4 js-datepicker" style="height:50px" type="date" name="birthdate" id="birthdate" />
                      <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                    </div>
                  </div>
                </div>
                <div class="col-2">
                  <div class="input-group">
                    <label class="label">Gender</label>
                    <div class="p-t-10">
                      <label class="radio-container m-r-45">Male
                        <input type="radio" checked="checked" name="gender" />
                        <span class="checkmark"></span>
                      </label>
                      <label class="radio-container">Female
                        <input type="radio" name="gender" />
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row row-space">
                <div class="col-2">
                  <div class="input-group">
                    <label class="label">Email</label>
                    <input class="input--style-4" type="email" name="email" id="email" />
                  </div>
                </div>

              </div>
              <div class="row row-space">
                
                <div class="col-2">
                  <div class="input-group">
                    <label class="label">Password</label>
                    <input  name="password" id="password" class="input--style-4" type="password" />
                  </div>
                </div>
                <div class="col-2">
                  <div class="input-group">
                    <label class="label">Confirm Password</label>
                    <input  name="confirmPassword" id="confirmPassword" class="input--style-4" type="password" />
                  </div>
                </div>

              </div>
              <div class="row row-space">
                <div class="col-2">
                  <div class="input-group">
                    <label class="label">Phone </label>
                    <input class="input--style-4" type="number" name="phone" id="phone" />
                  </div>
                </div>
                

              </div>
              <div class="row row-space">
                <div class="col-2">
                  <div class="input-group">
                    <label class="label">Adress</label>
                    <input class="input--style-4" type="text" name="adress" id="adress" />
                  </div>
                </div>
                <div class="col-2">
                  <div class="input-group">
                    <label class="label">Zip Code</label>
                    <input  name="zipCode" id="zipCode" class="input--style-4" type="text" />
                  </div>
                </div>

              </div>
              <div class="col-2">
                  <div class="input-group">
                    <label class="label">Account photo</label>
                    <input class="input--style-4" type="file" name="photo" id="photo" style="background:none;" />
                  </div>
                </div>
              <!-- <div class="input-group">
                  <label class="label">Subject</label>
                  <div class="rs-select2 js-select-simple select--no-search">
                    <select name="subject">
                      <option disabled="disabled" selected="selected">
                        Choose option
                      </option>
                      <option>Subject 1</option>
                      <option>Subject 2</option>
                      <option>Subject 3</option>
                    </select>
                    <div class="select-dropdown"></div>
                  </div>
                </div> -->
              <div class="p-t-15">
                <button name="reg_user" class="btnregister btn--radius-2 btn--blue" onmouseover="this.style.backgroundColor='rgb(44, 150, 212)';this.style.color='#e9d19a'" onmouseout="this.style.backgroundColor='rgb(54, 169, 225)';this.style.color='#fff'" id="submitt" type="submit">
                  Submit
                </button>
              </div>
              
              <div id="error" name="error">

              </div>
            </form>
          </div>
        </div>
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

  <!-- Jquery JS-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <!-- Vendor JS-->
  <script src="vendor/select2/select2.min.js"></script>
  <script src="vendor/datepicker/moment.min.js"></script>
  <script src="vendor/datepicker/daterangepicker.js"></script>
  <script src="vendor/tilt/tilt.jquery.min.js"></script>
  <script>
    $(".js-tilt").tilt({
      scale: 1.1,
    });
  </script>
  <script>
    var username=document.getElementById('username');
    var firstName=document.getElementById('firstName');
    var lastName=document.getElementById('lastName');
    var birthdate=document.getElementById('birthdate');
    var email=document.getElementById('email');
    var password=document.getElementById('password');
    var submit=document.getElementById('submitt');
    var confirmPassword=document.getElementById('confirmPassword');
    var adress=document.getElementById('adress');
    var zipCode=document.getElementById('zipCode');
    var error=document.getElementById('error');
    var response;


   
    submit.addEventListener('click',checkAll);

    function checkAll(e)
    {
      if(!/^[a-zA-Z()]+$/.test(firstName.value) || firstName.value.length<4)
      {
      error.innerHTML='Name is not valid';
      e.preventDefault();
      
      }else 
      {
          if(!/^[a-zA-Z()]+$/.test(lastName.value) || lastName.value.length<4)
        {
        error.innerHTML='Last name is not valid';
        e.preventDefault();
        
        }else 
        {
            if(birthdate.value=='')
            {
              e.preventDefault();
              error.innerHTML='Birthdate is not valid';
            }
            else
            {
              var diffMS=Date.now()-new Date(birthdate.value).getTime();
              var ageDT=new Date(diffMS); 
              if(Math.abs(ageDT.getUTCFullYear() - 1970)<18)
              {
                e.preventDefault();
                error.innerHTML='You should be at least 18 years old ';
              }else
              {
                if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.value))
              {
                error.innerHTML='Email is not valid';
                e.preventDefault();
              }else 
              {
                if(password.value=='')
                {
                  e.preventDefault();
                  error.innerHTML='Password should not be empty!';
                }
                else {
                  if(password.value.length<8)
                  {
                    e.preventDefault();
                    error.innerHTML='Password must be at least 8 caracters!';
                  }
                  else 
                  {
                    if(password.value.length>15)
                    {
                      e.preventDefault();
                      error.innerHTML='Password must not exceed 15 caracters!';
                    } else {
                      if(password.value!=confirmPassword.value)
                      {
                        e.preventDefault();
                        error.innerHTML='Passwords do not match!';
                      }else
                      {
                        if(phone.value.length<8)
                        {
                          e.preventDefault();
                          error.innerHTML='Phone number is not valid!';
                        }
                        else
                        {
                          if(adress.value.length<5)
                          {
                            e.preventDefault();
                            error.innerHTML='Adress is too short!';
                          }
                          else
                          {
                            if(!/^[0-9()]+$/.test(zipCode.value) || zipCode.value.length<4)
                            {
                              e.preventDefault();
                              error.innerHTML='Zip Code is not valid!';
                            }
                            else 
                            {
                              e.preventDefault();
                              var xhr=new XMLHttpRequest();
                              xhr.open('GET','../controller/checkUserExistance.php?username='+username.value+'&email='+email.value,true);
                              xhr.onload=function()
                                {
                                  response=this.responseText.trim();
                                  if(response[0]==1)
                                  {
                                    e.preventDefault();
                                    error.innerHTML='This Username already exists!';
                                  }
                                  else 
                                  {
                                    if(response[1]==1)
                                    {
                                      e.preventDefault();
                                      error.innerHTML='This Email is already inuse!';
                                    }
                                    else
                                    {
                                      document.getElementById('formid').submit();
                                      error.innerHTML='';
                                    }
                                  }
                                  
                                }
                              xhr.send();
                              
                              


                            }
                          }
                        }
                      }
                    }
                  }
                }
              }
            }
          }    
        }
      }

      

    


    }
    

    
  </script>
  <!-- Main JS-->
  <script src="js/register.js"></script>
  <script src="js/main.js"></script>
</body>
<!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->