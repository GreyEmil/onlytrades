<?php session_start();
//header(url=../controller/displayAllAuctions.php);?>
<?php include('../controller/userController.php') ;
require_once "../model/auctionModel.php";
$auctions=auctionModel::fetchAllAuctions();
?>
<!doctype html>
<html class="no-js" lang="">

<!-- Mirrored from themebeyond.com/html/geco/Geco/shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 31 Oct 2022 13:05:01 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Auction</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="">

    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
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
    <link rel="stylesheet" href="css/addauction.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>

    
</head>

<body>


    <!-- preloader -->
    <div id="preloader">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <img src="img/icon/o.gif" alt="">
            </div>
        </div>
    </div>
    <!-- preloader-end -->

  
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
              <p style="color: rgb(54, 169, 225)">Premium Offer</p>
              <span class="coming-time" data-countdown="2022/11/15"></span>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="header-top-right">
              <!-- <div class="header-social">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div> -->
              <div class="header-top-action">
                <ul>
                  <li>
                    <div class="header-top-mail">
                      <p>
                        <span></span>
                        <!-- <i class="far fa-envelope"></i><a
                                                    href="https://themebeyond.com/cdn-cgi/l/email-protection#85ecebe3eac5e2e8e4ece9abe6eae8"><span
                                                        class="__cf_email__"
                                                        data-cfemail="076e69616847606264686e6961682964686a">[email&#160;protected]</span>
                                                    </a> -->
                      </p>
                    </div>
                  </li>
                </ul>
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
                    <li ><a href="index.php">Home</a></li>
                    <!-- <li><a href="#">Pages</a></li> -->
                    <!-- <li><a href="game-overview.html">Overview</a></li> -->
                    <!-- <li><a href="community.html">Community</a></li> -->
                    <li ><a href="displaytrades.php">Trade</a>
                                        <?php if(isset($_SESSION["user"])){?>
                                            <ul class="submenu">
                                                <li><a href="myOnGoingTrades.php">My ongoing trades</a></li>
                                                <li><a href="doneDealsf.php">Done Deals</a></li>
                                            </ul>
                                            <?php }?>
                                        </li>
                    <li class="show">
                                    <a href="../controller/displayAllAuctions.php">Auctions</a>
                                    <?php if(isset($_SESSION["user"])){?>
                                    <ul style="display: flex;flex-direction: column;" class="submenu">
                                        <li ><a href="displayownedauctionsview.php">my auctions</a></li>
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
                    <li><a href="categories.php">FORUM</a></li>
                    <li >
                                    <a id="repnav" href="ajouterreclamation.php">Report</a>
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
    
    
    <!-- header-area-end -->

    <!-- main-area -->
    <main>
        <!-- breadcrumb-area -->
        <section class="breadcrumb-area breadcrumb-bg3" id="big">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-content text-center">
                            <h2>Auction <span>Corner</span></h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item"><a href="trade.html">Trade</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Auction</li>
                                </ol>
                            </nav>
                            <a id="createAUU" href="auctionCreateView.php" class="btn btn-style-two " style="left:600px;margin-bottom:30px;">Start Your Own Auction</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
            if(!count($auctions))
            {
                echo '
                
                    <div class="released-game-item" >
                        <div style=" margin:auto;background-image: url(img/images/released_game_brush.png);height:50px;width:590px;background-size:590px;text-align:center;">
                            <h4 style="color:black;margin-top:20px;margin-left:100px;padding-top:15px; " >Oops! Looks Like there is no Auctions Yet</h4>
                        </div>
                    </div>
                
                ';
            }
            else
            {
            for($i=0;$i<count($auctions);$i++)
            {
              if($auctions[$i]["status"]!="CLOSED")
              {
               $now=time();
               
               $dateOnSec=strtotime($auctions[$i]["startDate"])+3600;
               $timeleftInSec=$dateOnSec-$now;
               if($timeleftInSec>0)
               {
               $days=floor($timeleftInSec/(3600*24));
               $hours=floor(($timeleftInSec%(3600*24))/3600);
               $mins=floor((($timeleftInSec%(3600*24))%3600)/60);
               
               $strdays=strval($days);
               $strhours=strval($hours);if(strlen($strhours)==1) $strhours='0'.$strhours;
               $strmins=strval($mins);if(strlen($strmins)==1) $strmins='0'.$strmins;
               
               

               $timeleft=$strdays.' days '.$strhours.' hours '.$strmins.' mins';
               }
               else {if($timeleftInSec<0 & $timeleftInSec>-3600)
               $timeleft="Auction Is Ongoing!";
               else $timeleft=str_repeat('&nbsp;', 15)."Closed!";}

               

              
              
                echo '
                <div class="released-game-carousel">
                    <div class="released-game-item-fares">
                        <div class="released-game-item-bg"></div>
                        <div>
                            <img   src="data:image/jpeg;base64,'.$auctions[$i]["images"][0]["bin"].'" alt="" class="auction-display-image">
                        </div>
                        <div class="released-game-content">
                            <h4 >Starts In:  <span class="timerr" id="timer'.$i.'">'.$timeleft.'</span></h4>
                            <div class="released-game-list mb-15" style="color:white">
                                <ul >
                                    <li style="color:white;"><span style="color:rgb(120,200,230);">Name :</span>'.$auctions[$i]["name"].'</li>
                                    <li style="color:white;"><span style="color:rgb(120,200,230);">Description :</span>'.$auctions[$i]["description"].'</li>
                                    <li style="color:white;"><span style="color:rgb(120,200,230);">Start Time :</span>'.$auctions[$i]["startDate"].'</li>
                                    
                                </ul>
                            </div>
                            
                            <a href="auctionView.php?idauc='.$auctions[$i]["id"].'" class="btn btn-style-two">Enter Auction</a>
                        </div>
                        
                    </div>
                </div>';
     
            }
        }
      }
            ?>
            
        

      
        
    </section>
    </main>
    <!-- main-area end -->
        
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
                                            <input type="email" placeholder="Enter your email...">
                                        </div>
                                        <button id="wow"><a href="new.php"  >SUBSCRIBE</a> <i class="fas fa-paper-plane"></i></button>
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
                                <a href="index.php"><img src="img/favicon.png" class="logof" alt="logo_footer  "></a>
                            </div>
                            <div class="footer-text">
                                <p>Gemas marketplace the relase etras thats sheets continig passag.</p>
                                <div class="footer-contact">
                                    <ul>
                                        <li><i class="fas fa-map-marker-alt"></i> <span>Address : </span>PO Box W75
                                            Street
                                            lan West new queens</li>
                                        <li><i class="fas fa-headphones"></i> <span>Phone : </span>+24 1245 654 235</li>
                                        <li><i class="fas fa-envelope-open"></i><span>Email : </span><a
                                                href="https://themebeyond.com/cdn-cgi/l/email-protection"
                                                class="__cf_email__"
                                                data-cfemail="761f18101936130e131b061a135815191b">[email&#160;protected]</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-sm-6">
                        <div class="footer-widget mb-50">
                            <div class="fw-title mb-35">
                                <h5>Products</h5>
                            </div>
                            <div class="fw-link">
                                <ul>
                                    <li><a href="#">Graphics (26)</a></li>
                                    <li><a href="#">Backgrounds (11)</a></li>
                                    <li><a href="#">Fonts (9)</a></li>
                                    <li><a href="#">Music (3)</a></li>
                                    <li><a href="#">Photography (3)</a></li>
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
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Refund Policy</a></li>
                                    <li><a href="#">Affiliate</a></li>
                                    <li><a href="#">FAQUse Cases</a></li>
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
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="footer-widget mb-50">
                            <div class="fw-title mb-35">
                                <h5>Newsletter Sign Up</h5>
                            </div>
                            <div class="footer-newsletter">
                                <form action="#">
                                    <input type="text" placeholder="Enter your email">
                                    <button><i class="fas fa-rocket"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-fire footer-fire-right"><img src="img/images/footer_axe.png" height="306px"
                    alt="axe_footer"></div>
            <div class="footer-fire "><img src="img/images/pickaxe_footer.png" height="299px" alt="pickaxe_footer">
            </div>
        </div>
        <div class="copyright-wrap s-copyright-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="copyright-text">
                            <p>Copyright © 2022 <a href="index.php">OnlyTrades</a> All Rights Reserved.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 d-none d-md-block">
                        <div class="payment-method-img text-right">
                            <img src="img/images/card_img.png" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </footer>
    <!-- footer-area-end -->

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
    <script src="js/notification.js"></script>
    <script>
        $(document).ready(function(){
            var auctions=$('.released-game-content');
            for(var element of auctions)
            {
                var id=$(element).find('a').attr('href').substring($(element).find('a').attr('href').indexOf('=')+1);
                let timer=$(element).find('.timerr').text();
                var isset=<?php if(isset($_SESSION['user']['id'])) echo 1; else echo 0;?>;
                var idUser=parseInt(<?php if(isset($_SESSION['user']['id'])) echo($_SESSION['user']['id']); else echo 0;?>);
                
                if(timer.trim()=='Auction Is Ongoing!') 
                {
                    if(isset==0 || idUser===NaN || idUser==0)
                    $(element).find('a').attr('href','signin.php');
                 else
                    $(element).find('a').attr('href','viewOnGoingAuction.php?idauc='+id);
                }
            }
        })
    </script>
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
$('#createAUU').click(checkIfLoggedIn);

  </script>
    </script>
</body>

</html>