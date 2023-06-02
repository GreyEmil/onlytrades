<?php if(!isset($_SESSION)) session_start() ;
require_once "../controller/forum.php";
$_SESSION["tempThread"]=forum::fetchThread($_GET["id"]);
if(isset($_SESSION["user"]["id"]))forum::view($_SESSION["tempThread"]["info"]["id"],$_SESSION["user"]["id"]);

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
        <link rel="stylesheet" href="css/forum.css">
        <link rel="stylesheet" href="css/report.css">
        <script src="https://kit.fontawesome.com/9ee4261700.js" crossorigin="anonymous"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
<?php include('../controller/userController.php'); ?>

        
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
                                  <br>
                                  <a href="javascript:void(0)" style="margin-right: 20px;"><?php echo $user['points'] . "&nbsp;"?>
                                  <img src="img/icon/coin.png" style='weight:20px;height:20px;'></a>
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
                                <a href="dashboard-view-users.php">Admin Dashboard</a>
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
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="community-wrap">
                                <div class="table-responsive-xl">
                                <div class="title"><?php echo $_SESSION["tempThread"]["info"]["subject"]; ?></div>
                                <div class="author"><i class="fa-regular fa-user"></i> <?php echo $_SESSION["tempThread"]["user"]["username"]; ?>   <i class="fa-regular fa-clock"></i> <?php echo $_SESSION["tempThread"]["info"]["publish_date"]; ?></div>
                                <div class="path"><a href="index.php" class="home"><i class="fa-sharp fa-solid fa-house"></i></a> ><a href="categories.php"> Forum </a> > <a href="threads.php?category=<?php echo $_SESSION["tempThread"]["info"]["category"]; ?>"> <?php echo $_SESSION["tempThread"]["info"]["category"]; ?> </a></div>
                                    <table class="table mt-0" style="background-color:none">
                                        <tbody>
                                            <!-- CONTENT -->
                                            <tr>
                                                <th scope="row" style="padding:0;">
                                                    <div class="container">
                                                        <div class="row">
                                                             <div class="col-2 writer-info">
                                                                <img class="writer-image" src="data:image/jpeg;base64,<?php echo $_SESSION["tempThread"]["user"]["photo"]; ?>" alt="">
                                                                <div><?php echo $_SESSION["tempThread"]["user"]["first_name"]; ?></div>
                                                                <div>AKA <span class="username"><?php echo $_SESSION["tempThread"]["user"]["username"]; ?></span></div>
                                                                <div class="container">
                                                                    <div class="row">
                                                                        <div class="col-1"><i class="fa-solid fa-user"></i></div>
                                                                        <div class="col"><?php echo DateTime::createFromFormat("Y-m-d",$_SESSION["tempThread"]["user"]['creation_date'])->format('M j , Y'); ?></div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-1"><i class="fa-solid fa-comments"></i></div>
                                                                        <div class="col"><?php echo $_SESSION["tempThread"]["user"]["messages"]; ?></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col message">
                                                                <div><?php echo $_SESSION["tempThread"]["info"]["content"]; ?></div>
                                                                <div class="like">
                                                                    <i id="like" class="fa-regular fa-thumbs-up <?php if($_SESSION["tempThread"]["liked"]!="liked")echo "like-btn"; else echo "liked";?>"></i><div id="likes"class="like-nbr"><?php echo $_SESSION["tempThread"]["likes"]; ?></div><i class="fa-solid fa-exclamation" style="color:red;font-size:20px;position:relative;left:50%"  id="<?php echo $_SESSION["tempThread"]["user"]["username"]?>" onclick="reportPrompt(this)"></i>
                                                                    
                                                                </div>
                                                                <?php if(isset($_SESSION["user"]["id"]) && $_SESSION["tempThread"]["user"]["id"]==$_SESSION["user"]["id"] ) {?><a href="editEntry.php?idthread=<?php echo $_SESSION["tempThread"]["info"]["id"];  ?>&&type=1" style="position:absolute; right:5px;bottom:10px; cursor:pointer">Edit</a> <?php } ?>
                                                            </div>
                                                        </div>
                                                        <?php foreach($_SESSION["tempThread"]["comments"] AS $comment)
                                                        {
                                                            echo '<div class="row">
                                                            <div class="col-2 writer-info">
                                                               <img class="writer-image" src="data:image/jpeg;base64,'.$comment["user"]["photo"].'" alt=""> 
                                                               <div>'.$comment["user"]["first_name"].'</div>
                                                               <div>AKA <span class="username">'.$comment["user"]["username"].'</span></div>
                                                               <div class="container">
                                                                   <div class="row">
                                                                       <div class="col-1"><i class="fa-solid fa-user"></i></div>
                                                                       <div class="col">'.DateTime::createFromFormat("Y-m-d",$comment['user']['creation_date'])->format('M j , Y').'</div>
                                                                   </div>
                                                                   <div class="row">
                                                                       <div class="col-1"><i class="fa-solid fa-comments"></i></div>
                                                                       <div class="col">to be filled</div>
                                                                   </div>
                                                               </div>
                                                           </div>
                                                           <div class="col message" >
                                                                <div class="date">'.$comment["last_modification"].'</div>
                                                               <div class="content">'.$comment["content"].'</div>
                                                               <div class="like" id="'.$comment["user"]["id"].'" onclick="reportPromptC(this,'.$comment["id"].')"><i class="fa-solid fa-exclamation" style="color:red;font-size:20px;position:relative;left:50%"></i></div>
                                                               ';
                                                               if(isset($_SESSION["user"]["id"]) && $comment["id_writer"]==$_SESSION["user"]["id"] ) {echo '<a href="editEntry.php?idcomment='.$comment['id'].'&&type=0&&idthread='.$_SESSION["tempThread"]["info"]["id"].'" style="position:absolute; right:5px;bottom:10px; cursor:pointer">Edit</a> <a href="" id="deleteC'.$comment["id"].'" onclick="deleteC(this)" style="position:absolute; right:50px;bottom:10px; cursor:pointer">Delete</a> ';} 
                                                           echo '</div>

                                                           
                                                       </div>';
                                                        }
                                                        ;?>
                                                        
                                                    </div>
                                                </th>
                                            </tr>
                                            
                                        </tbody>       
                                    </table>
                                    <?php if(isset($_SESSION["user"]) ) { ?>
                                    <div class="comments">
                                        <div class="col-lg-10">
                                        <form action="../controller/addNewThread.php?idThread=<?php echo $_SESSION["tempThread"]["info"]["id"] ?>&&idUser=<?php if(isset($_SESSION["user"]["id"]))echo $_SESSION["user"]["id"]; ?> " method="POST">
                                            <label for="content" class="newthread-label">Add commment: </label>
                                            <textarea name="comment" id="comment" cols="30" rows="10"  class="newthread-input"></textarea>
                                            <button type="submit" id="submitb" class="submit" style="display:block;margin-top:20px;margin-left:10px">Comment</button>
                                        </form>
                                        </div>
                                    </div>
                                    <?php }else echo '<a href="signin.php">Sign In to comment</a>' ?>
                                                    
                                </div>
                                
                                
                            </div>
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
        </div>
      </div>
    </div>
  </footer>
  <!-- footer-area-end -->
        <div class="report" id="report">
    <form id="formF" method="post" action="../controller/report.php" enctype="multipart/form-data">
        <label for="username">Username</label>
        <input class="inputt" type="text" id ="username" name="username"  placeholder="Item Name" required="required" />
        
        <p id="name_error" class="error" ></p>
        <textarea class="inputt"  name="message" id="message"  placeholder="Item Description" required ></textarea>
        <p id="description_error" class="error"></p>
        <input class="inputt" type="text" id ="id_thread" style="display:none" name="id_thread"  placeholder="Item Name" value="<?php echo $_SESSION["tempThread"]["info"]["id"]; ?>"  />
        <input class="inputt" type="text" id ="id_reporter" style="display:none" name="id_reporter"  placeholder="Item Name" value="<?php echo $_SESSION["user"]["id"]; ?>"  />
        <input class="inputt" type="text" id ="type" style="display:none" name="type"  placeholder="Item Name" value=""  />
        <input class="inputt" type="text" id ="id_comment" style="display:none" name="id_comment"  placeholder="Item Name" value=""  />
        <button type="submit" name="form_submit" id="form_submit" class="btnn btnn-primary btnn-block btnn-large">Report</button>
    </form>





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
        <script src="js/vendor/jquery-3.4.1.min.js"></script>
        <script>
            $("#like").click(function()
            {
                $.when($.ajax({
                    url:'../controller/Like.php',
                    type:'post',
                    data:{'idUser':<?php if(isset($_SESSION["user"]["id"]))echo $_SESSION["user"]["id"];else echo 0; ?>,
                    'idThread': <?php echo $_SESSION["tempThread"]["info"]["id"]; ?>},
                    
                })).then(function(data){
                    if(data.trim()=='liked') $('#like').removeClass( "like-btn" ).addClass( "liked" );
                    if(data.trim()=='unliked') $('#like').removeClass( "liked" ).addClass( "like-btn" );
                    getLikes();
                });
            });
            function getLikes()
            {
                $.when($.ajax({
                    url:'../controller/Like.php',
                    type:'post',
                    data:{'idThread': <?php echo $_SESSION["tempThread"]["info"]["id"]; ?>},
                    
                })).then(function(data){$("#likes").text(data.trim())});
            }
           
            
                $("#submitb").click(function(e){
                    if($('#comment').val()=='')
                    {
                        e.preventDefault();
                        alert('you cant add an empty comment');
                    }
                    
                    if('<?php if(isset($_SESSION["user"]["id"])) echo 'true'; else echo 'false'; ?>'=='false') 
                    {
                        e.preventDefault();
                        
                    }
                })

        </script>
        <script>
            var isPrompted=0;
            var btnId;
            function reportPrompt(rep){
            
                $('footer').css("filter","blur(20px)");
                $('header').css("filter","blur(20px)");
                $('main').css("filter","blur(20px)");
                $('#report').css("display","block");
                $('#username').val(rep.id)
                $('#message').val(rep.parentElement.previousElementSibling.innerText)
                $('#type').val(1);
                $('#username').prop('disabled',true);
                $('#message').prop('disabled',true);
                btnId=rep.id;
                
               
        }
        function reportPromptC(rep,id){
            
            $('footer').css("filter","blur(20px)");
            $('header').css("filter","blur(20px)");
            $('main').css("filter","blur(20px)");
            $('#report').css("display","block");
            $('#username').val(rep.parentElement.previousElementSibling.children[2].innerText.substring(rep.parentElement.previousElementSibling.children[2].innerText.indexOf("AKA")+4))
            $('#message').val(rep.previousElementSibling.innerText)
            $('#type').val(0);
            $('#id_comment').val(id);
            $('#username').prop('disabled',true);
            $('#message').prop('disabled',true);
            btnId=rep.id;
            
           
    }
        $('html').click(function(e){
            if($(e.target).closest("#report").length === 0  && e.target.id!=btnId ){
                $('footer').css("filter","none");
                $('header').css("filter","none");
                $('main').css("filter","none");
                $('#report').css("display","none");
                  
            }
        });
        $('#form_submit').click(function(){
            $('#username').prop('disabled',false);
            $('#message').prop('disabled',false);
        })

        function deleteC(element)
        {
           
            $.ajax({
                url:'../controller/addnewthread.php',
                type:'post',
                data:{'request':'deletecomment',
                'idcomment':element.id.substring(7)}
            })
        }
        </script>
       
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

<!-- Mirrored from themebeyond.com/html/geco/Geco/community.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 31 Oct 2022 12:58:13 GMT -->
</html>

