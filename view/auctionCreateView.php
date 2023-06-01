<?php include('../controller/userController.php'); ?>
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
        <section class="breadcrumb-area breadcrumb-bg3">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-content text-center">
                            <h2>Auction <span>Corner</span></h2>
                            <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Auctions</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="loginn">
                <h1>Add Auction</h1>
                    <form id="formF" method="post" action="../controller/auctionAdd.php" enctype="multipart/form-data">
                        <input class="inputt inputt-normal" type="text" id ="name" name="name" style="margin-bottom:40px;" placeholder="Item Name" required="required" />
                        <p id="name_error" style="color:rgb(250,50,50); font-weight:bold ;font-size:18px;margin-top:-38px;position:absolute"></p>
                        <textarea class="inputt"  name="description" id="description" style="margin-bottom:40px" placeholder="Item Description" required ></textarea>
                        <p id="description_error" style="color:rgb(250,50,50); font-weight:bold ;font-size:18px;margin-top:-38px;position:absolute"></p>
                        <input class="inputt" type="datetime-local" id="date" name="add_date" style="margin-bottom:40px"  required="required" />
                        <p id="date_error" style="color:rgb(250,50,50); font-weight:bold ;font-size:18px;margin-top:-38px;position:absolute"></p>
                        <input class="custom-file-inputt"  type="file" name="img_file[]" id="img_file" style="margin-bottom:40px"  multiple />
                        <p id="image_number_max" style="color:rgb(250,50,50); font-weight:bold ;font-size:18px;margin-top:-38px;position:absolute"></p>
                        <button type="submit" name="form_submit" id="form_submit" class="btnn btnn-primary btnn-block btnn-large">Organize Auction</button>
                        
                    </form>
                    
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
    <script src="js/notification.js"></script>
    <script>
        const fileNum=document.getElementById('img_file');
        fileNum.addEventListener('change',(e)=>{
            
            var files = fileNum.files;

            // Check files count
            
            if (files.length > 5) {
            
                fileNum.value="";
            document.getElementById('image_number_max').innerHTML="Only 5 Images Are Allowed!";
            return;
            }
            else {
                document.getElementById('image_number_max').innerHTML="";}
        });
        const name=document.getElementById('name');
        const description=document.getElementById('description');
        const date=document.getElementById('date');
        var verifyBlurN=function(e)
        {
            var nameC=document.getElementById("name").value;
            
            if(!/^[a-zA-Z0-9()]+$/.test(nameC)|| nameC.length<3 || nameC.length>15)
            {
                if (nameC.length<3) document.getElementById("name_error").innerHTML="Name is Too Short!";
                
                else
                {   
                    if(nameC.length>15) document.getElementById("name_error").innerHTML="Name is Too Long!";
                    else document.getElementById("name_error").innerHTML="Name Should Contain Only Letters And Numbers!";
                }
                name.style.boxShadow = "inset 0px 0px 15px  rgb(250,50,50)";
            }else  
            {
                
                document.getElementById("name_error").innerHTML="";
                name.style.boxShadow="inset 0 -5px 45px rgba(100,100,100,0.2), 0 1px 1px rgba(255,255,255,0.2)";
            }
        }

        var verifyBlurD=function(e)
        {
            var descriptionC=document.getElementById("description").value;
            
            if(descriptionC.length<30)
            {   
                description.style.boxShadow = "inset 0px 0px 15px  rgb(250,50,50)";
                document.getElementById("description_error").innerHTML="Description Is Too Short!";
            }else  
            {
                document.getElementById("description_error").innerHTML="";
                description.style.boxShadow="inset 0 -5px 45px rgba(100,100,100,0.2), 0 1px 1px rgba(255,255,255,0.2)";
            }
        }
        
        var verifyBlurT=function(e)
        {
            var dateC=new Date(document.getElementById("date").value);
            
            if((dateC.getTime()/1000)-(new Date().getTime()/1000)<86400 && (dateC.getTime()/1000)-(new Date().getTime()/1000)>=0)
            {
                document.getElementById("date_error").innerHTML="Auction Must Be organized at least 24Hours in Advance!";
                date.style.boxShadow = "inset 0px 0px 15px  rgb(250,50,50)";
            } else
            {
                    if((dateC.getTime()/1000)-(new Date().getTime()/1000)<0)
                {
                    document.getElementById("date_error").innerHTML="Until We Invent A Time Machine You Can't Organize An Auction In The Past!";
                    date.style.boxShadow = "inset 0px 0px 15px  rgb(250,50,50)";
                } else
                {
                    document.getElementById("date_error").innerHTML="";
                    date.style.boxShadow="inset 0 -5px 45px rgba(100,100,100,0.2), 0 1px 1px rgba(255,255,255,0.2)";
                }
            }
        }

        var verifySubmit=function(e)
        {
            var nameC=document.getElementById("name").value;
            var descriptionC=document.getElementById("description").value;
            var dateC=new Date(document.getElementById("date").value);
           
            if(!/^[a-zA-Z0-9()]+$/.test(nameC)|| nameC.length<3 || nameC.length>15 || descriptionC.length<30 || (dateC.getTime()/1000)-(new Date().getTime()/1000)<86400 || fileNum.files.length==0)
            {
                e.preventDefault();
                if(!/^[a-zA-Z0-9()]+$/.test(nameC)|| nameC.length<3 || nameC.length>15)
            {
                if (nameC.length<3) document.getElementById("name_error").innerHTML="Name is Too Short!";
                
                else
                {   
                    if(nameC.length>15) document.getElementById("name_error").innerHTML="Name is Too Long!";
                    else document.getElementById("name_error").innerHTML="Name Should Contain Only Letters And Numbers!";
                }
                name.style.boxShadow = "inset 0px 0px 15px  rgb(250,50,50)";
                }else  
                {
                    
                    document.getElementById("name_error").innerHTML="";
                    name.style.boxShadow="inset 0 -5px 45px rgba(100,100,100,0.2), 0 1px 1px rgba(255,255,255,0.2)";
                }
                
                if(descriptionC.length<30)
                {
                    description.style.boxShadow = "inset 0px 0px 15px  rgb(250,50,50)";
                    document.getElementById("description_error").innerHTML="Description Is Too Short!";
                }else  
                {
                    document.getElementById("description_error").innerHTML="";
                    description.style.boxShadow="inset 0 -5px 45px rgba(100,100,100,0.2), 0 1px 1px rgba(255,255,255,0.2)";
                }
                if((dateC.getTime()/1000)-(new Date().getTime()/1000)<86400 && (dateC.getTime()/1000)-(new Date().getTime()/1000)>=0)
                {
                    document.getElementById("date_error").innerHTML="Auction Must Be organized at least 24Hours in Advance!";
                    date.style.boxShadow = "inset 0px 0px 15px  rgb(250,50,50)";
                } else
                {
                    if((dateC.getTime()/1000)-(new Date().getTime()/1000)<0)
                    {
                        document.getElementById("date_error").innerHTML="Until We Invent A Time Machine You Can't Organize An Auction In The Past!";
                        date.style.boxShadow = "inset 0px 0px 15px  rgb(250,50,50)";
                    } else
                    {
                        document.getElementById("date_error").innerHTML="";
                        date.style.boxShadow="inset 0 -5px 45px rgba(100,100,100,0.2), 0 1px 1px rgba(255,255,255,0.2)";
                    }
                }
                if(fileNum.files.length==0)
                {
                    document.getElementById('image_number_max').innerHTML="You Need At least One Image";
                }
                
            } else {
                
                document.getElementById("formF").submit();
                
            }
        }
      
        
        
        document.getElementById("formF").addEventListener('submit',verifySubmit);
        description.addEventListener('blur',verifyBlurD);
        name.addEventListener('blur',verifyBlurN);
        date.addEventListener('blur',verifyBlurT);
        
        
        
        
    </script>
</body>

</html>