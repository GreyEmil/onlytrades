<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="images/miscellaneous/fav.png">
  
      <!-- Fontawesome CSS Files -->
      <link rel="stylesheet" href="../../use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  
      <!-- Core CSS Files -->

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
    <link rel="stylesheet" type="text/css" href="css/stylee.css">
    <link rel="stylesheet" href="css/responsive.css">
      
    <title>orders</title>
</head>
<body>
<header>
        <div class="header-top-area s-header-top-area d-none d-lg-block">
            <div class="container-fluid s-container-full-padding">
                <div class="row align-items-center">
                    <div class="col-lg-6 d-none d-lg-block">
                        <div class="header-top-offer">
                            <p style="color: rgb(54, 169, 225);">Premium Offer</p>
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
                                            <p><span></span>
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
                    <li><a href="index.php">Home</a></li>
                    <!-- <li><a href="#">Pages</a></li> -->
                    <!-- <li><a href="game-overview.html">Overview</a></li> -->
                    <!-- <li><a href="community.html">Community</a></li> -->
                    <li ><a href="trade.php">Trade</a>
                                            <ul class="submenu">
                                                <li><a href="OnGoingTrades.php">My ongoing trades</a></li>
                                            </ul>
                                        </li>
                    <li >
                                    <a href="../controller/displayAllAuctions.php">Auctions</a>
                                    <ul style="display: flex;flex-direction: column;" class="submenu">
                                        <li><a href="displayownedauctionsview.php">my auctions</a></li>
                                    </ul>
                                </li>
                    <li><a href="../controller/displayAllCompetitions.php">Competitions</a>
                    <li class="show"><a href="POINTSSHOP.php">POINTS SHOP</a>
                                            <ul class="submenu">
                                                <li><a href="orders.php">My orders</a></li>
                                            </ul>
                                        </li>
                    <li >
                    <!-- <ul class="submenu">
                                                <li><a href="blog.html">News Page</a></li>
                                                <li><a href="blog-details.html">News Details</a></li>
                                            </ul>
                                        </li> -->
                    <li><a href="categories.php">FORUM</a></li>
                    <li >
                                    <a href="javascript:;">Report</a>
                                    <ul style="display: flex;flex-direction: column;" class="submenu">
                                        <li><a href="ajouterreclamation.php">Send Report</a></li>
                                        <li><a href="consulterreclamation.php">Report History</a></li> 
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
                                    <input type="text" placeholder="Search here...">
                                    <button><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
<main>

<!-- slider-area -->
<section class="slider-area slider-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-9">
                <div class="slider-content text-center">
                    <h6 class="wow fadeInDown" data-wow-delay=".2s">Points</h6>
                    <h2 class="tlt fix" data-in-effect="fadeInLeft">My <span>Orders</span></h2>
                    <p class="wow fadeInUp" data-wow-delay="2s"></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- slider-area-end -->


<!-- area-bg-one -->
<div class="area-bg-one">

</div>
<!-- area-bg-one-end -->

<!-- game-manage-area -->
<section id="section" class="game-manage-area game-mange-bg pt-120 pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8">
                <div class="section-title title-style-two text-center mb-60">


<section class="order-content">
            
        
          <?php
          require '../controller/merch.php';
          $id=$_SESSION["user"]["id"];
          $checkout=new commande;
          $checkout1=$checkout->showcheckout_only_user_1($id);
          $checkout2=$checkout->showcheckout_only_user_2($id);
          $length=count($checkout1);
          if($length>0)
          {
          for($i=0;$i<$length;$i++)
          {
            $length1=count($checkout2[$i][0]);
            echo('<div class="accordian">
            <table class="table top-table order-table">
                <tbody>
                  <tr class="d-flex">
                    <td class="col-12 col-md-3 first-item">'. 
                        $checkout1[$i][0].
                    '</td>
                    <td class="col-12 col-md-2">'.$checkout1[$i][1].'</td>');
                    if($checkout1[$i][2]==0)
                    {
                   echo('<td class="col-12 col-md-3">
                        <div class="text-secondary">Pending</div>
                        </td>
                        ');
                    }
                    else
                    {
                      echo('<td class="col-12 col-md-3">
                        <div class="text-secondary" style="color:green !important;">Delivered</div>
                      </td>');
                    }
                    echo('
                    <td class="col-12 col-md-2">'.
                        $checkout1[$i][3].' OTP
                    </td>
                    <td class="col-12 col-md-2">
                        <a class="btn btn-link" data-toggle="collapse" href="#orderDetail'.$i.'" role="button" aria-expanded="false">
                            View
                          </a>
                      </td>
             
                  </tr>
                  </tbody>
            </table>');
            echo('<div class="collapse" id="orderDetail'.$i.'">
            <div class="card card-body">
                <section class="orderdetail-content">
  
                    <div class="row">
                      <div class="col-12 col-md-5">
                          <h3>Order ID '.$checkout1[$i][1].'</h3>
                          <table class="table order-id">
                              <tbody>
                                  <tr class="d-flex">
                                    <td class="col-6 col-md-6"> <strong>Order Status</strong> </td>');
                                    if($checkout1[$i][2]==0)
                                    echo('<td class="pending col-6 col-md-6" ><p>Pending</p></td>');
                                    else
                                    echo('<td class="pending col-6 col-md-6" ><p style="width: 85px;">Delivered</p></td>');
                                    echo('
                                  </tr>
                                  <tr class="d-flex">
                                      <td class="col-6 col-md-6"><strong>Order DateTime</strong></td>
                                      <td  class="underline col-6 col-md-6" >'.$checkout1[$i][0].'</td>
                                    </tr>
                                    
                                </tbody>
                          </table>
                          </div>
                          <div class="col-12 col-md-7"> 
                          <h3>Shipping Details</h3>
                      <table class="table order-id">
                          <tbody>
                              <tr class="d-flex"> 
                                <td class="address col-12 col-md-6"><strong>Shipping Address</strong></td>
                              </tr>
                              <tr class="d-flex">
                                  <td  class="address col-12 col-md-12">'.$checkout1[$i][4].'</td>
                                </tr>
                                <tr class="d-flex"> 
                                <td class="address col-12 col-md-6"><strong>Phone Number</strong></td>
                              </tr>
                              <tr class="d-flex">
                                  <td  class="address col-12 col-md-12">'.$checkout1[$i][6].'</td>
                                </tr>
                            </tbody>
                      </table>
    
                      </div> 
                            
                    </div>
                    ');
                    
                    for($j=0;$j<$length1;$j++)
                    {
                    echo('
                    <table class="table orderdetail-content top-table">
                    <tbody>
                              <tr class="d-flex">
                                  <td class="col-12 col-md-2">
                                        <img class="img-fluid" src="'.$checkout2[$i][0][$j][0].'" alt="Image">
                                  </td>
                                  <td class="col-12 col-md-4">
                                      <div class="item-detail">
                                          <span class="pro-category">'.$checkout2[$i][0][$j][1].'</span>
                                          
                                      </div>
                                  </td>
                                  <td class="col-12 col-md-1 item-price">'.$checkout2[$i][0][$j][2].' OTP</td>
                                  <td class="col-12 col-md-3" >
                                      <div class="input-group-control">
                                          <input type="text" id="quantity12" name="quantity" class="form-control" value="'.$checkout2[$i][0][$j][3].'" readonly>
                                    </div>
                                  </td>
                                  <td class="col-12 col-md-2 item-total">'.$checkout2[$i][0][$j][4].' OTP</td>
                              </tr>

                              </tbody>
                              </table>');
                    }
                    echo('                          
          </section>
            </div>
          </div>
    </div>');
          }
        }
        else
        {echo('
          <table class="table top-table order-table">
                <tbody>
                  <tr class="d-flex">
                    <td class="col-12 col-md-3 first-item">You don'."'".'t have any order yet!!
                       </td>
                       <td class="col-12 col-md-2">
                       <a class="btn btn-link" href="pointsshop.php" role="button">
                           Buy Now
                         </a>
                     </td>
                  </tr>
                 
                  </tbody>
            </table>');
        }



          ?>
                          </div>
            </div>
        </div>
        
        </div>
</section>
<!-- game-manage-area-end -->
</main>
          <script src="js/scripts.js"></script>
        </body>
</html>