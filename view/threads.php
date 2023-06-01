<?php 
include('../controller/userController.php');
require_once "../controller/forum.php";
$threads=forum::getThreads($_GET["category"]);


 ?>
<!doctype html>
<html class="no-js" lang="">
    
<!-- Mirrored from themebeyond.com/html/geco/Geco/community.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 31 Oct 2022 12:57:42 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Threads</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
        <!-- Place favicon.ico in the root directory -->

		<!-- CSS here -->
        <!-- <link rel="stylesheet" href="css/forum.css"> -->
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
        <link rel="stylesheet" href="css/responsive.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>

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
                    
                    <li><a href="POINTSSHOP.php">POINTS SHOP</a>
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
                    <li class="show"><a href="categories.php">FORUM</a></li>
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

        <!-- main-area -->
        <main>

            <!-- breadcrumb-area -->
            <section class="breadcrumb-area breadcrumb-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="breadcrumb-content text-center">
                                <h2>Our <span>Community</span></h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Community</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- breadcrumb-area-end -->

            <!-- community-area -->
            <div class="community-area primary-bg pt-120 pb-175">
                <div class="community-sidebar-social" style="position:relative;left:85%;bottom:20px;">
                    <ul>
                        <li class="fab" >
                            <a id="newww"href="createthread.php?category=<?php echo($_GET["category"]); ?>" style="box-shadow: 0px 2px 21px 0px rgb(59 53 63 / 12%);text-transform: uppercase;font-size: 14px;font-weight: 800;color: #413f3f;font-family: 'Oxanium', cursive;"><i style="padding:10px;">New Thread</i></a>
                        </li>
                    </ul>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="community-wrap">
                                <div class="table-responsive-xl">
                                    <table class="table mt-0">
                                        <thead>
                                            <tr>
                                               
                                                
                                                <th scope="col">Threads</th>
                                                <th scope="col">Views</th>
                                                <th scope="col">Comments</th>
                                                <th scope="col">Last Update</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody id="all">
                                            
                                           <?php 
                                           foreach($threads AS $thread)
                                           {
                                            if(isset($thread['lastComment'][0])) $lastC=$thread['lastComment'][0]["last_modification"]; else $lastC="none";
                                            echo '<tr>
                                            <th scope="row" class="w-75">
                                                        <div class="container">
                                                            <div class="row">  
                                                                <div class="col-lg-2">
                                                                    <div class="author-image-container">
                                                                    <img style="width:100%;height:100%" src="data:image/jpeg;base64,'.$thread['user']["photo"].'" alt="">
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <a style="display:block"href="displayThread.php?id='.$thread['id'].'">'.$thread["subject"].'</a>
                                                                    <span>by <a href="#">'.$thread['user']["username"].'</a> at '.$thread["publish_date"].'</span>     
                                                                </div>
                                                            </div>
                                                        </div>
                                            </th>
                                            <td >'.$thread["views"].'</td>
                                            <td >'.$thread["comments"].'</td>
                                            <td >'.$lastC.'</td>
                                            
                                            
                                            </tr>';
                                           }
                                           ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                                
                                
                            </div>
                        </div>
                        <div class="col-lg-4">
                       
                        </div>
                    </div>
                </div>
                <div class="community-bg-shape"><img src="img/images/community_bg_shape.png" alt=""></div>
            </div>
            <!-- community-area-end -->


        </main>
        <!-- main-area-end -->

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





		<!-- JS here -->
        <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/vendor/jquery-3.4.1.min.js"></script>
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
        <script>
            function checkIfLoggedIn(e)
{
    var si= <?php if(isset($_SESSION["user"])) echo 1; else echo 0;?>;
    e.preventDefault();
    
    if(si==0)
    window.location.href="../view/signin.php";
    else
    window.location=$(this).attr("href");
   
}
$('#newww').click(checkIfLoggedIn);

  </script>
        </script>
        
    </body>

<!-- Mirrored from themebeyond.com/html/geco/Geco/community.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 31 Oct 2022 12:58:13 GMT -->
</html>
