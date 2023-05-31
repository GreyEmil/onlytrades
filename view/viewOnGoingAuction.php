<?php  
//error_reporting(E_ERROR | E_WARNING | E_PARSE);
    session_start();
    include('../controller/userController.php') ;
    require_once "../model/auctionModel.php";
    $auction=auctionModel::fetchAuction($_GET["idauc"]);
   
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

    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <script src="https://kit.fontawesome.com/9ee4261700.js" crossorigin="anonymous"></script>
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="css/chatstyle.css">
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
    
    <link rel="stylesheet" href="css/liveauction.css">
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

    <!-- main-area -->
    <main>

        <!-- breadcrumb-area -->
        <section class="breadcrumb-area breadcrumb-bg3">
            
            <div class="grid-container">
                <div class="item-name ">
                    <div><?php echo $auction["name"]?></div>
                </div>
                <div class="add-offer" ><button id="addoffer" class="add-offer-btn">Add offer</button>
                <button id="closeAuction" class="add-offer-btn" style="display:none">Close Auction</button></div>
                
                <div class="item-name ">
                    <div>Best Offer Yet</div>
                </div>
                <div class="images-container col-1">
                    <?php 
                        foreach($auction["images"] AS $image)
                        {
                            
                            echo '<img class ="image" src="data:image/jpeg;base64,'.$image["bin"].'">';
                        }
                        ?>
                </div>
                <div class="auction-item-container">
                    <span class="info-header"><i class="fa-solid fa-hourglass-start" style="margin-right:10px"></i>Auction Ends In: </span>
                    <div id="timer" class="info-grid"></div>
                    <hr><hr>
                    <span  class="info-header"><i class="fa-regular fa-eye" style="margin-right:10px"></i>Participents: </span>
                    <div id="participent" class="info-grid">0</div>
                    <hr><hr>
                    <span class="info-header"><i class="fa-solid fa-user-secret" style="margin-right:10px"></i>Host: </span>
                    <div class="user-details-grid">
                        <img class="user-image" src="data:image/jpeg;base64,<?php echo $auction['owner']['photo'] ?>"> 
                        <div class="user-info-grid">
                            <div class="user-name"><?php echo $auction['owner']['username'] ?></div>
                            <div class="user-details">Member since: <?php echo DateTime::createFromFormat("Y-m-d",$auction['owner']['creation_date'])->format("Y"); ?> </div>
                        </div>       
                    </div>

                    
                    
                </div>
                <div id="best_offer" class="best-offer">
                    <img class="image" id="best_offer_image" src="img/icon/404.jfif" alt="">
                    <div class="best-offer-details">
                        <div id="best_offer_name" class="user-name">No Offer is Chosen Yet</div>
                        <div id="best_offer_desc"></div>
                        <div class="best-offrer">
                            <img class="user-image" id="best_offerer_image" src="" alt="" style="display: none;">
                            <div class="best-offrer-details">
                                <div id="offerer_name" class="user-name"></div>
                                <div id="offerer_join_date" class="user-details"></div>
                            </div>
                        </div>
                    </div>
                </div>
          </div>
        <div class="container" style="max-width:1600px">
            <div class="row" style="width=100%">
                <div id="bigcontainerid" class="col-7" style="display:none">
                    <div  class="big-container" >

                            <div id="display_offers" class="display-offers">  
                                <button id="display_btn" class="display-offers-btn">Display Offers
                                    <span id="left" class="left"></span>
                                    <span id="right" class="right"></span>
                                </button>
                                <div id="offers" class="offers">
                                            
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-<?php if($auction['owner']["id"]!=$_SESSION["user"]["id"]) echo 6;else echo 5;?>" style="<?php if($auction['owner']["id"]!=$_SESSION["user"]["id"]) echo "margin:auto";?>" >
                <div class="aldiv">
  <div class="app-container">
    <div class="app-main">
      <div id="chat" class="chat-wrapper">

      </div>
      <div class="chat-input-wrapper">
        <button class="chat-attachment-btn">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="feather feather-paperclip"
            viewBox="0 0 24 24">
            <defs />
            <path
              d="M21.44 11.05l-9.19 9.19a6 6 0 01-8.49-8.49l9.19-9.19a4 4 0 015.66 5.66l-9.2 9.19a2 2 0 01-2.83-2.83l8.49-8.48" />
          </svg>
        </button>
        <div class="input-wrapper">
          <input id="chatinput" type="text" class="chat-input" placeholder="Enter your message here">
          <button class="emoji-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor"
              stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="feather feather-smile"
              viewBox="0 0 24 24">
              <defs />
              <circle cx="12" cy="12" r="10" />
              <path d="M8 14s1.5 2 4 2 4-2 4-2M9 9h.01M15 9h.01" />
            </svg>
          </button>
        </div>
        <button id="chatsend" class="chat-send-btn">Send</button>
      </div>
    </div>

    
  </div>
  <!-- partial -->
  <script src="./script.js"></script>
</div>
                </div>
                        
               
            </div>
        </div>
          
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
                                        <button>SUBSCRIBE <i class="fas fa-paper-plane"></i></button>
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
    <div class="offer" id="offer">
    <form id="formF" method="post"  enctype="multipart/form-data">
        <input class="inputt inputt-normal" type="text" id ="name" name="name" style="margin-top:100px" placeholder="Item Name" required="required" />
        <p id="name_error" class="error" ></p>
        <textarea class="inputt"  name="description" id="description"  placeholder="Item Description" required ></textarea>
        <p id="description_error" class="error"></p>
        <input class="custom-file-inputt"  type="file" name="img_file" id="img_file"   />
        <p id="image_number_max" class="error" style="margin-top:2px"></p>
        <button type="submit" name="form_submit" id="form_submit" class="btnn btnn-primary btnn-block btnn-large">Organize Auction</button>
    </form>
    </div>
    <div class="offer" id="modify">
    <div id="remove_btn" class="remove-btn" style="top:3%;right:35%;background-color:orange;">Remove</div>
    <div id="modify_btn" class="remove-btn" style="top:3%;left:35%;right:unset;background-color:orange;">Modify</div>
   
    <form id="formM" method="post"  enctype="multipart/form-data">
        <input class="inputt inputt-normal" type="text" id ="nameM" name="name" style="margin-top:100px" placeholder="Item Name" required="required" />
        <p id="name_errorM" class="error" ></p>
        <textarea class="inputt"  name="description" id="descriptionM"  placeholder="Item Description" required ></textarea>
        <p id="description_errorM" class="error"></p>
        <input class="custom-file-inputt"  type="file" name="img_file" id="img_fileM"   />
        <p id="image_number_maxM" class="error" style="margin-top:2px"></p>
        <button type="submit" name="form_submit" id="form_submitM" class="btnn btnn-primary btnn-block btnn-large">Organize Auction</button>
    </form>
    </div>
    <!-- footer-area-end -->
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
    <script>
        var timerID=0; var mins;
        function setTimer()
        {
            let strdate="<?php echo(strtotime($auction["startDate"])) ; ?>"-3600;
            var days=Math.floor((strdate-(new Date().getTime()/1000))/(3600*24));
            var hours=Math.floor(((strdate-(new Date().getTime()/1000))%(3600*24))/3600);
            mins=Math.floor((((strdate-(new Date().getTime()/1000))%(3600*24))%3600)/60);
            var secs=Math.floor((((strdate-(new Date().getTime()/1000))%(3600*24))%3600)%60);
            var timeLeft;
            
            if(days<0 && hours<0 &&  mins<-59 && secs<-59)
            timeLeft="Auction Closed";
            
            else{
            
            mins=(60+mins).toString();if(mins.length===1) mins="0"+mins;
            secs=(60+secs).toString();if(secs.length===1) secs="0"+secs;
            
            timeLeft=mins+':'+secs;
            }
            if(hours==-2) 
            {   
                alert('Auction Is over , redirection you to auction menu!');
                
                setTimeout(() => { window.location.href = '../controller/displayAllAuctions.php';
                }, 3000);
                clearInterval(timerID);
            }
            else
            {
            document.getElementById('timer').innerHTML=timeLeft;
            }
           
            return timeLeft;
            

            
        }
        timerID=setInterval(setTimer, 500);
        function getParticipentsNumber()
        {
            $.when($.ajax({
                url:'../controller/addoffer.php',
                type:'post',
                data:{'getNumber':1,
                'idAuction':idAuction},
            })).then(function(data){
                $('#participent').text(data);
            });
        }
        setInterval(getParticipentsNumber,2000);
         
        
        var idAuction=<?php echo $auction["id"] ?>;
        //var img = document.createElement("img");
        var idUser=<?php echo $_SESSION["user"]["id"] ?>;
        function checkOfferStatus()
        {
        $.when($.ajax({
                url:'../controller/addoffer.php',
                type:'post',
                data:{'idUser':idUser,'idAuction':idAuction},
            })).then(function(data){
                if(data.trim()=='exist') 
                {
                    $('#addoffer').text("Modify");
                }
                else $('#addoffer').text("Add offer");
                
            });
        }
        setInterval(checkOfferStatus,1000);
        

        $('#addoffer').click(function(){
            $.when($.ajax({
                url:'../controller/addoffer.php',
                type:'post',
                data:{'idUser':idUser,'idAuction':idAuction},
            })).then(function(data){
                if(data.trim()=='exist') 
                {
                    $('footer').css("filter","blur(20px)");
                    $('header').css("filter","blur(20px)");
                    $('main').css("filter","blur(20px)");
                    $('#modify').css("display","block");
                    
                    $('#nameM').attr('disabled','disabled');
                    $('#descriptionM').attr('disabled','disabled');
                    $('#img_fileM').attr('disabled','disabled');
                    
                    $('#nameM').css('background-color','grey');
                    $('#descriptionM').css('background-color','grey');
                    
                    $('#modify_btn').click(function(){
                        $('#nameM').attr('disabled',false);
                        $('#descriptionM').attr('disabled',false);
                        $('#img_fileM').attr('disabled',false);
                        $('#submitM').attr('disabled',false);
                        $('#nameM').css('background-color','rgba(0,0,0,0.6)');
                        $('#descriptionM').css('background-color','rgba(0,0,0,0.6)');
                        
                    });

                    $('#remove_btn').click(function(){
                        
                        $.ajax({
                            url:'../controller/removeOffer.php',
                            type:'POST',
                            data:{'myId' : <?php echo $_SESSION["user"]["id"]; ?>},
                            success:function(){fetchBestOffer;fetchOffers;},
                        })
                        $('footer').css("filter","none");
                        $('header').css("filter","none");
                        $('main').css("filter","none");
                        $('#offer').css("display","none");
                        $('#modify').css("display","none");
                        $('#addoffer').text("Add offer");
                    });
                    
                }
                else
                 {
                    $('footer').css("filter","blur(20px)");
                    $('header').css("filter","blur(20px)");
                    $('main').css("filter","blur(20px)");
                    $('#offer').css("display","block");           
                    $('#addoffer').text("Add offer");
                 }
                
            })


        })


        
        $('#formF').submit(addNewOffer);
        $('#formM').submit(modifyOffer);



        $('html').click(function(e){
            if($(e.target).closest("#offer").length === 0 && $(e.target).closest("#modify").length === 0 && e.target.id!="addoffer" ){
                $('footer').css("filter","none");
                $('header').css("filter","none");
                $('main').css("filter","none");
                $('#offer').css("display","none");
                $('#modify').css("display","none");
                
            }
        });
        
    
        

        ////// Offer control
        function modifyOffer( event ) {
            
            var correct;
            correctName=true,correctDesc=true,correctIMG=true;
            event.preventDefault();
            if($('#nameM').val().trim().length<2) 
            {
                correctName=false;
                $('#name_errorM').text('Name is Too Short!');       
            }
            else
            {
                if($('#nameM').val().trim().length>15) 
                {
                    correctName=false;
                    $('#name_errorM').text('Name is Too Long!');
                }else {$('#name_errorM').text('');correctName=true;}
            }
            if($('#descriptionM').val().trim().length<10) 
            {
                correctDesc=false;
                $('#description_errorM').text('description is Too Short!(min is 10 letters)');
            }else
            {
                if($('#descriptionM').val().trim().length>50) 
                {
                    correctDesc=false;
                    $('#description_errorM').text('description is Too Long!(max is 50 letters)');
                }else  {$('#description_errorM').text('');correctDesc=true;}
            }
            if($('#img_fileM').val()=='')
            {
                $('#image_number_maxM').text('Image is Required!');
                correctIMG=false;
            }
            else
            {
                let extention=$('#img_fileM').val().substring($('#img_fileM').val().indexOf('.')+1);
                if(extention!='png' && extention!='jpg' && extention!='jpeg') 
                {
                    correctIMG=false;
                    $('#image_number_maxM').text('Invalid image extention, please select a valid image format!');
                }else 
                {
                    $('#image_number_maxM').text('');
                    correctIMG=true;
                }
            }
            if(correctName&&correctDesc&&correctIMG)
            {
               
                const form=$('#formM');
                let formData=new FormData(form[0]);
                formData.append('idAuction',idAuction);
                formData.append('idParticipent',<?php echo $_SESSION["user"]["id"] ?>);
                formData.append('forModification','yes');
                
                $.when($.ajax({
                    url:'../controller/addoffer.php',
                    type:'post',
                    data:formData,
                    contentType:false,
                    processData:false,
                })).then(function(data){alert('Your Offer has been Modified!');$('footer').css("filter","none");
                $('header').css("filter","none");
                $('main').css("filter","none");
                $('#modify').css("display","none");;},function(){ alert("Something went wrong!");});
                $('#addoffer').text("Modify");
            }
            
            
        }
        

        function addNewOffer( event ) {
            
            var correct;
            correctName=true,correctDesc=true,correctIMG=true;
            event.preventDefault();
            if($('#name').val().trim().length<2) 
            {
                correctName=false;
                $('#name_error').text('Name is Too Short!');       
            }
            else
            {
                if($('#name').val().trim().length>15) 
                {
                    correctName=false;
                    $('#name_error').text('Name is Too Long!');
                }else {$('#name_error').text('');correctName=true;}
            }
            if($('#description').val().trim().length<10) 
            {
                correctDesc=false;
                $('#description_error').text('description is Too Short!(min is 10 letters)');
            }else
            {
                if($('#description').val().trim().length>50) 
                {
                    correctDesc=false;
                    $('#description_error').text('description is Too Long!(max is 50 letters)');
                }else  {$('#description_error').text('');correctDesc=true;}
            }
            if($('#img_file').val()=='')
            {
                $('#image_number_max').text('Image is Required!');
                correctIMG=false;
            }
            else
            {
                let extention=$('#img_file').val().substring($('#img_file').val().indexOf('.')+1);
                if(extention!='png' && extention!='jpg' && extention!='jpeg') 
                {
                    correctIMG=false;
                    $('#image_number_max').text('Invalid image extention, please select a valid image format!');
                }else 
                {
                    $('#image_number_max').text('');
                    correctIMG=true;
                }
            }
            if(correctName&&correctDesc&&correctIMG)
            {
               
                const form=$('#formF');
                let formData=new FormData(form[0]);
                formData.append('idAuction',idAuction);
                formData.append('idParticipent',<?php echo $_SESSION["user"]["id"] ?>);
                
                $.when($.ajax({
                    url:'../controller/addoffer.php',
                    type:'post',
                    data:formData,
                    contentType:false,
                    processData:false,
                })).then(function(data){alert('Your Offer has been added!');$('footer').css("filter","none");
                $('header').css("filter","none");
                $('main').css("filter","none");
                $('#offer').css("display","none");},function(){ alert("Something went wrong!");});
                $('#addoffer').text("Modify");
            }
            
            
        }
    
        var best;
      
        function fetchBestOffer()
        {
            
            $.when($.ajax({
                        url:'../controller/fetchBestOffer.php',
                        type:'POST',
                        data:{'id' : idAuction},
                
                    })).then(
                        function(data){
                            if(data.trim()!='none') {
                                best=JSON.parse(data);
                                $('#best_offer_image').attr('src','data:image/jpeg;base64,'+best['offer']['image']);
                                $('#best_offerer_image').css('display','unset');
                                $('#best_offer_image').css('display','unset');
                                $("#best_offer_name").text(best['offer']['name']);
                                $("#best_offer_desc").text('Description: '+best['offer']['description']);
                                $("#best_offerer_image").attr('src','data:image/jpeg;base64,'+best['participent']['photo']);
                                $('#offerer_name').text(best['participent']['username']);
                                $('#offerer_join_date').text('Member since: '+best['participent']['creation_date'].substring(0,4));
                                
                            }
                            else
                            {
                                $('#best_offer_image').attr('src','img/icon/404.jfif');
                                $("#best_offer_name").text('No Offer is Chosen Yet');
                                $("#best_offer_desc").text('');
                                $('#offerer_name').text('');
                                $('#offerer_join_date').text('');
                                $('#best_offerer_image').css('display','none');
                            }
                            
                           
                    }
                        ,function(){ alert("Something went wrong!");});
        }
        setInterval(fetchBestOffer,3000);
    
         
        var status=1;
        var height=0;
        var offers;
        var i;
        var lastData='';
        function fetchOffers()
        {
            i=0;
            $.when($.ajax({
                        url:'../controller/fetchOffers.php',
                        type:'POST',
                        data:{'id' : idAuction},
                    })).then(
                        function(data){
                            if(data.trim()!='none' && data!=lastData) {
                                offers=JSON.parse(data);
                                lastData=data;
                                $('#offers').html('');
                                height=0;
                                for(offer of offers)
                                {
                                    //height+=300;
                                    //$('.big-container').css('height',height)
                                    $('#offers').append('<div class="offer-item" style="--i:'+i+'"><div class="user-details-grid" style="padding-left:20px"><img class="image" src="data:image/jpeg;base64,'+offer["offer"]["image"]+'" alt=""><div class="best-offrer-details best-offrer-details-bg" style="margin-left:5%;"><div class="name">Item name: '+offer["offer"]["name"]+'</div><div class="user-details">Description: '+offer["offer"]["description"]+'</div><div class="user-details-grid"><img class="user-image"src="data:image/jpeg;base64,'+offer["participent"]["photo"]+'"alt=""><div class="user-info-grid"><div class="name">'+offer["participent"]["username"]+'</div></div></div></div></div><div class= "best-offer-btn" id="o'+offer['offer']['id_offer']+'">Chose As Best Offer</div ><div class= "remove-btn" id="r'+offer['offer']['id_offer']+'"  >Remove</div ></div>');
                                    $('#o'+offer['offer']['id_offer']).click(makeBestOffer);
                                    $('#r'+offer['offer']['id_offer']).click(removeOffer);
                                    i++;
                                }
                                
                            }
                            if(data.trim()=='none')
                            {
                                $('#offers').html('');
                            }
                            
                           
                    }
                        ,function(){ alert("Something went wrong!");});
        }
        function checkIfClosed()
        {
            $.when($.ajax({
                url:'../controller/makeBestOffer.php',
                type:'POST',
                data:{'id' : idAuction, 
                'request':"checkclosed",  
            },
                
            })).then(function(data){
                if(data.trim()==1)  
                {
                    alert('Auction is closed!');
                    window.location.href ='../controller/displayAllAuctions.php';
                }

            })
        }

        setInterval(checkIfClosed, 3000);
        if(<?php echo $_SESSION["user"]["id"] ?> == <?php echo $auction["owner"]["id"] ?>)
        {
        $('#bigcontainerid').css('display','block');
        $('#addoffer').css('display','none');
        $('#closeAuction').css('display','block');
        $('#closeAuction').click(closeAuction);
        function closeAuction()
        {
            
            $.ajax({
                url:'../controller/makeBestOffer.php',
                type:'POST',
                data:{'id' : idAuction,
                'request':"closeauction",
                'duration':mins,
            },
                
            })
        }
        
        
        
        setInterval(fetchOffers,3000);
        }
        else
        {
        $('#display_btn').css('display','none');
        $('#display_offers').css('display','none');
        }
        
        $('#display_btn').click(function(){
            $('#offers').css
            if(status==1)
            {   
                $('#display_offers').toggleClass("active",true);
                $('#offers').css('overflow-y','scroll');
                $('#left').css('transform','rotate(45deg)');
                $('#right').css('transform','rotate(-45deg)');
                $('#offers').css('height','65vh');
                status = 0;   
            }
            else
            {
                
                $('#display_offers').toggleClass("active",false);
                $('#left').css('transform','rotate(-45deg)');
                $('#right').css('transform','rotate(45deg)');
                $('#offers').css('overflow-y','hidden');
                
                status = 1;  
            }
        })
        function makeBestOffer()
        {
           
            $.ajax({
                url:'../controller/makeBestOffer.php',
                type:'POST',
                data:{'id' : this.id.substring(1)},
                success:fetchBestOffer,
            })
            $('html, body').animate({ scrollTop: 0 }, 'fast');
            
        }
        function removeOffer()
        {
           
            $.ajax({
                url:'../controller/removeOffer.php',
                type:'POST',
                data:{'id' : this.id.substring(1)},
                success:function(){fetchBestOffer;fetchOffers;},
            })
            
            
        }
        fetchOffers();
        fetchBestOffer();
    </script>
    <script>
        /////CHAT
        var idAuction=<?php echo $auction["id"] ?>;
        var lastMessageId=0;
        alert(idAuction);
        $('#chatsend').click(addMessage);
        $('#chatinput').keydown(function(event){
            if(event.keyCode==13)
            addMessage();
        })
        function getNewMessages()
        {
            $.when($.ajax({
                url:'../controller/chatController.php',
                type:'POST',
                data:{'idauction' : idAuction, 
                'request':"getnewmessages",
                'lastmessageid':lastMessageId,  
                
            },
                
            })).then(function(data){
                if(data.trim()!="")
                {
                    let messages=JSON.parse(data);
                    for(msg of messages)
                    {
                        if(msg["id_user"]=="<?php echo $_SESSION["user"]["id"]; ?>")
                        {
                            $('.chat-wrapper').append('<div class="message-wrapper reverse"><img class="message-pp" src="data:image/jpeg;base64,'+msg["user"]["photo"]+'" alt="profile-pic"> <div class="message-box-wrapper"> <div class="message-box">'+msg["content"]+'</div> <span>9h ago</span> </div> </div>');
                        }
                        else
                        {
                            $('.chat-wrapper').append('<div class="message-wrapper"><img class="message-pp" src="data:image/jpeg;base64,'+msg["user"]["photo"]+'" alt="profile-pic"> <div class="message-box-wrapper"> <div class="message-box">'+msg["content"]+'</div> <span>9h ago</span> </div> </div>');
                        }
                        lastMessageId=msg["id"];
                    } 
                    $('#chat').scrollTop($('#chat').prop("scrollHeight"));
                }
            }) 
            
        }
       function addMessage()
        {
            var message=$('#chatinput').val();
            if(message!="")
            {
                $.ajax({
                    url:'../controller/chatController.php',
                    type:'POST',
                    data:{'idauction' : idAuction, 
                    'request':"addmessage",  
                    'message':message,
                },
                    
                })
                
            }
            $('#chatinput').val("");
        }

        setInterval(getNewMessages,300);
        

    </script>
    
</body>

</html>