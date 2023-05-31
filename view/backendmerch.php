<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Backendmerch</title>
  <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="css/bestyle.css">
  <link rel="stylesheet" href="css/backend.css">
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

</head>
<body>
<!-- partial:index.partial.html -->
<div class="video-bg">
 <video width="320" height="240" autoplay loop muted>
  <source src="img/vid2.mp4" type="video/mp4">
</video>
</div>
<div class="dark-light">
    <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
     <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" /></svg>
   </div>
<div class="app">
 <div class="header">
  <div class="menu-circle"></div>
  <div class="admin-icon"><img id="adminIcon" class="img" src="data:image;base64,<?php echo $_SESSION["user"]["photo"] ;?>" alt=""></div>


  
 </div>
 <div class="wrapper">
  <div class="left-side">
   <div class="side-wrapper">
    <div class="side-title">Apps</div>
    <div class="side-menu">
     <a href="backendmerch.php">
      <svg viewBox="0 0 512 512">
       <g xmlns="http://www.w3.org/2000/svg" fill="currentColor">
        <path d="M0 0h128v128H0zm0 0M192 0h128v128H192zm0 0M384 0h128v128H384zm0 0M0 192h128v128H0zm0 0" data-original="#bfc9d1" />
       </g>
       <path xmlns="http://www.w3.org/2000/svg" d="M192 192h128v128H192zm0 0" fill="currentColor" data-original="#82b1ff" />
       <path xmlns="http://www.w3.org/2000/svg" d="M384 192h128v128H384zm0 0M0 384h128v128H0zm0 0M192 384h128v128H192zm0 0M384 384h128v128H384zm0 0" fill="currentColor" data-original="#bfc9d1" />
      </svg>
      MERCH
     </a>
     <a href="backendorders.php">
      <svg viewBox="0 0 488.932 488.932" fill="currentColor">
       <path d="M243.158 61.361v-57.6c0-3.2 4-4.9 6.7-2.9l118.4 87c2 1.5 2 4.4 0 5.9l-118.4 87c-2.7 2-6.7.2-6.7-2.9v-57.5c-87.8 1.4-158.1 76-152.1 165.4 5.1 76.8 67.7 139.1 144.5 144 81.4 5.2 150.6-53 163-129.9 2.3-14.3 14.7-24.7 29.2-24.7 17.9 0 31.8 15.9 29 33.5-17.4 109.7-118.5 192-235.7 178.9-98-11-176.7-89.4-187.8-187.4-14.7-128.2 84.9-237.4 209.9-238.8z" />
      </svg>
      ORDERS
      <span class="notification-number updates"><?php echo($_SESSION["number"]);?></span>
     </a>
    </div>
   </div>
  </div>
  <div class="main-container">
    
   <div class="main-header" style="background:none">
   <a class="menu-link-main" href="#" >All Apps</a>
    <div class="header-menu">
     <a class="main-header-link" href="#">Accounts</a>
     <a class="main-header-link" href="#">Products</a>
     <a class="main-header-link" href="#">Events</a>
     <a class="main-header-link is-active" href="backendmerch.php">Merch</a>
     <a class="main-header-link" href="#">Forums</a>
     <a class="main-header-link" href="#">Reports</a>

    </div>
   </div>
   <div class="content-wrapper" >
   <main>
        <!-- slider-area -->
        <div class="container custom-container">
                <div class="row">
                    <section class="shop-area black-bg pt-115 pb-90" style="display:contents">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-xl-6 col-lg-8" style='margin-left:-25px;'>
                                    <div class="section-title title-style-three white-title text-center mb-40">
                                        <h2>Our <span>PointsShop</span></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row product-active" style="margin-right:-340px;">
                                
                                <div class="col-xl-3" style="margin-bottom:30px">
                                    <div class="shop-item">
                                        <div class="product-thumb">
                                            <a><img id="prod0" src=""></a>
                                        </div>
                                        <div class="product-content">
                                        <div class="product-tag"><a id="prod0n" href="addshop.php">ADD TO MERCH</a></div>
                                        <div class="product-meta">
                                                <div class="product-price">
                                                    <h5 id="prod00q"></h5><h4 id="prod0q"></h4>
                                                    <h5 id="prod00p"></h5><h4 id="prod0p"></h4>
                                                    <h5 id="prod00des"></h5><h4 id="prod0des"></h4> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                        <form method="get">
                                        <div id='prod0dd'><a id="prod0d" href='javascript:void(0)'></a></div>
                                         </form>
                                         </div>
                                         <div class="product-content">
                                         <form method="get">
                                        <div id='prod0mm'><a id="prod0m" href='javascript:void(0)'></a></div>
                                         </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3" style="margin-bottom:30px">
                                    <div class="shop-item">
                                        <div class="product-thumb">
                                        <a><img id="prod1" src=""></a>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-tag"><a id="prod1n" href="addshop.php">ADD TO MERCH</a></div>
                                            <div class="product-meta">
                                                <div class="product-price">
                                                    <h5 id="prod11q"></h5><h4 id="prod1q"></h4> 
                                                    <h5 id="prod11p"></h5><h4 id="prod1p"></h4> 
                                                    <h5 id="prod11des"></h5><h4 id="prod1des"></h4> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                        <form method="get">
                                        <div id='prod1dd'><a id="prod1d" href='javascript:void(0)'></a></div>
                                         </form></div>
                                         <div class="product-content">
                                         <form method="get">
                                        <div id='prod1mm'><a id="prod1m" href='javascript:void(0)'></a></div>
                                         </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3" style="margin-bottom:30px">
                                    <div class="shop-item">
                                        <div class="product-thumb">
                                        <a><img id="prod2" src=""></a>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-tag"><a id="prod2n" href="addshop.php">ADD TO MERCH</a></div>
                                            <div class="product-meta">
                                              <div class="product-price">
                                                <h5 id="prod22q"></h5><h4 id="prod2q"></h4> 
                                                <h5 id="prod22p"></h5><h4 id="prod2p"></h4> 
                                                <h5 id="prod22des"></h5><h4 id="prod2des"></h4> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                        <form method="get">
                                        <div id='prod2dd'><a id="prod2d" href='javascript:void(0)'></a></div>
                                         </form></div>
                                         <div class="product-content">
                                         <form method="get">
                                        <div id='prod2mm'><a id="prod2m" href='javascript:void(0)'></a></div>
                                         </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3" style="margin-bottom:30px">
                                    <div class="shop-item">
                                        <div class="product-thumb">
                                        <a><img id="prod3" src=""></a>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-tag"><a id="prod3n" href="addshop.php">ADD TO MERCH</a></div>
                                            <div class="product-meta">
                                                <div class="product-price">
                                                    <h5 id="prod33q"></h5><h4 id="prod3q"></h4> 
                                                    <h5 id="prod33p"></h5><h4 id="prod3p"></h4> 
                                                    <h5 id="prod33des"></h5><h4 id="prod3des"></h4> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                        <form method="get">
                                        <div id='prod3dd'><a id="prod3d" href='javascript:void(0)'></a></div>
                                         </form></div>
                                         <div class="product-content">
                                         <form method="get">
                                        <div id='prod3mm'><a id="prod3m" href='javascript:void(0)'></a></div>
                                         </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3" style="margin-bottom:30px">
                                    <div class="shop-item">
                                        <div class="product-thumb">
                                        <a><img id="prod4" src=""></a>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-tag"><a id='prod4n' href="addshop.php">ADD TO MERCH</a></div>
                                            <div class="product-meta" >
                                            <div class="product-price">
                                                  <h5 id="prod44q"></h5><h4 id="prod4q"></h4> 
                                                   <h5 id="prod44p"></h5><h4 id="prod4p"></h4> 
                                                   <h5 id="prod44des"></h5><h4 id="prod4des" style='margin-right:30px'></h4> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                        <form method="get">
                                        <div id='prod4dd'><a id="prod4d" href='javascript:void(0)'></a></div>
                                         </form>
                                         </div>
                                         <div class="product-content">
                                         <form method="get">
                                        <div id='prod4mm'><a id="prod4m" href='javascript:void(0)'></a></div>
                                         </form>
                                        </div>
                                        </div>
                                        </div>   
                            </div>
                        </div>
                 </section>
            </div>
     </div>
    </main>
</div>
    <!-- slider-area-end -->
    <!-- PHP HERE -->
    <?php
    require '../controller/merch.php';
        $tab=new merch;
       $tab0 = $tab->affiche();
     ?>
     <script language='Javascript'>
        var char="javascript:void(0)";
        var tab00="<?php if(isset($tab0[0]['id'])) echo ($tab0[0]['id']); else echo("");?>";
        var tab11="<?php if(isset($tab0[1]['id'])) echo ($tab0[1]['id']); else echo("");?>";
        var tab22="<?php if(isset($tab0[2]['id'])) echo ($tab0[2]['id']); else echo("");?>";
        var tab33="<?php if(isset($tab0[3]['id'])) echo ($tab0[3]['id']); else echo("");?>";
        var tab44="<?php if(isset($tab0[4]['id'])) echo ($tab0[4]['id']); else echo("");?>";
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
            var prod0dd=document.getElementById("prod0dd");
            var prod0d=document.getElementById("prod0d");
            var prod0mm=document.getElementById("prod0mm");
            var prod0m=document.getElementById("prod0m");
        var tab4 = '<?php if(isset($tab0[0]['img_url'])) echo ($tab0[0]['img_url']); else echo(""); ?>';
        var tab1 = '<?php if(isset($tab0[0]['name'])) echo ($tab0[0]['name']); else echo(""); ?>';
        var tab2 = '<?php if(isset($tab0[0]['quantity'])) echo ($tab0[0]['quantity']); else echo(""); ?>';
        var tab3 = '<?php if(isset($tab0[0]['price'])) echo ($tab0[0]['price']); else echo(""); ?>';
        var tab5 ='<?php if(isset($tab0[0]['description'])) echo ($tab0[0]['description']); else echo(""); ?>';
        prod0.src= tab4;
        prod0n.href= char;
        prod0n.innerHTML = tab1;
        prod00q.innerHTML = 'quantity: ';
        prod0q.innerHTML=tab2;
        prod00p.innerHTML = 'Price: ';
        prod0p.innerHTML =tab3+' OTP';
        prod00des.innerHTML='Description:';
        prod0des.innerHTML=tab5;
        prod0dd.className='product-tag';
        prod0d.href="<?php if(isset($tab0[0]['id'])) echo ('../model/deletemerch.php?id='.$tab0[0]['id']);?>";
        prod0d.innerHTML="Delete";
        prod0mm.className='product-tag';
        prod0m.href="<?php if(isset($tab0[0]['id'])) echo ('../model/modifymerch.php?id='.$tab0[0]['id']);?>";
        prod0m.innerHTML="Modify";
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
            var prod1dd=document.getElementById("prod1dd");
            var prod1d=document.getElementById("prod1d");
            var prod1mm=document.getElementById("prod1mm");
            var prod1m=document.getElementById("prod1m");
        var tab4 = '<?php if(isset($tab0[1]['img_url'])) echo ($tab0[1]['img_url']); else echo(""); ?>';
        var tab1 = '<?php if(isset($tab0[1]['name'])) echo ($tab0[1]['name']); else echo(""); ?>';
        var tab2 = '<?php if(isset($tab0[1]['quantity'])) echo ($tab0[1]['quantity']); else echo(""); ?>';
        var tab3 = '<?php if(isset($tab0[1]['price'])) echo ($tab0[1]['price']); else echo(""); ?>';
        var tab5 ='<?php if(isset($tab0[1]['description'])) echo ($tab0[1]['description']); else echo(""); ?>';
        prod1.src= tab4;
        prod1n.href= char;
        prod1n.innerHTML = tab1;
        prod11q.innerHTML = 'quantity: ';
        prod1q.innerHTML=tab2;
        prod11p.innerHTML = 'Price: ';
        prod1p.innerHTML =tab3+' OTP';
        prod11des.innerHTML='Description:';
        prod1des.innerHTML=tab5;
        prod1dd.className='product-tag';
        prod1d.href="<?php if(isset($tab0[1]['id'])) echo ('../model/deletemerch.php?id='.$tab0[1]['id']);?>";
        prod1d.innerHTML="Delete";
        prod1mm.className='product-tag';
        prod1m.href="<?php if(isset($tab0[1]['id'])) echo ('../model/modifymerch.php?id='.$tab0[1]['id']);?>";
        prod1m.innerHTML="Modify";
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
            var prod2dd=document.getElementById("prod2dd");
            var prod2d=document.getElementById("prod2d");
            var prod2mm=document.getElementById("prod2mm");
            var prod2m=document.getElementById("prod2m");
        var tab4 = '<?php if(isset($tab0[2]['img_url'])) echo ($tab0[2]['img_url']); else echo(""); ?>';
        var tab1 = '<?php if(isset($tab0[2]['name'])) echo ($tab0[2]['name']); else echo(""); ?>';
        var tab2 = '<?php if(isset($tab0[2]['quantity'])) echo ($tab0[2]['quantity']); else echo(""); ?>';
        var tab3 = '<?php if(isset($tab0[2]['price'])) echo ($tab0[2]['price']); else echo(""); ?>';
        var tab5 ='<?php if(isset($tab0[2]['description'])) echo ($tab0[2]['description']); else echo(""); ?>';
        prod2.src= tab4;
        prod2n.href= char;
        prod2n.innerHTML = tab1;
        prod22q.innerHTML = 'quantity: ';
        prod2q.innerHTML=tab2;
        prod22p.innerHTML = 'Price: ';
        prod2p.innerHTML =tab3+' OTP';
        prod22des.innerHTML='Description:';
        prod2des.innerHTML=tab5;
        prod2dd.className='product-tag';
        prod2d.href="<?php if(isset($tab0[2]['id'])) echo ('../model/deletemerch.php?id='.$tab0[2]['id']);?>";
        prod2d.innerHTML="Delete";
        prod2mm.className='product-tag';
        prod2m.href="<?php if(isset($tab0[2]['id'])) echo ('../model/modifymerch.php?id='.$tab0[2]['id']);?>";
        prod2m.innerHTML="Modify";
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
            var prod3dd=document.getElementById("prod3dd");
            var prod3d=document.getElementById("prod3d");
            var prod3mm=document.getElementById("prod3mm");
            var prod3m=document.getElementById("prod3m");
        var tab4 = '<?php if(isset($tab0[3]['img_url'])) echo ($tab0[3]['img_url']); else echo(""); ?>';
        var tab1 = '<?php if(isset($tab0[3]['name'])) echo ($tab0[3]['name']); else echo(""); ?>';
        var tab2 = '<?php if(isset($tab0[3]['quantity'])) echo ($tab0[3]['quantity']); else echo(""); ?>';
        var tab3 = '<?php if(isset($tab0[3]['price'])) echo ($tab0[3]['price']); else echo(""); ?>';
        var tab5 ='<?php if(isset($tab0[3]['description'])) echo ($tab0[3]['description']); else echo(""); ?>';
        prod3.src= tab4;
        prod3n.href= char;
        prod3n.innerHTML = tab1;
        prod33q.innerHTML = 'quantity: ';
        prod3q.innerHTML=tab2;
        prod33p.innerHTML = 'Price: ';
        prod3p.innerHTML =tab3+' OTP';
        prod33des.innerHTML='Description:';
        prod3des.innerHTML=tab5;
        prod3dd.className='product-tag';
        prod3d.href="<?php if(isset($tab0[3]['id'])) echo ('../model/deletemerch.php?id='.$tab0[3]['id']);?>";
        prod3d.innerHTML="Delete";
        prod3mm.className='product-tag';
        prod3m.href="<?php if(isset($tab0[3]['id'])) echo ('../model/modifymerch.php?id='.$tab0[3]['id']);?>";
        prod3m.innerHTML="Modify";
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
            var prod4dd=document.getElementById("prod4dd");
            var prod4d=document.getElementById("prod4d");
            var prod4mm=document.getElementById("prod4mm");
            var prod4m=document.getElementById("prod4m");
        var tab4 = '<?php if(isset($tab0[4]['img_url'])) echo ($tab0[4]['img_url']); else echo(""); ?>';
        var tab1 = '<?php if(isset($tab0[4]['name'])) echo ($tab0[4]['name']); else echo(""); ?>';
        var tab2 = '<?php if(isset($tab0[4]['quantity'])) echo ($tab0[4]['quantity']); else echo(""); ?>';
        var tab3 = '<?php if(isset($tab0[4]['price'])) echo ($tab0[4]['price']); else echo(""); ?>';
        var tab5 ='<?php if(isset($tab0[4]['description'])) echo ($tab0[4]['description']); else echo(""); ?>';
        prod4.src= tab4;
        prod4n.href= char;
        prod4n.innerHTML = tab1;
        prod44q.innerHTML = 'quantity: ';
        prod4q.innerHTML=tab2;
        prod44p.innerHTML = 'Price: ';
        prod4p.innerHTML =tab3+' OTP';
        prod44des.innerHTML='Description:';
        prod4des.innerHTML=tab5;
        prod4dd.className='product-tag';
        prod4d.href="<?php if(isset($tab0[4]['id'])) echo ('../model/deletemerch.php?id='.$tab0[4]['id']);?>";
        prod4d.innerHTML="Delete";
        prod4mm.className='product-tag';
        prod4m.href="<?php if(isset($tab0[4]['id'])) echo ('../model/modifymerch.php?id='.$tab0[4]['id']);?>";
        prod4m.innerHTML="Modify";
         } 
        </script> 
    <!-- END PHP -->

   </div>
  </div>
 </div>
 <div class="overlay-app"></div>
</div>
<!-- partial -->
<!-- JS here -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="js/script.js"></script>
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
     <script  src="js/script.js"></script>
</body>
</html>
