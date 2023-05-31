<?php if(!isset($_SESSION)) session_start() ;
require_once "../controller/forum.php";



?>
<!doctype html>
<html class="no-js" lang="">
    
<!-- Mirrored from themebeyond.com/html/geco/Geco/community.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 31 Oct 2022 12:57:42 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Geco - eSports Gaming HTML5 Template</title>
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

<?php include('../controller/userController.php') ?>
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
            <section class="breadcrumb-area breadcrumb-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="breadcrumb-content text-center">
                                <h2>Our <span>Community</span></h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">pages</a></li>
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
                            <div class="title"><?php if($_GET['type']==1) echo "EDIT YOUR THREAD";else  echo "EDIT YOUR COMMENT"?></div>
                                
                                    
                                    
                                    <div class="comments">
                                        <div class="col-lg-10">
                                        <form action="../controller/addNewThread.php?idThread=<?php echo $_SESSION["tempThread"]["info"]["id"] ?>&&idUser=<?php if(isset($_SESSION["user"]["id"]))echo $_SESSION["user"]["id"]; ?> " method="POST">
                                            <label for="content" class="newthread-label">Add commment: </label>
                                            <?php if($_GET['type']==1) echo '<label for="subject" class="newthread-label" style="color:black"> Subject</label>
                                                            <input id="subject" name="subject" type="textarea" class="newthread-input" >';?>
                                            <textarea name="content" id="content" cols="30" rows="10"  class="newthread-input"></textarea>
                                            <button type="submit" id="submitb" class="submit" style="display:block;margin-top:20px;margin-left:10px">Edit</button>
                                        </form>
                                        </div>
                                    </div>
                                                    
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
                                    <a href="index.html"><img src="img/logo/logo.png" alt=""></a>
                                </div>
                                <div class="footer-text">
                                    <p>Gemas marketplace the relase etras thats sheets continig passag.</p>
                                    <div class="footer-contact">
                                        <ul>
                                            <li><i class="fas fa-map-marker-alt"></i> <span>Address : </span>PO Box W75 Street
                                                lan West new queens</li>
                                            <li><i class="fas fa-headphones"></i> <span>Phone : </span>+24 1245 654 235</li>
                                            <li><i class="fas fa-envelope-open"></i><span>Email : </span><a href="https://themebeyond.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="9ef7f0f8f1defbe6fbf3eef2fbb0fdf1f3">[email&#160;protected]</a></li>
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
                <div class="footer-fire"><img src="img/images/footer_fire.png" alt=""></div>
                <div class="footer-fire footer-fire-right"><img src="img/images/footer_fire.png" alt=""></div>
            </div>
            <div class="copyright-wrap s-copyright-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="copyright-text">
                                <p>Copyright © 2020 <a href="#">Geco</a> All Rights Reserved.</p>
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
           
            
                $("#submit").click(function(e){
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
        </script>
        <script>
            var type=<?php echo $_GET["type"] ;?>;
            var idThread=<?php echo $_GET["idthread"] ;?>;
            var idComment=<?php if($_GET["type"]==0) echo $_GET["idcomment"] ; else echo -1;?>;
            $('#submitb').click(edit);

            function edit(e)
            {
                e.preventDefault();
                if(type==1)
                {
                    
                    $.when($.ajax({
                        url:'../controller/addnewthread.php',
                        type:'post',
                        data:{'idthread':idThread,
                        'content':$('#content').val(),
                        'subject':$('#subject').val(),
                        'request':'editthread',
                        },
                    })).then(function(){
                        window.location.href="displayThread.php?id="+idThread
                    });
                }
                else
                {
                    $.when($.ajax({
                        url:'../controller/addnewthread.php',
                        type:'post',
                        data:{'idcomment':idComment,
                        'content':$('#content').val(),
                        'request':'editcomment',
                        
                        },
                    })).then(function(){
                        window.location.href="displayThread.php?id="+idThread
                    });

                }
            }
        </script>
    </body>

<!-- Mirrored from themebeyond.com/html/geco/Geco/community.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 31 Oct 2022 12:58:13 GMT -->
</html>

