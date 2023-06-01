<?php include('../controller/userController.php');
 if(!isset($_SESSION)) session_start();?>
<!doctype html>
<html class="no-js" lang="">

<!-- Mirrored from themebeyond.com/html/geco/Geco/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 31 Oct 2022 13:05:44 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Report</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
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
                    <li><a href="categories.php">FORUM</a></li>
                    <li class="show">
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
                      <!-- breadcrumb-area -->
        <section class="breadcrumb-area breadcrumb-bg third-breadcrumb-bg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-content text-center">
                            <h2>Report <span>Corner</span></h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Report</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->
    <!-- header-area-end -->
    <div style="background-image:url('assets/img/bg/features_bg.jpg'); padding-top:10rem;padding-bottom:10rem;">
                <br>
                <br>
                <br>
                <script>
  function validateChar(a) {
    const pattern1 = /^[a-zA-Z]+$/
  
    return pattern1.test(a.key )
  }
  </script>
                
                <form id="formmm" action="../controller/reportHandeler.php" method="POST" style="width:50%;margin:auto">
                    <label for="type" class="newthread-label">Chose request type</label>
                    <select name="type" id="type"  class="select-rep">
                        <option value="General Questions">General Questions</option>
                        <option value="Trade Issue">Trade Issue</option>
                        <option id="report" value="Report user">Report user</option>                      
                    </select>
                    <label for="username" id="usernamel" class="newthread-label" style="display:none;">Please enter his username</label>
                    <input id="username" name="username" type="textarea" class="newthread-input" style="display:none">
                    <label for="subject" class="newthread-label" > Subject</label>
                    <input id="subject" name="subject" type="textarea" class="newthread-input">
                    <input id="id" name="id" type="textarea" style="display:none" value=<?php echo $_SESSION["user"]["id"]; ?>>
                    <label for="content" id="contentid" class="newthread-label" > Ticket Content</label>
                    <textarea name="content" id="content" cols="30" rows="10"  class="newthread-input" ></textarea>
                    
                    <p id="error"></p>
                    <button type="submit" id="submitb" class="submit" style="display:block;margin-top:30px;margin-bottom:100px;" >submit</button>
                </form>
    </div>


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
    <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/js/vendor/jquery-3.4.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/jquery.meanmenu.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/aos.js"></script>
    <script src="assets/js/jquery.lettering.js"></script>
    <script src="assets/js/jquery.textillate.js"></script>
    <script src="assets/js/jquery.odometer.min.js"></script>
    <script src="assets/js/jquery.appear.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.countdown.min.js"></script>
    <script src="assets/js/jquery.scrollUp.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
    <script>

            (function ( $ ) {
	var elActive = '';
    $.fn.selectCF = function( options ) {
 
        // option
        var settings = $.extend({
            color: "#FFF", // color
            backgroundColor: "rgb(54, 169, 225)", // background
			change: function( ){ }, // event change
        }, options );
 
        return this.each(function(){
			
			var selectParent = $(this);
				list = [],
				html = '';
				
			//parameter CSS
			var width = $(selectParent).width();
			
			$(selectParent).hide();
			if( $(selectParent).children('option').length == 0 ){ return; }
			$(selectParent).children('option').each(function(){
				if( $(this).is(':selected') ){ s = 1; title = $(this).text(); }else{ s = 0; }
				list.push({ 
					value: $(this).attr('value'),
					text: $(this).text(),
					selected: s,
				})
			})
			
			// style
			var style = " background: "+settings.backgroundColor+"; color: "+settings.color+" ";
			
			html += "<ul class='selectCF'>";
			html += 	"<li>";
			html += 		"<span class='arrowCF ion-chevron-right' style='"+style+";font-size:30px'>></span>";
			html += 		"<span class='titleCF' style='"+style+"; width:auto'>"+title+"</span>";
			html += 		"<span class='searchCF' style='"+style+"; width:"+width+"px'><input style='color:"+settings.color+"' /></span>";
			html += 		"<ul>";
			$.each(list, function(k, v){ s = (v.selected == 1)? "selected":"";
			html += 			"<li value="+v.value+" class='"+s+"'>"+v.text+"</li>";})		
			html += 		"</ul>";
			html += 	"</li>";
			html += "</ul>";
			$(selectParent).after(html);
			var customSelect = $(this).next('ul.selectCF'); // add Html
			var seachEl = $(this).next('ul.selectCF').children('li').children('.searchCF');
			var seachElOption = $(this).next('ul.selectCF').children('li').children('ul').children('li');
			var seachElInput = $(this).next('ul.selectCF').children('li').children('.searchCF').children('input');
			
			// handle active select
			$(customSelect).unbind('click').bind('click',function(e){
				e.stopPropagation();
				if($(this).hasClass('onCF')){ 
					elActive = ''; 
					$(this).removeClass('onCF');
					$(this).removeClass('searchActive'); $(seachElInput).val(''); 
					$(seachElOption).show();
				}else{
					if(elActive != ''){ 
						$(elActive).removeClass('onCF'); 
						$(elActive).removeClass('searchActive'); $(seachElInput).val('');
						$(seachElOption).show();
					}
					elActive = $(this);
					$(this).addClass('onCF');
					$(seachEl).children('input').focus();
				}
			})
			
			// handle choose option
			var optionSelect = $(customSelect).children('li').children('ul').children('li');
			$(optionSelect).bind('click', function(e){
				var value = $(this).attr('value');
				if( $(this).hasClass('selected') ){
					//
				}else{
					$(optionSelect).removeClass('selected');
					$(this).addClass('selected');
					$(customSelect).children('li').children('.titleCF').html($(this).html());
					$(selectParent).val(value);
					settings.change.call(selectParent); // call event change
				}
			})
				
			// handle search 
			$(seachEl).children('input').bind('keyup', function(e){
				var value = $(this).val();
				if( value ){
					$(customSelect).addClass('searchActive');
					$(seachElOption).each(function(){
						if( $(this).text().search(new RegExp(value, "i")) < 0 ) {
							// not item
							$(this).fadeOut();
						}else{
							// have item
							$(this).fadeIn();
						}
					})
				}else{
					$(customSelect).removeClass('searchActive');
					$(seachElOption).fadeIn();
				}
			})
			
		});
    };
	$(document).click(function(){
		if(elActive != ''){
			$(elActive).removeClass('onCF');
			$(elActive).removeClass('searchActive');
		}
	})
}( jQuery ));

$(function(){
  var event_change = $('#event-change');
  $( ".select" ).selectCF({
    change: function(){
      var value = $(this).val();
      var text = $(this).children('option:selected').html();
      console.log(value+' : '+text);
      event_change.html(value+' : '+text);
    }
  });
  $( ".test" ).selectCF({
    color: "#FFF",
    backgroundColor: "#663052",
  });
})
    </script>

    <script>
      //  $('#type').change(function(){
      //   if($('#type').val()=="Report user")
      //   {
      //       $('#username').css("display","block");
      //       $('#usernamel').css("display","block");
      //   }
      //   else  
      //   {
      //       $('#username').css("display","none");
      //       $('#usernamel').css("display","none");
      //       $('#username').val('');
      //   }
        
      //  })

      //  $('#submitb').click(report);



      //  function report(e){
        
      //   var type=$("#type").val();
      //   var username=$("#username").val();
      //   var subject=$("#subject").val();
      //   var content=$("#content").val();
      //   if(subject.length<4)
      //   {
      //       e.preventDefault();
      //       $('#error').text('Subject is too short');
      //   }
      //   else 
      //   {
      //       if(content.length<10)
      //       {
      //           e.preventDefault();
      //           $('#error').text('Content is too short');
      //       }
      //           else 
      //           {
      //               if(type=="Report user")
      //               {
      //                   e.preventDefault();
      //                   $.when($.ajax({
      //                   url:'../controller/reporthandeler.php',
      //                   type:'post',
      //                   data:{'username':username},

      //                   })
      //                   ).then(function(data){
      //                       alert(data);
      //                       if(data==0){
      //                           e.preventDefault();
      //                           $('#error').text("This User does not exist!");
      //                       }else 
      //                       {
      //                           $('#error').text("");
      //                           $('#formmm').submit();
                                
      //                       }
      //                   })
      //               }
      //           }
      //   }
        


      //  }

        
    </script>

        
</body>

<!-- Mirrored from themebeyond.com/html/geco/Geco/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 31 Oct 2022 13:05:44 GMT -->

</html>