<?php 
include('../controller/userController.php');
require '../controller/merch.php';
error_reporting(E_ERROR | E_PARSE);
session_start();

?>
<!doctype html>
<html class="no-js" lang="">

<!-- Mirrored from themebeyond.com/html/geco/Geco/shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 31 Oct 2022 13:05:01 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PointsShop</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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

    <!-- main-area -->
    <main>

        <!-- breadcrumb-area -->
        <section class="breadcrumb-area breadcrumb-bg2">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-content text-center">
                            <h2>POINTS <span>SHOP</span></h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">POINTSSHOP</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- shop-area -->
        <section class="shop-area black-bg pt-115 pb-90">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title title-style-three white-title text-center mb-40">
                            <h2>Buy with your<span> OTP</span></h2>
                        </div>
                    </div>
                </div>
                <div class="row product-active">
                     <div class="col-xl-3">
                        <div class="shop-item">
                            <div class="product-thumb">
                            <a><img id="prod0" src=""></a>
                            </div>
                            <div id="0" class="product-content">
                                <div class="product-tag"><a id="prod0n" href="javascript:void(0)">NOTHING HERE</a></div>
                                <div class="product-meta">
                                    <div class="product-price">
                                                    <h5 id="prod00q"></h5><h4 id="prod0q"></h4>
                                                    <h5 id="prod00p"></h5><h4 id="prod0p"></h4>
                                                    <h5 id="prod00des"></h5><h4 id="prod0des"></h4>
                                    </div>
                                    <form method="get">
                                    <div id="prod00basket"> <!-- class="product-cart-action" -->
                                          <a id='basket0' href="javascript:void(0)"><i id="prod0basket" ></i></a> <!--class="fas fa-shopping-basket" -->
                                    </div>
                                     </form>
                                </div>
                            </div>
                        </div>
                       </div>
                       <div class="col-xl-3">
                        <div class="shop-item">
                            <div class="product-thumb">
                            <a><img id="prod1" src=""></a>
                            </div>
                            <div class="product-content">
                                <div class="product-tag"><a id="prod1n" href="javascript:void(0)">NOTHING HERE</a></div>
                                <div class="product-meta">
                                    <div class="product-price">
                                                    <h5 id="prod11q"></h5><h4 id="prod1q"></h4> 
                                                    <h5 id="prod11p"></h5><h4 id="prod1p"></h4> 
                                                    <h5 id="prod11des"></h5><h4 id="prod1des"></h4> 
                                    </div>
                                    <form method='get'>
                                    <div id="prod11basket"> <!-- class="product-cart-action" -->
                                          <a id='basket1' href="javascript:void(0)"><i id="prod1basket" ></i></a> <!--class="fas fa-shopping-basket" -->
                                    </div>
                                   </form>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="col-xl-3">
                        <div class="shop-item">
                            <div class="product-thumb">
                            <a><img id="prod2" src=""></a>
                            </div>
                            <div class="product-content">
                                <div class="product-tag"><a id="prod2n" href="javascript:void(0)">NOTHING HERE</a></div>
                                <div class="product-meta">
                                    <div class="product-price">
                                                <h5 id="prod22q"></h5><h4 id="prod2q"></h4> 
                                                <h5 id="prod22p"></h5><h4 id="prod2p"></h4> 
                                                <h5 id="prod22des"></h5><h4 id="prod2des"></h4> 
                                    </div>
                                    <form method='get'>
                                    <div id="prod22basket"> <!-- class="product-cart-action" -->
                                    <a id='basket2' href="javascript:void(0)"><i id="prod2basket" ></i></a> <!--class="fas fa-shopping-basket" -->
                                    </div>
                                     </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="shop-item">
                            <div class="product-thumb">
                            <a><img id="prod3" src=""></a>
                            </div>
                            <div class="product-content">
                                <div class="product-tag"><a id="prod3n" href="javascript:void(0)">NOTHING HERE</a></div>
                                <div class="product-meta">
                                    <div class="product-price">
                                                    <h5 id="prod33q"></h5><h4 id="prod3q"></h4> 
                                                    <h5 id="prod33p"></h5><h4 id="prod3p"></h4> 
                                                    <h5 id="prod33des"></h5><h4 id="prod3des"></h4> 
                                    </div>
                                    <form method='get'>
                                    <div id="prod33basket"> <!-- class="product-cart-action" -->
                                          <a id='basket3' href="javascript:void(0)"><i id="prod3basket" ></i></a> <!--class="fas fa-shopping-basket" -->
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="shop-item">
                            <div class="product-thumb">
                            <a><img id="prod4" src=""></a>
                            </div>
                            <div class="product-content">
                                <div class="product-tag"><a id="prod4n" href="javascript:void(0)">NOTHING HERE</a></div>
                                <div class="product-meta">
                                    <div class="product-price">
                                                   <h5 id="prod44q"></h5><h4 id="prod4q"></h4> 
                                                   <h5 id="prod44p"></h5><h4 id="prod4p"></h4> 
                                                   <h5 id="prod44des"></h5><h4 id="prod4des"></h4> 
                                    </div>
                                    <form method='get'>
                                    <div id="prod44basket"> <!-- class="product-cart-action" -->
                                          <a id='basket4' href="javascript:void(0)"><i id="prod4basket" ></i></a> <!--class="fas fa-shopping-basket" -->
                                    </div>
                                     </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- shop-area-end -->
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

    <!-- PHP HERE -->
    <?php
    
       $tab=new merch;
       $tab0 = $tab->affiche();
       $id=$_SESSION["user"]["id"];
       $paniershow=new panier;
       $product=$paniershow->showbasket($id);
       $length=count($product);
       $nopoints=$_GET["nopoints"];
     ?>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"> </script>
     <!-- Script for merch -->
     <script language='Javascript'>
        function show(data)
        {
            document.getElementById("shopcart").innerHTML="";
                                    const product = JSON.parse(data);
                                    var length = Object.keys(product).length;
                                    var nopoints="<?php if($nopoints!=0) echo $nopoints; else echo("") ?>";
                                    var max=0;
                                    var qbas=0;
                    for(var i=0;i<length;i++)
                    {
                        const li=document.createElement("li");
                        li.className="d-flex align-items-start";
                        shopcart.appendChild(li);
                       const div1=document.createElement("div");
                        div1.className="cart-img";
                        li.appendChild(div1);
                        const img=document.createElement("img");
                        img.src=product[i][0];
                        div1.appendChild(img);
                        const div2=document.createElement("div");
                        div2.className="cart-content";
                        li.appendChild(div2);
                        const h4=document.createElement("h4");
                        div2.appendChild(h4);
                        const p=document.createElement("p");
                        h4.appendChild(p);
                        p.innerHTML=product[i][1];
                        const div3=document.createElement("div");
                        div3.className="cart-price";
                        div2.appendChild(div3);
                        const span=document.createElement("span");
                        span.className="new";
                        span.innerHTML="QTY: "+product[i][3];
                        div3.appendChild(span);
                        const div4=document.createElement("div");
                        div4.className="cart-price";
                        div2.appendChild(div4);
                        const span1=document.createElement("span");
                        span1.className="new";
                        span1.innerHTML="PRICE: "+product[i][2];
                        div4.appendChild(span1);
                        const div5=document.createElement("div");
                        div5.className="del-icon";
                        li.appendChild(div5);
                        const form=document.createElement("form");
                        form.method="POST";
                        div5.appendChild(form);
                        const a=document.createElement("a");
                            a.href="../model/deletepanier.php?id_prod="+product[i][5];
                          form.appendChild(a);
                        const ii=document.createElement("i");
                        ii.className="far fa-trash-alt";
                        ii.style.color="rgb(54, 169, 225)";
                        a.appendChild(ii);
                        max=max+(product[i][2]*product[i][3]);
                        qbas=qbas+product[i][3];
                    }
                    const qofbasket=document.getElementById('qofbasket');
                 qofbasket.innerHTML=qbas;
                const li2=document.createElement("li");
                            shopcart.appendChild(li2);
                     const div6=document.createElement("div");
                           div6.className="total-price";
                           li2.appendChild(div6);
                     const span2=document.createElement("span");
                           span2.className="f-left";
                           span2.innerHTML="TOTAL:";
                     const span3=document.createElement("span");
                           span3.className="f-right";
                           span3.setAttribute("id","total");
                           div6.appendChild(span2);
                           div6.appendChild(span3);
                       var total=document.getElementById('total');
                       total.innerHTML=max+' OTP';
                       // 
                       const span4=document.createElement("span");
                             span4.className="f-left";
                             span4.style.color="red";
                             div6.appendChild(span4);
                             span4.innerHTML="you don't have enough points";
                             span4.style.display="none";
                             span4.id="nopoints";
                       const li3=document.createElement("li");
                            shopcart.appendChild(li3);
                       const div7=document.createElement("div");
                             div7.className="checkout-link";
                             li3.appendChild(div7);
                       const a2=document.createElement("a");
                            a2.className="red-color";
                            a2.id="checkout";
                            a2.href="../model/checkout.php";
                            a2.innerHTML="Checkout";
                            div7.appendChild(a2);
                            $('#checkout').click(checkout);
                            function checkout(e){
                            e.preventDefault();
                            $.when($.ajax(
                                {
                                    url:'../model/checkout.php',
                                    type:'POST',
                                    data:{'check' : max},
                                }
                            )).then(function(data)
                            {
                                if(data=="enough")
                                {
                                    $('#shopcart').html('');
                                    $('#qofbasket').html('0');
                                    $.when($.ajax({
                                        url:'../model/checkout.php',
                                        type:'POST',
                                        data:{'total' : max},
                                            
                                        })).then(
                                        function(data)
                                        { 
                                           
                                        }
                                    )
                                }
                                else
                                {
                                $('#nopoints').css("display","block");
                                }
                            });
                                        
                        }
        }
        var tab00="<?php if(isset($tab0[0]['id'])) echo ($tab0[0]['id']); else echo("");?>";
        var tab11="<?php if(isset($tab0[1]['id'])) echo ($tab0[1]['id']); else echo("");?>";
        var tab22="<?php if(isset($tab0[2]['id'])) echo ($tab0[2]['id']); else echo("");?>";
        var tab33="<?php if(isset($tab0[3]['id'])) echo ($tab0[3]['id']); else echo("");?>";
        var tab44="<?php if(isset($tab0[4]['id'])) echo ($tab0[4]['id']); else echo("");?>";
        var logedin=<?php if(isset($_SESSION["user"])) echo("1"); else echo("0");?>;
                if(tab00!="")
                {
                    var
            prod0 = document.getElementById("prod0");
        var
            prod0n = document.getElementById("prod0n");
        var
            prod0q = document.getElementById("prod0q");
        var
            prod0p = document.getElementById("prod0p");
            var prod00q=document.getElementById('prod00q');
        var prod00p=document.getElementById('prod00p');
        var 
        prod0des= document.getElementById('prod0des');
        var
        prod00des=document.getElementById('prod00des');
            var prod00basket=document.getElementById("prod00basket");
            var prod0basket=document.getElementById("prod0basket");
            var basket0=document.getElementById("basket0");
        var tab4 = '<?php if(isset($tab0[0]['img_url'])) echo ($tab0[0]['img_url']); else echo(""); ?>';
        var tab1 = '<?php if(isset($tab0[0]['name'])) echo ($tab0[0]['name']); else echo(""); ?>';
        var tab2 = '<?php if(isset($tab0[0]['quantity'])) echo ($tab0[0]['quantity']); else echo(""); ?>';
        var tab3 = '<?php if(isset($tab0[0]['price'])) echo ($tab0[0]['price']); else echo(""); ?>';
        var tab5 ='<?php if(isset($tab0[0]['description'])) echo ($tab0[0]['description']); else echo(""); ?>';
        prod0.src= tab4;
        prod0n.innerHTML = tab1;
        prod00q.innerHTML = 'quantity: ';
        prod0q.innerHTML=tab2;
        prod00p.innerHTML = 'Price: ';
        prod0p.innerHTML =tab3+' OTP';
        prod00des.innerHTML='Description:';
        prod0des.innerHTML=tab5;
         prod00basket.className="product-cart-action";
         prod0basket.className="fas fa-shopping-basket";
            $('#basket0').click(addpanier);
                            function addpanier(e){
                                e.preventDefault();
                                $.when($.ajax(
                                    {
                                        url:'../model/addpanier.php',
                                        type:'POST',
                                        data:{'id' : tab00},
                                    }
                                )).then(function(data)
                                {
                                    show(data);

                                })

                            }
                              $('#basket0').click(function(){
                                if(logedin===0)
                                {
                                    window.location="signin.php";
                                }
                              });

            }
                if (tab11!="")
       {
        var
            prod1 = document.getElementById("prod1");
        var
            prod1n = document.getElementById("prod1n");
        var
            prod1q = document.getElementById("prod1q");
        var
            prod1p = document.getElementById('prod1p');
            var 
        prod1des= document.getElementById('prod1des');
        var
        prod11des=document.getElementById('prod11des');
        var prod11q=document.getElementById('prod11q');
        var prod11p=document.getElementById('prod11p');
            var prod11basket=document.getElementById("prod11basket");
            var prod1basket=document.getElementById("prod1basket");
            var basket1=document.getElementById("basket1");
        var tab4 = '<?php if(isset($tab0[1]['img_url'])) echo ($tab0[1]['img_url']); else echo(""); ?>';
        var tab1 = '<?php if(isset($tab0[1]['name'])) echo ($tab0[1]['name']); else echo(""); ?>';
        var tab2 = '<?php if(isset($tab0[1]['quantity'])) echo ($tab0[1]['quantity']); else echo(""); ?>';
        var tab3 = '<?php if(isset($tab0[1]['price'])) echo ($tab0[1]['price']); else echo(""); ?>';
        var tab5 ='<?php if(isset($tab0[1]['description'])) echo ($tab0[1]['description']); else echo(""); ?>';
        prod1.src= tab4;
        prod1n.innerHTML = tab1;
        prod11q.innerHTML = 'quantity: ';
        prod1q.innerHTML=tab2;
        prod11p.innerHTML = 'Price: ';
        prod1p.innerHTML =tab3+' OTP';
        prod11des.innerHTML='Description:';
        prod1des.innerHTML=tab5;
        prod11basket.className="product-cart-action";
         prod1basket.className="fas fa-shopping-basket";
         $('#basket1').click(addpanier);
                            function addpanier(e){
                                e.preventDefault();
                                $.when($.ajax(
                                    {
                                        url:'../model/addpanier.php',
                                        type:'POST',
                                        data:{'id' : tab11},
                                    }
                                )).then(function(data)
                                {
                                    show(data);

                                })
                            }
                            $('#basket1').click(function(){
                                if(logedin===0)
                                {
                                    window.location="signin.php";
                                }
                              });
         } 
         if (tab22!="")
         {
            var
            prod2 = document.getElementById("prod2");
        var
            prod2n = document.getElementById("prod2n");
        var
            prod2q = document.getElementById("prod2q");
        var
            prod2p = document.getElementById("prod2p");
            var 
        prod2des= document.getElementById('prod2des');
        var
        prod22des=document.getElementById('prod22des');
            var prod22q=document.getElementById('prod22q');
        var prod22p=document.getElementById('prod22p');
            var prod22basket=document.getElementById("prod22basket");
            var prod2basket=document.getElementById("prod2basket");
            var basket2=document.getElementById("basket2");
        var tab4 = '<?php if(isset($tab0[2]['img_url'])) echo ($tab0[2]['img_url']); else echo(""); ?>';
        var tab1 = '<?php if(isset($tab0[2]['name'])) echo ($tab0[2]['name']); else echo(""); ?>';
        var tab2 = '<?php if(isset($tab0[2]['quantity'])) echo ($tab0[2]['quantity']); else echo(""); ?>';
        var tab3 = '<?php if(isset($tab0[2]['price'])) echo ($tab0[2]['price']); else echo(""); ?>';
        var tab5 ='<?php if(isset($tab0[2]['description'])) echo ($tab0[2]['description']); else echo(""); ?>';
        prod2.src= tab4;
        prod2n.innerHTML = tab1;
        prod22q.innerHTML = 'quantity: ';
        prod2q.innerHTML=tab2;
        prod22p.innerHTML = 'Price: ';
        prod2p.innerHTML =tab3+' OTP';
        prod22des.innerHTML='Description:';
        prod2des.innerHTML=tab5;
        prod22basket.className="product-cart-action";
         prod2basket.className="fas fa-shopping-basket";
         $('#basket2').click(addpanier);
                            function addpanier(e){
                                e.preventDefault();
                                $.when($.ajax(
                                    {
                                        url:'../model/addpanier.php',
                                        type:'POST',
                                        data:{'id' : tab22},
                                    }
                                )).then(function(data)
                                {
                                    show(data);

                                })
                            }
                            $('#basket2').click(function(){
                                if(logedin===0)
                                {
                                    window.location="signin.php";
                                }
                              });
         }
         if (tab33!="")
         {
            var
            prod3 = document.getElementById("prod3");
        var
            prod3n = document.getElementById("prod3n");
        var
            prod3q = document.getElementById("prod3q");
        var
            prod3p = document.getElementById("prod3p");
            var 
        prod3des= document.getElementById('prod3des');
        var
        prod33des=document.getElementById('prod33des');
            var prod33q=document.getElementById('prod33q');
        var prod33p=document.getElementById('prod33p');
            var prod33basket=document.getElementById("prod33basket");
            var prod3basket=document.getElementById("prod3basket");
            var basket3=document.getElementById("basket3");
        var tab4 = '<?php if(isset($tab0[3]['img_url'])) echo ($tab0[3]['img_url']); else echo(""); ?>';
        var tab1 = '<?php if(isset($tab0[3]['name'])) echo ($tab0[3]['name']); else echo(""); ?>';
        var tab2 = '<?php if(isset($tab0[3]['quantity'])) echo ($tab0[3]['quantity']); else echo(""); ?>';
        var tab3 = '<?php if(isset($tab0[3]['price'])) echo ($tab0[3]['price']); else echo(""); ?>';
        var tab5 ='<?php if(isset($tab0[3]['description'])) echo ($tab0[3]['description']); else echo(""); ?>';
        prod3.src= tab4;
        prod3n.innerHTML = tab1;
        prod33q.innerHTML = 'quantity: ';
        prod3q.innerHTML=tab2;
        prod33p.innerHTML = 'Price: ';
        prod3p.innerHTML =tab3+' OTP';
        prod33des.innerHTML='Description:';
        prod3des.innerHTML=tab5;
        prod33basket.className="product-cart-action";
         prod3basket.className="fas fa-shopping-basket";
         $('#basket3').click(addpanier);
                            function addpanier(e){
                                e.preventDefault();
                                $.when($.ajax(
                                    {
                                        url:'../model/addpanier.php',
                                        type:'POST',
                                        data:{'id' : tab33},
                                    }
                                )).then(function(data)
                                {
                                    show(data);

                                })
                            }
                            $('#basket3').click(function(){
                                if(logedin===0)
                                {
                                    window.location="signin.php";
                                }
                              });
         }
         if (tab44!="")
         {
            var
            prod4 = document.getElementById("prod4");
        var
            prod4n = document.getElementById("prod4n");
        var
            prod4q = document.getElementById("prod4q");
        var
            prod4p = document.getElementById('prod4p');
        var 
        prod4des= document.getElementById('prod4des');
        var
        prod44des=document.getElementById('prod44des');
            var prod44q=document.getElementById('prod44q');
        var prod44p=document.getElementById('prod44p');
            var prod44basket=document.getElementById("prod44basket");
            var prod4basket=document.getElementById("prod4basket");
            var basket4=document.getElementById("basket4");
        var tab4 = '<?php if(isset($tab0[4]['img_url'])) echo ($tab0[4]['img_url']); else echo(""); ?>';
        var tab1 = '<?php if(isset($tab0[4]['name'])) echo ($tab0[4]['name']); else echo(""); ?>';
        var tab2 = '<?php if(isset($tab0[4]['quantity'])) echo ($tab0[4]['quantity']); else echo(""); ?>';
        var tab3 = '<?php if(isset($tab0[4]['price'])) echo ($tab0[4]['price']); else echo(""); ?>';
        var tab5 ='<?php if(isset($tab0[4]['description'])) echo ($tab0[4]['description']); else echo(""); ?>';
        prod4.src= tab4;
        prod4n.innerHTML = tab1;
        prod44q.innerHTML = 'quantity: ';
        prod4q.innerHTML=tab2;
        prod44p.innerHTML = 'Price: ';
        prod4p.innerHTML =tab3+' OTP';
        prod44des.innerHTML='Description:';
        prod4des.innerHTML=tab5;
        prod44basket.className="product-cart-action";
         prod4basket.className="fas fa-shopping-basket";
         $('#basket4').click(addpanier);
                            function addpanier(e){
                                e.preventDefault();
                                $.when($.ajax(
                                    {
                                        url:'../model/addpanier.php',
                                        type:'POST',
                                        data:{'id' : tab44},
                                    }
                                )).then(function(data)
                                {
                                    show(data);

                                })
                            }
                            $('#basket4').click(function(){
                                if(logedin===0)
                                {
                                    window.location="signin.php";
                                }
                              });
         }
                </script>
                <!-- END SCRIPT FOR MERCH -->
        <!-- Script for basket -->
                 <script>
                    var length="<?php if($length!=0) echo $length; else echo("") ?>";
                    var nopoints="<?php if($nopoints!=0) echo $nopoints; else echo("") ?>";
                    var max=0;
                    var qbas=0;
                    product=<?php if($length!=0) echo (json_encode($product));?>;
                    if(length!="")
                {
                    shopcart=document.getElementById("shopcart");
                    for(var i=0;i<length;i++)
                    {
                        const li=document.createElement("li");
                        li.className="d-flex align-items-start";
                        shopcart.appendChild(li);
                       const div1=document.createElement("div");
                        div1.className="cart-img";
                        li.appendChild(div1);
                        const img=document.createElement("img");
                        img.src=product[i][0];
                        div1.appendChild(img);
                        const div2=document.createElement("div");
                        div2.className="cart-content";
                        li.appendChild(div2);
                        const h4=document.createElement("h4");
                        div2.appendChild(h4);
                        const p=document.createElement("p");
                        h4.appendChild(p);
                        p.innerHTML=product[i][1];
                        const div3=document.createElement("div");
                        div3.className="cart-price";
                        div2.appendChild(div3);
                        const span=document.createElement("span");
                        span.className="new";
                        span.innerHTML="QTY: "+product[i][3];
                        div3.appendChild(span);
                        const div4=document.createElement("div");
                        div4.className="cart-price";
                        div2.appendChild(div4);
                        const span1=document.createElement("span");
                        span1.className="new";
                        span1.innerHTML="PRICE: "+product[i][2];
                        div4.appendChild(span1);
                        const div5=document.createElement("div");
                        div5.className="del-icon";
                        li.appendChild(div5);
                        const form=document.createElement("form");
                        form.method="POST";
                        div5.appendChild(form);
                        const a=document.createElement("a");
                            a.href="../model/deletepanier.php?id_prod="+product[i][5];
                            a.id=product[i][5];
                          form.appendChild(a);
                        const ii=document.createElement("i");
                        ii.className="far fa-trash-alt";
                        ii.style.color="rgb(54, 169, 225)";
                        a.appendChild(ii);
                        max=max+(product[i][2]*product[i][3]);
                        qbas=qbas+product[i][3];
                    }
                }
                const qofbasket=document.getElementById('qofbasket');
                 qofbasket.innerHTML=qbas;
                const li2=document.createElement("li");
                            shopcart.appendChild(li2);
                     const div6=document.createElement("div");
                           div6.className="total-price";
                           li2.appendChild(div6);
                     const span2=document.createElement("span");
                           span2.className="f-left";
                           span2.innerHTML="TOTAL:";
                     const span3=document.createElement("span");
                           span3.className="f-right";
                           span3.setAttribute("id","total");
                           div6.appendChild(span2);
                           div6.appendChild(span3);
                       var total=document.getElementById('total');
                       total.innerHTML=max+' OTP';
                       // 
                       const span4=document.createElement("span");
                             span4.className="f-left";
                             span4.style.color="red";
                             div6.appendChild(span4);
                             span4.innerHTML="you don't have enough points";
                             span4.style.display="none";
                             span4.id="nopoints";
                       const li3=document.createElement("li");
                            shopcart.appendChild(li3);
                       const div7=document.createElement("div");
                             div7.className="checkout-link";
                             li3.appendChild(div7);
                       const a2=document.createElement("a");
                            a2.className="red-color";
                            a2.id="checkout";
                            a2.href="../model/checkout.php";
                            a2.innerHTML="Checkout";
                            div7.appendChild(a2);
                            $('#checkout').click(checkout);
                            function checkout(e){
                            e.preventDefault();
                            $.when($.ajax(
                                {
                                    url:'../model/checkout.php',
                                    type:'POST',
                                    data:{'check' : max},
                                }
                            )).then(function(data)
                            {
                                if(data=="enough")
                                {
                                    $('#shopcart').html('');
                                    $('#qofbasket').html('0');
                                    $.when($.ajax({
                                        url:'../model/checkout.php',
                                        type:'POST',
                                        data:{'total' : max},
                                            
                                        })).then(
                                        function(data)
                                        { 
                                           
                                        }
                                    )
                                }
                                else
                                {
                                $('#nopoints').css("display","block");
                                }
                            });
                                        
                        }
                    </script>
                    <!-- END SCRIPT FOR BASKET -->

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