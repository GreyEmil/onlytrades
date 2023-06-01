<?php include('../controller/userController.php') ?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>OnlyTrades</title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png" />
  <!-- Place favicon.ico in the root directory -->

  <!-- CSS here -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/animate.min.css" />
  <link rel="stylesheet" href="css/magnific-popup.css" />
  <link rel="stylesheet" href="css/fontawesome-all.min.css" />
  <link rel="stylesheet" href="css/odometer.css" />
  <link rel="stylesheet" href="css/aos.css" />
  <link rel="stylesheet" href="css/owl.carousel.min.css" />
  <link rel="stylesheet" href="css/meanmenu.css" />
  <link rel="stylesheet" href="css/slick.css" />
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
  <link rel="stylesheet" href="css/default.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/responsive.css" />
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
                    <li class="show"><a href="index.php">Home</a></li>
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
    <!-- slider-area -->
    <section class="slider-area">
      <div class="slider-active">
        <div class="single-slider slider-bg slider-style-two">
          <div class="container-fluid container-full-padding">
            <div class="row">
              <div class="col-xl-6 col-lg-7 col-md-11">
                <div class="slider-content">
                  <h6 data-animation="fadeInUp" data-delay=".4s">
                    OnlyTrades
                  </h6>
                  <h2 data-animation="fadeInUp" data-delay=".4s">
                    Trade your <span>Gaming</span> items Today
                  </h2>
                  <p data-animation="fadeInUp" data-delay=".6s">
                    Trade in your ever-wanted game item for one you want to
                    get rid of with a community full of gamers willing to
                    trade in a fun experience.
                  </p>

                </div>
              </div>
            </div>
          </div>
          <div class="slider-img" data-animation="slideInRightS" data-delay=".6s">
            <img src="img/slider/slider_img01.png" alt="" />
          </div>
          <div class="slider-img slider-img2" data-animation="slideInLeftS" data-delay=".6s">
            <img src="img/slider/slider_img02.png" alt="" />
          </div>
          <div class="slider-circle-shape">
            <img src="img/slider/slider_circle.png" alt="" class="rotateme" />
          </div>
        </div>
      </div>
    </section>
    <!-- slider-area-end -->

    <!-- new-games-area -->
    <section class="released-games-area gray-bg pt-115 pb-0">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-6 col-lg-8">
            <div class="section-title title-style-three text-center mb-20">
              <h2>Top Rated <span>Traders</span></h2>
              <p>
                Top 5 rated traders: These are the top rated traders who have
                successfully traded goods on our website
              </p>
            </div>
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col-xl-8 col-lg-12">
            <div class="released-game-active">
              <div class="released-game-carousel">
                <div class="released-game-item">
                  <div class="released-game-item-bg"></div>
                  <div class="released-game-img">
                    <img src="img/images/released_game_img01.jpg" alt="" />
                  </div>
                  <div class="released-game-content">
                    <div class="released-game-rating">
                      <h5>Rating :</h5>
                      <div class="released-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                      </div>
                    </div>
                    <h4>Call <span>of Duty</span></h4>
                    <div class="released-game-list mb-15">
                      <ul>
                        <li><span>User :</span>Bakou Rayeb</li>
                        <li><span>Category :</span>Virtual Game</li>
                        <li><span>Model :</span>Compete 100 players</li>
                        <li><span>Controller :</span>PS4</li>
                      </ul>
                    </div>
                    <p>
                      Compete with 100 players on a remote thats island for
                      winner takes showdown known issue
                    </p>
                    <a href="#" class="btn btn-style-two">trade now</a>
                  </div>
                </div>
              </div>
              <div class="released-game-carousel">
                <div class="released-game-item">
                  <div class="released-game-item-bg"></div>
                  <div class="released-game-img">
                    <img src="img/images/released_game_img02.jpg" alt="" />
                  </div>
                  <div class="released-game-content">
                    <div class="released-game-rating">
                      <h5>Rating :</h5>
                      <div class="released-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                      </div>
                    </div>
                    <h4>Battle <span>Grounds</span></h4>
                    <div class="released-game-list mb-15">
                      <ul>
                        <li><span>Category :</span>Virtual Game</li>
                        <li><span>Model :</span>Compete 100 players</li>
                        <li>
                          <span>Controller :</span>Playstation 5 , Xbox , PS4
                        </li>
                      </ul>
                    </div>
                    <p>
                      Compete with 100 players on a remote thats island for
                      winner takes showdown known issue
                    </p>
                    <a href="#" class="btn btn-style-two">trade now</a>
                  </div>
                </div>
              </div>
              <div class="released-game-carousel">
                <div class="released-game-item">
                  <div class="released-game-item-bg"></div>
                  <div class="released-game-img">
                    <img src="img/images/released_game_img02.jpg" alt="" />
                  </div>
                  <div class="released-game-content">
                    <div class="released-game-rating">
                      <h5>Rating :</h5>
                      <div class="released-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                      </div>
                    </div>
                    <h4>Battle <span>Grounds</span></h4>
                    <div class="released-game-list mb-15">
                      <ul>
                        <li><span>Category :</span>Virtual Game</li>
                        <li><span>Model :</span>Compete 100 players</li>
                        <li>
                          <span>Platform :</span>Playstation 5 , Xbox , PS4
                        </li>
                      </ul>
                    </div>
                    <p>
                      Compete with 100 players on a remote thats island for
                      winner takes showdown known issue
                    </p>
                    <a href="#" class="btn btn-style-two">trade now</a>
                  </div>
                </div>
              </div>
              <div class="released-game-carousel">
                <div class="released-game-item">
                  <div class="released-game-item-bg"></div>
                  <div class="released-game-img">
                    <img src="img/images/released_game_img02.jpg" alt="" />
                  </div>
                  <div class="released-game-content">
                    <div class="released-game-rating">
                      <h5>Rating :</h5>
                      <div class="released-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                      </div>
                    </div>
                    <h4>Battle <span>Grounds</span></h4>
                    <div class="released-game-list mb-15">
                      <ul>
                        <li><span>Category :</span>Virtual Game</li>
                        <li><span>Model :</span>Compete 100 players</li>
                        <li>
                          <span>Controller :</span>Playstation 5 , Xbox , PS4
                        </li>
                      </ul>
                    </div>
                    <p>
                      Compete with 100 players on a remote thats island for
                      winner takes showdown known issue
                    </p>
                    <a href="#" class="btn btn-style-two">trade now</a>
                  </div>
                </div>
              </div>
              <div class="released-game-carousel">
                <div class="released-game-item">
                  <div class="released-game-item-bg"></div>
                  <div class="released-game-img">
                    <img src="img/images/released_game_img03.jpg" alt="" />
                  </div>
                  <div class="released-game-content">
                    <div class="released-game-rating">
                      <h5>Rating :</h5>
                      <div class="released-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                      </div>
                    </div>
                    <h4>Apex <span>Legends</span></h4>
                    <div class="released-game-list mb-15">
                      <ul>
                        <li><span>Category :</span>Virtual Game</li>
                        <li><span>Model :</span>Compete 100 players</li>
                        <li>
                          <span>Controller :</span>Playstation 5 , Xbox , PS4
                        </li>
                      </ul>
                    </div>
                    <p>
                      Compete with 100 players on a remote thats island for
                      winner takes showdown known issue
                    </p>
                    <a href="#" class="btn btn-style-two">trade now</a>
                  </div>
                </div>
              </div>
              <div class="released-game-carousel">
                <div class="released-game-item">
                  <div class="released-game-item-bg"></div>
                  <div class="released-game-img">
                    <img src="img/images/released_game_img03.jpg" alt="" />
                  </div>
                  <div class="released-game-content">
                    <div class="released-game-rating">
                      <h5>Rating :</h5>
                      <div class="released-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                      </div>
                    </div>
                    <h4>Monster <span>Hunter</span></h4>
                    <div class="released-game-list mb-15">
                      <ul>
                        <li><span>Category :</span>Virtual Game</li>
                        <li><span>Model :</span>Compete 100 players</li>
                        <li>
                          <span>Controller :</span>Playstation 5 , Xbox , PS4
                        </li>
                      </ul>
                    </div>
                    <p>
                      Compete with 100 players on a remote thats island for
                      winner takes showdown known issue
                    </p>
                    <a href="#" class="btn btn-style-two">trade now</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-12">
            <div class="released-game-nav">
              <div class="released-game-nav-item">
                <img src="img/images/release_game_nav01.jpg" alt="" />
              </div>
              <div class="released-game-nav-item">
                <img src="img/images/release_game_nav02.jpg" alt="" />
              </div>
              <div class="released-game-nav-item">
                <img src="img/images/release_game_nav03.jpg" alt="" />
              </div>
              <div class="released-game-nav-item">
                <img src="img/images/release_game_nav02.jpg" alt="" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- new-games-area-end -->

    <!-- gamers-area-end -->

    <!-- featured-game-area -->
    <section class="featured-game-area position-relative pt-115 pb-90">
      <div class="featured-game-bg"></div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-6 col-lg-8">
            <div class="section-title title-style-three text-center mb-70">
              <h2>Hot <span>OFFERS</span></h2>
              <p>These are the hottest offers of the week</p>
            </div>
          </div>
        </div>
        <div class="row featured-active">
          <div class="col-lg-4 col-sm-6 grid-item">
            <div class="featured-game-item mb-30">
              <div class="featured-game-thumb">
                <img src="img/images/hot/ps4.png" height="450px" alt="" />
              </div>
              <div class="featured-game-content">
                <h4>
                  <a href="#">TRADE <span>NOW</span></a>
                </h4>
                <div class="featured-game-meta">
                  <i class="fas fa-bell"></i>
                  <span>Playstation 5 , Xbox</span>
                </div>
              </div>
              <div class="featured-game-content featured-game-overlay-content">
                <div class="featured-game-icon">
                  <img src="img/icon/featured_game_icon.png" alt="" />
                </div>
                <h4>
                  <a href="#">TRADE <span>NOW</span></a>
                </h4>
                <div class="featured-game-meta">
                  <i class="fas fa-bell"></i>
                  <span>Playstation 4</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-sm-6 grid-item">
            <div class="featured-game-item mb-30">
              <div class="featured-game-thumb">
                <img src="img/images/hot/wiiu.png" alt="" />
              </div>
              <div class="featured-game-content">
                <h4>
                  <a href="#">TRADE <span>NOW</span></a>
                </h4>
                <div class="featured-game-meta">
                  <i class="fas fa-bell"></i>
                  <span>Playstation 5 , Xbox</span>
                </div>
              </div>
              <div class="featured-game-content featured-game-overlay-content">
                <div class="featured-game-icon">
                  <img src="img/icon/featured_game_icon.png" alt="" />
                </div>
                <h4>
                  <a href="#">TRADE <span>NOW</span></a>
                </h4>
                <div class="featured-game-meta">
                  <i class="fas fa-bell"></i>
                  <span>Playstation 5 , Xbox</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-sm-6 grid-item">
            <div class="featured-game-item mb-30">
              <div class="featured-game-thumb">
                <img src="img/images/hot/mario.png" height="450px" alt="" />
              </div>
              <div class="featured-game-content">
                <h4>
                  <a href="#">TRADE <span>NOW</span></a>
                </h4>
                <div class="featured-game-meta">
                  <i class="fas fa-bell"></i>
                  <span>Playstation 5 , Xbox</span>
                </div>
              </div>
              <div class="featured-game-content featured-game-overlay-content">
                <div class="featured-game-icon">
                  <img src="img/icon/featured_game_icon.png" alt="" />
                </div>
                <h4>
                  <a href="#">TRADE <span>NOW</span></a>
                </h4>
                <div class="featured-game-meta">
                  <i class="fas fa-bell"></i>
                  <span>Playstation 5 , Xbox</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-sm-6 grid-item">
            <div class="featured-game-item mb-30">
              <div class="featured-game-thumb">
                <img src="img/images/hot/zelda.png" alt="" />
              </div>
              <div class="featured-game-content">
                <h4>
                  <a href="#">TRADE <span>NOW</span></a>
                </h4>
                <div class="featured-game-meta">
                  <i class="fas fa-bell"></i>
                  <span>Playstation 5 , Xbox</span>
                </div>
              </div>
              <div class="featured-game-content featured-game-overlay-content">
                <div class="featured-game-icon">
                  <img src="img/icon/featured_game_icon.png" alt="" />
                </div>
                <h4>
                  <a href="#">TRADE <span>NOW</span></a>
                </h4>
                <div class="featured-game-meta">
                  <i class="fas fa-bell"></i>
                  <span>Playstation 5 , Xbox</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-sm-6 grid-item">
            <div class="featured-game-item mb-30">
              <div class="featured-game-thumb">
                <img src="img/images/hot/xbox.png" alt="" />
              </div>
              <div class="featured-game-content">
                <h4>
                  <a href="#">TRADE <span>NOW</span></a>
                </h4>
                <div class="featured-game-meta">
                  <i class="fas fa-bell"></i>
                  <span>Playstation 5 , Xbox</span>
                </div>
              </div>
              <div class="featured-game-content featured-game-overlay-content">
                <div class="featured-game-icon">
                  <img src="img/icon/featured_game_icon.png" alt="" />
                </div>
                <h4>
                  <a href="#">TRADE <span>NOW</span></a>
                </h4>
                <div class="featured-game-meta">
                  <i class="fas fa-bell"></i>
                  <span>Playstation 5 , Xbox</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-sm-6 grid-item">
            <div class="featured-game-item mb-30">
              <div class="featured-game-thumb">
                <img src="img/images/hot/games.png" height="450px" alt="" />
              </div>
              <div class="featured-game-content">
                <h4>
                  <a href="#">Trade <span>NOW</span></a>
                </h4>
                <div class="featured-game-meta">
                  <i class="fas fa-bell"></i>
                  <span>Playstation 5 , Xbox</span>
                </div>
              </div>
              <div class="featured-game-content featured-game-overlay-content">
                <div class="featured-game-icon">
                  <img src="img/icon/featured_game_icon.png" alt="" />
                </div>
                <h4>
                  <a href="#">TRADE <span>NOW</span></a>
                </h4>
                <div class="featured-game-meta">
                  <i class="fas fa-bell"></i>
                  <span>Playstation 5 , Xbox</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- featured-game-area-end -->

    <!-- cta-area -->
    <!-- <section class="cta-area cta-bg">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-xl-5 col-lg-6">
                        <div class="cta-img">
                            <img src="img/images/cta_img.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="cta-content">
                            <div class="cta-icon mb-15">
                                <img src="img/icon/cta_icon.png" alt="">
                            </div>
                            <div class="section-title title-style-three white-title mb-50">
                                <h2>WORLDS MEET <span>Real</span></h2>
                                <p>Compete with 100 player on a remote island for winner
                                    known issue where certain strategic</p>
                            </div>
                            <div class="cta-btn">
                                <a href="#" class="btn btn-style-two">VIEW SCHEDULE</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
    <!-- cta-area-end -->

    <!-- shop-area -->
    <section class="shop-area black-bg pt-115 pb-90">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-6 col-lg-8">
            <div class="section-title title-style-three white-title text-center mb-40">
              <h2>PointsShop <span>Corner</span></h2>
              <p>Buy with your OTP</p>
            </div>
          </div>
        </div>
        <div class="row product-active">
          <div class="col-xl-3">
            <div class="shop-item">
              <div class="product-thumb">
                <a href="#"><img src="img/product/s_product_img01.jpg" alt="" /></a>
              </div>
              <div class="product-content">
                <div class="product-tag"><a href="#">t-shirt</a></div>
                <h4><a href="#">Women Black T-shirt</a></h4>
                <div class="product-meta">
                  <div class="product-price">
                    <h5>2000 OTP</h5>
                  </div>
                  <div class="product-cart-action">
                    <a href="#"><i class="fas fa-shopping-basket"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3">
            <div class="shop-item">
              <div class="product-thumb">
                <a href="#"><img src="img/product/s_product_img02.jpg" alt="" /></a>
              </div>
              <div class="product-content">
                <div class="product-tag"><a href="#">x-box</a></div>
                <h4><a href="#">Gears 5 Xbox Controller</a></h4>
                <div class="product-meta">
                  <div class="product-price">
                    <h5>Dt29.00</h5>
                  </div>
                  <div class="product-cart-action">
                    <a href="#"><i class="fas fa-shopping-basket"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3">
            <div class="shop-item">
              <div class="product-thumb">
                <a href="#"><img src="img/product/s_product_img03.jpg" alt="" /></a>
              </div>
              <div class="product-content">
                <div class="product-tag"><a href="#">graphics</a></div>
                <h4><a href="#">GeForce RTX 2070</a></h4>
                <div class="product-meta">
                  <div class="product-price">
                    <h5>Dt29.00</h5>
                  </div>
                  <div class="product-cart-action">
                    <a href="#"><i class="fas fa-shopping-basket"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3">
            <div class="shop-item">
              <div class="product-thumb">
                <a href="#"><img src="img/product/s_product_img04.jpg" alt="" /></a>
              </div>
              <div class="product-content">
                <div class="product-tag"><a href="#">VR-Box</a></div>
                <h4><a href="#">Virtual Reality Smiled</a></h4>
                <div class="product-meta">
                  <div class="product-price">
                    <h5>Dt29.00</h5>
                  </div>
                  <div class="product-cart-action">
                    <a href="#"><i class="fas fa-shopping-basket"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3">
            <div class="shop-item">
              <div class="product-thumb">
                <a href="#"><img src="img/product/s_product_img04.jpg" alt="" /></a>
              </div>
              <div class="product-content">
                <div class="product-tag"><a href="#">VR-Box</a></div>
                <h4><a href="#">Virtual Reality Smiled</a></h4>
                <div class="product-meta">
                  <div class="product-price">
                    <h5>Dt29.00</h5>
                  </div>
                  <div class="product-cart-action">
                    <a href="#"><i class="fas fa-shopping-basket"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- shop-area-end -->

    <!-- blog-area -->
    <!-- <section class="blog-area pt-115 pb-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title title-style-three text-center mb-70">
                            <h2>Latest News <span>Articles</span></h2>
                            <p>Compete with 100 players on a remote island for winner takes showdown
                                known issue where certain skin strategic</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-post blog-style-two mb-50">
                            <div class="blog-thumb mb-30">
                                <a href="#"><img src="img/blog/s_blog_thumb01.jpg" alt=""></a>
                            </div>
                            <div class="blog-post-content">
                                <h4><a href="#">Shooter action video game</a></h4>
                                <div class="blog-meta">
                                    <ul>
                                        <li><i class="far fa-clock"></i>July 4, 2020</li>
                                        <li><i class="fas fa-tag"></i><a href="#">Shooter</a></li>
                                    </ul>
                                </div>
                                <p>Compete with 100 players on a remote island for winner takes showdown known for issue
                                    where
                                    certain skin strategic [...]</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-post blog-style-two mb-50">
                            <div class="blog-thumb mb-30">
                                <a href="#"><img src="img/blog/s_blog_thumb02.jpg" alt=""></a>
                            </div>
                            <div class="blog-post-content">
                                <h4><a href="#">multiplayer environments</a></h4>
                                <div class="blog-meta">
                                    <ul>
                                        <li><i class="far fa-clock"></i>July 4, 2020</li>
                                        <li><i class="fas fa-tag"></i><a href="#">Shooter</a></li>
                                    </ul>
                                </div>
                                <p>Compete with 100 players on a remote island for winner takes showdown known for issue
                                    where
                                    certain skin strategic [...]</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-post blog-style-two mb-50">
                            <div class="blog-thumb mb-30">
                                <a href="#"><img src="img/blog/s_blog_thumb03.jpg" alt=""></a>
                            </div>
                            <div class="blog-post-content">
                                <h4><a href="#">Bullet Force Multiplayer</a></h4>
                                <div class="blog-meta">
                                    <ul>
                                        <li><i class="far fa-clock"></i>July 4, 2020</li>
                                        <li><i class="fas fa-tag"></i><a href="#">Shooter</a></li>
                                    </ul>
                                </div>
                                <p>Compete with 100 players on a remote island for winner takes showdown known for issue
                                    where
                                    certain skin strategic [...]</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
    <!-- blog-area-end -->
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
$('#report').click(checkIfLoggedIn);

  </script>
</body>

<!-- Mirrored from themebeyond.com/html/geco/Geco/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 31 Oct 2022 13:00:20 GMT -->

</html>