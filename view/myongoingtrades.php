<?php 
include('../controller/userController.php');
require_once '../model/tradeModel.php';
if(!isset($_SESSION)) session_start();
$trades=tradeModel::getMyTrades($_SESSION["user"]["id"]);
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>My OnGoing Trades</title>
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
                    <li class="show"><a href="displaytrades.php" id="trade" >Trade</a>
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
        <section class="breadcrumb-area breadcrumb-bg s-breadcrumb-bg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-content text-center">
                            <h2>My Ongoing <span>Trades</span></h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item"><a href="displaytrades.php">Trade</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">OnGoingTrades</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- upcoming-games -->
        <section class="upcoming-games-area upcoming-games-bg pt-120 pb-80">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title title-style-three white-title text-center mb-70">
                            <h2 style="color: rgb(54, 169, 225);">Trades you posted</h2>
                            <p>These are the trades that you posted on the trade page you can click your trades posted
                                to view the offers you got</p> 
                        </div>
                         <?php 
                         $t=0;
                         $to=0;
                         foreach($trades AS $trade)
                         {
                            if($trade["type"]==1)
                            $t=1;
                            if($trade["type"]==0)
                            $to=1;

                         }
                                if ($t==0){
                                         echo "<h2 style='color:black;'>You haven't posted any trades yet</h2>";
                                }
                                ?>  
                    </div>
                </div>
                <div class="row">
                    <?php 
                    
                    for ($i = 0; $i < count($trades); $i++) {
                        if($trades[$i]["type"]==1 && $trades[$i]["status"]!="DONE")
                        {
                        echo "<div class='col-lg-4 col-md-6'>
                            <div class='upcoming-game-item mb-40'>
                                <div class='upcoming-game-head'>
                                    <div class='uc-game-head-title'>
                                        <span>POSTED: ".$trades[$i]["creation_date"]."</span> 
                                        <h4><a href='#'>" . $trades[$i]["name"] . "</a></h4>
                                    </div>
                                    <div class='uc-game-price'>
                                        <h5>" . $trades[$i]['offersNumber'] . "</h5>
                                    </div>
                                </div>
                                <p>" . $trades[$i]['category'] . "</p>";
                        if ($trades[$i]["status"] == "AWAITING APPROVAL") {
                            echo " <p style='color:yellow;'>Waiting for admin to accept your post</p>"; 
                        }
                        else{
                            if ($trades[$i]["status"] == "REJECTED") {
                                echo " <p style='color:red;'>Offer rejected</p>"; 
                                
                            }
                            else
                            echo " <p style='color:green;'>Active</p>";
                        }
                        echo "<div class='upcoming-game-thumb'>";
                        echo '<img src="data:image;base64,' . $trades[$i]["image"] . '" alt="image" style="width:330px; height:216px;">';
                        echo "<div class='upcoming-game-cart'>
                                        <a href='./viewtrade.php?trade=" . $trades[$i]["id"] . "' class='btn transparent-btn'>Inspect</a><br><br>
                                       <a href='./offers2.php?idTrade=" . $trades[$i]["id"] . "' class='btn transparent-btn'>view offers</a>
                                    </div>
                                </div>
                            </div>
                        </div>";

                    }
                }
                    ?>
                </div>
            </div>
        </section>
        <!-- upcoming-games-end -->

        <!-- latest-match-area -->
        <section class="latest-match-area latest-match-bg pt-115 pb-90">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title title-style-three white-title text-center mb-70">
                            <h2><span>trades you offered</span></h2>
                            <p>These are the offers that you made on displayed items you can check them untill the other
                                end accepts your item</p>
                        </div>
                        <?php
                        if ($to == 0) {
                            echo " <h2>You have made no offers yet</h2>";
                        } ?>
                    </div>

                </div>
                <div class="row">
                    <?php
                    
                        for ($i = 0; $i < count($trades); $i++) {

                            if($trades[$i]["type"]==0 && $trades[$i]["status"]!="ACCEPTED"){
                                echo "<div class='col-lg-6'>
                        <div class='latest-match-box mb-30'>
                            <div class='latest-match-thumb'>";
                            echo '<img src="data:image;base64,' . $trades[$i]["image"] . '" alt="image" style="width:131px; height:161px;">';
                                echo "</div>
                            <div class='tournament-schedule-content' style='width:100%'>
                                <h3><a href='cards.php?offer=" . $trades[$i]["id"] . "'>Name <span>" . $trades[$i]["name"] . "</span></a></h3>
                                <p>" . $trades[$i]["description"] . "</p>
                                 <div class='tournament-schedule-meta'>
                                        <h5>Status <span>" ;switch( $trades[$i]["status"]){
                                            case "AWAITING APPROVAL":
                                                echo "On hold";
                                                break;
                                                case "APPROVED":
                                                    echo "Ongoing";
                                                    break;
                                    case "REJECTED":
                                        echo "rejected";
                                        
                                        } echo "</span></h5>
                                        <a href='cards.php?offer=".$trades[$i]["id"]."'>view</a>
                                    </div>
                                
                            </div>
                           
                        </div>
                    </div>";

                                    }  
                        }
                    
                    ?>
                </div>
            </div>
        </section>
        <!-- latest-match-area-end -->

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
    <?php
    require '../controller/merch.php';
	error_reporting(E_ERROR | E_PARSE);
       $tab=new merch;
       $tab0 = $tab->affiche();
       $id=$_SESSION["user"]["id"];
       $paniershow=new panier;
       $product=$paniershow->showbasket($id);
       $length=count($product);
       $nopoints=$_GET["nopoints"];
     ?>       
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
</body>


</html>