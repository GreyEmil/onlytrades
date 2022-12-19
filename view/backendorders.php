<?php 
session_start();
$_SESSION["number"]=0;
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Backendorders</title>
  <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
  <link rel="stylesheet" href="../../use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  
  <!-- Core CSS Files -->
  

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="css/bestyle.css">
  <link rel="stylesheet" href="css/backend.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/odometer.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/meanmenu.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" type="text/css" href="css/stylee.css">
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/responsive.css">
          <!-- Fontawesome CSS Files -->


</head>
<body>
<!-- partial:index.partial.html -->
<div class="video-bg">
 <video width="320" height="240" autoplay loop muted>
  <source src="img/vid2.mp4" type="video/mp4">
</video>
</div>
<div class="dark-light">
    <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
     <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" /></svg>
   </div>
<div class="app">
 <div class="header">
  <div class="menu-circle"></div>
  <div class="admin-icon"><img id="adminIcon" class="img" src="data:image;base64,<?php echo $_SESSION["user"]["photo"] ;?>" alt=""></div>


  
 </div>
 <div class="wrapper">
  <div class="left-side">
   <div class="side-wrapper">
    <div class="side-title">Apps</div>
    <div class="side-menu">
     <a href="backendmerch.php">
      <svg viewBox="0 0 512 512">
       <g xmlns="http://www.w3.org/2000/svg" fill="currentColor">
        <path d="M0 0h128v128H0zm0 0M192 0h128v128H192zm0 0M384 0h128v128H384zm0 0M0 192h128v128H0zm0 0" data-original="#bfc9d1" />
       </g>
       <path xmlns="http://www.w3.org/2000/svg" d="M192 192h128v128H192zm0 0" fill="currentColor" data-original="#82b1ff" />
       <path xmlns="http://www.w3.org/2000/svg" d="M384 192h128v128H384zm0 0M0 384h128v128H0zm0 0M192 384h128v128H192zm0 0M384 384h128v128H384zm0 0" fill="currentColor" data-original="#bfc9d1" />
      </svg>
      MERCH
     </a>
     <a href="backendorders.php">
      <svg viewBox="0 0 488.932 488.932" fill="currentColor">
       <path d="M243.158 61.361v-57.6c0-3.2 4-4.9 6.7-2.9l118.4 87c2 1.5 2 4.4 0 5.9l-118.4 87c-2.7 2-6.7.2-6.7-2.9v-57.5c-87.8 1.4-158.1 76-152.1 165.4 5.1 76.8 67.7 139.1 144.5 144 81.4 5.2 150.6-53 163-129.9 2.3-14.3 14.7-24.7 29.2-24.7 17.9 0 31.8 15.9 29 33.5-17.4 109.7-118.5 192-235.7 178.9-98-11-176.7-89.4-187.8-187.4-14.7-128.2 84.9-237.4 209.9-238.8z" />
      </svg>
      ORDERS
      <span class="notification-number updates"><?php echo($_SESSION["number"]);?></span>
     </a>
    </div>
   </div>
  </div>
  <div class="main-container">
  <div class="main-header" style="background:none">
   <a class="menu-link-main" href="#" >All Apps</a>
    <div class="header-menu">
     <a class="main-header1-link" href="#">Accounts</a>
     <a class="main-header1-link" href="#">Products</a>
     <a class="main-header1-link" href="#">Events</a>
     <a class="main-header1-link is-active" href="backendmerch.php">Merch</a>
     <a class="main-header1-link" href="#">Forums</a>
     <a class="main-header1-link" href="#">Reports</a>

    </div>
   </div>
   <div class="content-wrapper" >
   <main>
        <!-- slider-area -->
        <?php
        $_SESSION["number"]=0;
    require '../controller/merch.php';
       $checkout=new commande;
          $checkout1=$checkout->showcheckout_all_1();
          $checkout2=$checkout->showcheckout_all_2();
          $length=count($checkout1);
          echo('     <section class="order-content">
          <div class="heading-title">
              <h2 style="color:white";>All Orders
              </h2>
            </div>');
          if($length>0)
          {
          for($i=0;$i<$length;$i++)
          {
            $length1=count($checkout2[$i][0]);
            echo('<div class="accordian">
            <table class="table top-table order-table" >
                <tbody>
                  <tr class="d-flex">
                    <td class="col-12 col-md-3 first-item">'. 
                        $checkout1[$i][0].
                    '</td>
                    <td class="col-12 col-md-2">'.$checkout1[$i][1].'</td>');
                    if($checkout1[$i][2]==0)
                    {
                   echo('<td class="col-12 col-md-3">
                        <div class="text-secondary">Pending</div>
                      </td>');
                    }
                    else
                    {
                      echo('<td class="col-12 col-md-3">
                        <div class="text-secondary" style="color:green !important;">Delivered</div>
                      </td>');
                    }
                    echo('
                    <td class="col-12 col-md-2">'.
                        $checkout1[$i][3].' OTP
                    </td>
                    <td class="col-12 col-md-2">
                        <a class="btn btn-link" style="background-image:none" data-toggle="collapse" href="#orderDetail'.$i.'" role="button" aria-expanded="false">
                            View
                          </a>
                      </td>
             
                  </tr>
                  </tbody>
            </table>');
            echo('<div class="collapse" id="orderDetail'.$i.'">
            <div class="card card-body">
                <section class="orderdetail-content">
  
                    <div class="row">
                      <div class="col-12 col-md-5">
                          <h3>Order ID '.$checkout1[$i][1].'</h3>
                          <table class="table order-id">
                              <tbody>
                                  <tr class="d-flex">
                                    <td class="col-6 col-md-6"> <strong>Order Status</strong> </td>');
                                    if($checkout1[$i][2]==0)
                                    {echo('<td class="pending col-6 col-md-6" style="color:"><p>Pending</p>
                                      <br><a href=../model/updateorder.php?id_com='.$checkout1[$i][1].'">
                                      <p style="width: 85px; color:#C46200;">Delivered</p></a></td>
                                      ');
                                        
                                    }
                                    else
                                    {
                                    echo('<td class="pending col-6 col-md-6" ><p style="width: 85px;">Delivered</p></td>');
                                    }
                                    echo('
                                  </tr>
                                  <tr class="d-flex">
                                      <td class="col-6 col-md-6"><strong>Order DateTime</strong></td>
                                      <td  class="underline col-6 col-md-6" >'.$checkout1[$i][0].'</td>
                                    </tr>
                                    
                                </tbody>
                          </table>
                          </div>
                          <div class="col-12 col-md-7"> 
                          <h3>Shipping Details</h3>
                      <table class="table order-id">
                          <tbody>
                              <tr class="d-flex"> 
                                <td class="address col-12 col-md-6"><strong>Shipping Address</strong></td>
                              </tr>
                              <tr class="d-flex">
                                  <td  class="address col-12 col-md-12">'.$checkout1[$i][4].'</td>
                                </tr>
                                <tr class="d-flex"> 
                                <td class="address col-12 col-md-6"><strong>Phone Number</strong></td>
                              </tr>
                              <tr class="d-flex">
                                  <td  class="address col-12 col-md-12">'.$checkout1[$i][6].'</td>
                                </tr>
                            </tbody>
                      </table>
    
                      </div> 
                            
                    </div>
                    ');
                    
                    for($j=0;$j<$length1;$j++)
                    {
                    echo('
                      <table class="table orderdetail-content top-table">
                          <tbody>
                              <tr class="d-flex">
                                  <td class="col-12 col-md-2">
                                        <img class="img-fluid" src="'.$checkout2[$i][0][$j][0].'" alt="Image">
                                  </td>
                                  <td class="col-12 col-md-4">
                                      <div class="item-detail">
                                          <span class="pro-category">'.$checkout2[$i][0][$j][1].'</span>
                                          
                                      </div>
                                  </td>
                                  <td class="col-12 col-md-1 item-price">'.$checkout2[$i][0][$j][2].' OTP</td>
                                  <td class="col-12 col-md-3" >
                                      <div class="input-group-control">
                                          <input type="text" id="quantity12" name="quantity" class="form-control" value="'.$checkout2[$i][0][$j][3].'" readonly>
                                    </div>
                                  </td>
                                  <td class="col-12 col-md-2 item-total">'.$checkout2[$i][0][$j][4].' OTP</td>
                              </tr>
                          </tbody>
                        </table>
                    ');
                    }
                    echo('
          </section>
            </div>
          </div>
    </div>');
    if($checkout1[$i][2]==0)
    $_SESSION["number"]=$_SESSION["number"]+1;
          }
        }
        else
        {echo('
          <table class="table top-table order-table">
                <tbody>
                  <tr class="d-flex">
                    <td class="col-12 col-md-3 first-item">There is no order YET!!
                       </td>
                  </tr>
                  </tbody>
            </table>');
        }
          ?>
    </main>
</div>
    <!-- slider-area-end -->
    <!-- PHP HERE -->
    <!-- END PHP -->

   </div>
  </div>
 </div>
 <div class="overlay-app"></div>
</div>
<!-- partial -->
<!-- JS here -->

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="js/script.js"></script>
<script src="js/vendor/jquery-3.4.1.min.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/jquery.meanmenu.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.lettering.js"></script>
    <script src="js/jquery.textillate.js"></script>
    <script src="js/jquery.odometer.min.js"></script>
    <script src="js/jquery.appear.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
     <script  src="js/script.js"></script>
</body>
</html>
