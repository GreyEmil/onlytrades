<?php
include('../controller/userController.php');
require '../controller/merch.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="images/miscellaneous/fav.png">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
      <!-- Fontawesome CSS Files -->
      <link rel="stylesheet" href="../../use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  
      <!-- Core CSS Files -->

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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/stylee.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>



      
    <title>My Orders</title>
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
  <!-- header-area -->
  <?php if (isset($_SESSION['login']) && ($_SESSION['login'] == 'success')) { ?>
    <script type="text/javascript">
      $(document).ready(function() {
        toastr.options.timeOut = 2500; // 1.5s
        toastr.success('Welcome to our homepage', 'Login Successful!');
        
      });
    </script>
  <?php } $_SESSION['login']=""; ?>
  <?php if (isset($_SESSION['edit']) && ($_SESSION['edit'] == 'success')) { ?>
    <script type="text/javascript">
      $(document).ready(function() {
        toastr.options.timeOut = 2000; // 1.5s
        toastr.success('Information were edited', 'Edit Successful!');
      });
    </script>
  <?php } $_SESSION['edit']="";?>

 

  <!-- header-area -->
  <header>
    <?php
    if (isset($_COOKIE['_uid_'])) {
      $u_id = base64_decode($_COOKIE['_uid_']);
    } else if (isset($_SESSION['id'])) {
      $u_id = $_SESSION['id'];
    } else {
      $u_id = -1;
    }
    $sql = "SELECT * FROM user WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
      ':id' => $u_id
    ]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
    <?php if ((isset($_SESSION['user']))) {
      $loggedIn = true;
    } else {
      $loggedIn = false;
    }
    ?>
    <?php
    function logout()
    {
      if (isset($_GET['logout'])) {
        session_start();
        unset($_SESSION["id"]);
        header("Location:signin.php");
      }
    }
    ?>
    <div class="header-top-area s-header-top-area d-none d-lg-block">
      <div class="container-fluid s-container-full-padding">
        <div class="row align-items-center">
          <div class="col-lg-6 d-none d-lg-block">
            <div class="header-top-offer">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="header-top-right">
 <div class="header-social">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div> 
              <div class="header-top-action">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="sticky-header" class="transparent-header">
      <div class="container-fluid s-container-full-padding">
        <div class="row">
          <div class="col-12">
            <div class="main-menu menu-style-two">
              <nav>
                <div class="logo">
                  <a href="index.php"><img src="img/logo/logo.png" class="logoh" alt="logo" /></a>
                </div>
                <div id="mobile-menu" class="navbar-wrap d-none d-lg-flex">
                  <ul>
                    <li><a href="index.php">Home</a></li>
                    <!-- <li><a href="#">Pages</a></li> -->
                    <!-- <li><a href="game-overview.html">Overview</a></li> -->
                    <!-- <li><a href="community.html">Community</a></li> -->
                    <li ><a href="displaytrades.php" id="trade" >Trade</a>
                                        <?php if(isset($_SESSION["user"])){?>
                                            <ul class="submenu">
                                                <li><a href="myOnGoingTrades.php">My ongoing trades</a></li>
                                                <li><a href="doneDealsf.php">Done Deals</a></li>
                                            </ul>
                                            <?php }?>
                                        </li>
                    <li >
                                    <a href="../controller/displayAllAuctions.php">Auctions</a>
                                    <?php if(isset($_SESSION["user"])){?>
                                    <ul style="display: flex;flex-direction: column;" class="submenu">
                                        <li><a href="displayownedauctionsview.php">my auctions</a></li>
                                    </ul>
                                    <?php }?>
                                </li>
                    
                    <li class="show"><a href="POINTSSHOP.php">POINTS SHOP</a>
                    <?php if(isset($_SESSION["user"])){?>
                    <ul class="submenu">
                                                <li><a href="orders.php">My orders</a></li>
                                            </ul>
                                            <?php }?>
                                        </li>
                    <!-- <ul class="submenu">
                                                <li><a href="blog.html">News Page</a></li>
                                                <li><a href="blog-details.html">News Details</a></li>
                                            </ul>
                                        </li> -->
                    <li><a href="categories.php">FORUM</a></li>
                    <li >
                                    <a  href="ajouterreclamation.php" id="report">Report</a>
                                    <?php if(isset($_SESSION["user"])){?>
                                    <ul style="display: flex;flex-direction: column;" class="submenu">
                                    
                                      
                                        <li><a href="consulterreclamation.php">Report History</a></li> 
                                        
                                    </ul>
                                    <?php }?>
                                </li>
                  </ul>
                </div>

                <div class="header-action">
                  <ul>
                    <li class="header-shop-cart">
                      <a href="#">
                        <i class="fi fi-sr-user"></i>
                        <ul class="minicart">
                          <li class="d-flex align-items-start">

                            <div class="cart-content">
                              <h4>
                                <?php if ($loggedIn == false) { ?>
                                  <a href="#">Join the community now!</a>
                                <?php } elseif ($loggedIn == true && $user['isVerified'] == true) { ?>
                                  <a href="profile.php"><?php echo "Hello  &nbsp;" . $user['username'] ?></a>
                                <?php } elseif ($loggedIn == true && $user['isVerified'] == false) { ?>
                                  <a href="#"><?php echo "Hello  &nbsp;" . $user['username'] . "<br> Your account is not verified! Please check your email!" ?></a>
                                <?php }  ?>
                              </h4>
                          </li>
                          <li>
                            <?php if ($loggedIn == false) { ?>
                              <div class="checkout-link">
                                <a href="signin.php">Login As Member </a>
                                <a href="signinAdmin.php">Login As Admin </a>
                                <a class="red-color" href="signup.php">Sign up</a>
                              </div>
                            <?php } elseif ($loggedIn == true && $user['role'] == 'MEMBER' && $user['isVerified'] == true) { ?>
                              <div class="checkout-link">
                                <a href="profile.php">Member Profile </a>
                                <a class="red-color" href="logout.php">Log Out</a>
                              </div>
                            <?php } elseif ($loggedIn == true && $user['role'] == 'ADMIN'  && $user['isVerified'] == true) { ?>
                              <div class="checkout-link">
                                <a href="backendfinale.php">Admin Dashboard</a>
                                <a class="red-color" href="logout.php">Log Out</a>
                              </div>
                            <?php } elseif ($loggedIn == true &&  $user['isVerified'] == false) { ?>
                              <div class="checkout-link">
                                <a class="red-color" href="logout.php">Log Out</a>
                              </div>
                            <?php }  ?>
                          </li>
                        </ul>
                    </li>
                  </ul>
                </div>
                <div class="header-action">
                                    <ul>
                                        <li class="header-shop-cart"><a href="#"><i class="fas fa-shopping-basket"
                                                    style="color:rgb(54, 169, 225);"></i><span id='qofbasket'>0</span></a>
                                            <ul id='shopcart' class="minicart">
                                                
                                                
                                            </ul>
                                        </li>
                                        <li class="header-search"><a href="#" data-toggle="modal"
                                                data-target="#search-modal"><i class="fas fa-search"></i></a></li>
                                    </ul>
                                </div>


              </nav>
            </div>
            <div class="mobile-menu"></div>
          </div>
          <!-- Modal Search -->
          <div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <form>
                  <input type="text" placeholder="Search here..." />
                  <button><i class="fa fa-search"></i></button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
    <!-- header-area-end -->
<main>

<!-- slider-area -->
<section class="slider-area slider-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-9">
                <div class="slider-content text-center">
                    <h6 class="wow fadeInDown" data-wow-delay=".2s">Points</h6>
                    <h2 class="tlt fix" data-in-effect="fadeInLeft">My <span>Orders</span></h2>
                    <p class="wow fadeInUp" data-wow-delay="2s"></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- slider-area-end -->


<!-- area-bg-one -->
<div class="area-bg-one">

</div>
<!-- area-bg-one-end -->

<!-- game-manage-area -->
<section id="section" class="game-manage-area game-mange-bg pt-120 pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8">
                <div class="section-title title-style-two text-center mb-60">


<section class="order-content">
            
        
          <?php
         
          $idd=$_SESSION["user"]["id"];
          $checkout=new commande;
          $checkout1=$checkout->showcheckout_only_user_1($idd);
          $checkout2=$checkout->showcheckout_only_user_2($idd);
          $length=count($checkout1);
          if($length>0)
          {
          for($i=0;$i<$length;$i++)
          {
            $length1=count($checkout2[$i][0]);
            echo('<div class="accordian">
            <table class="table top-table order-table">
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
                        </td>
                        ');
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
                        <a class="btn btn-link" data-toggle="collapse" href="#orderDetail'.$i.'" role="button" aria-expanded="false">
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
                                    echo('<td class="pending col-6 col-md-6" ><p>Pending</p></td>');
                                    else
                                    echo('<td class="pending col-6 col-md-6" ><p style="width: 85px;">Delivered</p></td>');
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
                              </table>');
                    }
                    echo('                          
          </section>
            </div>
          </div>
    </div>');
          }
        }
        else
        {echo('
          <table class="table top-table order-table">
                <tbody>
                  <tr class="d-flex">
                    <td class="col-12 col-md-3 first-item">You don'."'".'t have any order yet!!
                       </td>
                       <td class="col-12 col-md-2">
                       <a class="btn btn-link" href="pointsshop.php" role="button">
                           Buy Now
                         </a>
                     </td>
                  </tr>
                 
                  </tbody>
            </table>');
        }



          ?>
                          </div>
            </div>
        </div>
        
        </div>
</section>
<!-- game-manage-area-end -->
</main>
<!-- footer-area -->
<footer>
    <div class="footer-top footer-bg s-footer-bg">
      <!-- newsletter-area -->
      <div class="newsletter-area s-newsletter-area">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="newsletter-wrap">
                <div class="section-title newsletter-title">
                  <h2>Our <span>Newsletter</span></h2>
                </div>
                <div class="newsletter-form">
                  <form action="#">
                    <div class="newsletter-form-grp">
                      <i class="far fa-envelope"></i>
                      <input type="email" placeholder="Enter your email..." />
                    </div>
                    <button>
                      SUBSCRIBE <i class="fas fa-paper-plane"></i>
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- newsletter-area-end -->
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="footer-widget mb-50">
              <div class="footer-logo mb-35">
                <a href="index.php"><img src="img/favicon.png" class="logof" alt="logo_footer  " /></a>
              </div>
              <div class="footer-text">
                <div class="footer-contact">
                  <ul>
                    <li>
                      <i class="fas fa-map-marker-alt"></i>
                      <span>Address : </span>Agba tunisie
                    </li>
                    <li>
                      <i class="fas fa-headphones"></i>
                      <span>Phone : </span>+216 99819166
                    </li>
                    <li>
                      <i class="fas fa-envelope-open"></i><span>Email : </span><a>only.trades.tn@gmail.com</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-2 col-lg-3 col-sm-6">
            <div class="footer-widget mb-50">
              <div class="fw-title mb-35">
                <h5>Pages</h5>
              </div>
              <div class="fw-link">
                <ul>
                  <li><a href="displaytrades.php">Trade</a></li>
                  <li><a href="auctions.php">Auction</a></li>
                  <li><a href="POINTSSHOP.php">Points Shop</a></li>
                  <li><a href="categories.php">Forum</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-xl-2 col-lg-3 col-sm-6">
            <div class="footer-widget mb-50">
              <div class="fw-title mb-35">
                <h5>Need Help?</h5>
              </div>
              <div class="fw-link">
                <ul>
                  <li><a href="ajouterreclamation.php">Report</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="footer-widget mb-50">
              <div class="fw-title mb-35">
                <h5>Follow us</h5>
              </div>
              <div class="footer-social">
                <ul>
                  <li>
                    <a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>
                  </li>
                  <li>
                    <a href="javascript:void(0)"><i class="fab fa-twitter"></i></a>
                  </li>
                  <li>
                    <a href="javascript:void(0)"><i class="fab fa-pinterest-p"></i></a>
                  </li>
                  <li>
                    <a href="javascript:void(0)"><i class="fab fa-linkedin-in"></i></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="footer-widget mb-50">
              <div class="fw-title mb-35">
                <h5>Newsletter Sign Up</h5>
              </div>
              <div class="footer-newsletter">
                <form action="#">
                  <input type="text" placeholder="Enter your email" />
                  <button><i class="fas fa-rocket"></i></button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-fire footer-fire-right">
        <img src="img/images/footer_axe.png" height="306px" alt="axe_footer" />
      </div>
      <div class="footer-fire">
        <img src="img/images/pickaxe_footer.png" height="299px" alt="pickaxe_footer" />
      </div>
    </div>
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
          <div class="col-lg-6 col-md-6 d-none d-md-block">
            <div class="payment-method-img text-right">
              <img src="img/images/card_img.png" alt="img" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- footer-area-end -->
          <script src="js/scripts.js"></script>
          <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
  <script src="js/vendor/jquery-3.4.1.min.js"></script>
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
  <script src="js/jquery.scrollUp.min.js"></script>
  <script src="js/imagesloaded.pkgd.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>
        </body>
</html>