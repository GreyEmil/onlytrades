<!DOCTYPE html>
<html lang="en" class="theme_switchable">

<head>
   <meta charset="UTF-8">
   <title>Inspect</title>
   <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css'>
   <link rel='stylesheet' href='https://static.fontawesome.com/css/fontawesome-app.css'>
   <link rel='stylesheet' href='https://pro.fontawesome.com/releases/v5.2.0/css/all.css'>
   <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,700'>
   <link rel="stylesheet" href="./css/cards.css">
   <link rel="stylesheet" href="./css/style.css">
   <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
   <style>
      @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

      fieldset,
      label {
         margin: 0;
         padding: 0;
      }

      body {
         margin: 20px;
      }

      h1 {
         font-size: 1.5em;
         margin: 10px;
      }

      /****** Style Star Rating Widget *****/

      .rating {
         border: none;
         float: left;
      }

      .rating>input {
         display: none;
      }

      .rating>label:before {
         margin: 5px;
         font-size: 1.25em;
         font-family: FontAwesome;
         display: inline-block;
         content: "\f005";
      }

      .rating>.half:before {
         content: "\f089";
         position: absolute;
      }

      .rating>label {
         color: #ddd;
         float: right;
      }

      /***** CSS Magic to Highlight Stars on Hover *****/

      .rating>input:checked~label,
      /* show gold star when clicked */
      .rating:not(:checked)>label:hover,
      /* hover current star */
      .rating:not(:checked)>label:hover~label {
         color: #FFD700;
      }

      /* hover previous stars in list */

      .rating>input:checked+label:hover,
      /* hover current star when changing rating */
      .rating>input:checked~label:hover,
      .rating>label:hover~input:checked~label,
      /* lighten current selection */
      .rating>input:checked~label:hover~label {
         color: #FFED85;
      }
   </style>

</head>
<?php
require "../model/p2.php";
$prod = new Product2();
// if(!$_GET["offre"] && $_GET["trade"]){
$itemSelected = $prod->ReturnProduct1Detailed();
session_start();

//user of item selected 
$connect = Config::getConnexion();
$sql = "select * from user where id=?";
$request1 = $connect->prepare($sql);
$request1->execute(array($itemSelected[0]["user_id"]));
$data1 = $request1->fetchAll();
$_SESSION["id"] = $itemSelected[0]["id"];
// }
//item 2
// $connect = Config::getConnexion();
// $sql = "select * from product2 where id= ?";
// $request2 = $connect->prepare($sql);
// $request2->execute(array($_GET["offre"]));
// $product2 = $request2->fetchAll();
//-files item2
// $sql = "select * from product2 ";
// $request3= $connect->prepare($sql);
// $request3->execute();
// $files2 = $request3->fetchAll();
?>

<body>
   <div style="display: flex; flex-direction: row;">
      
      <div class="details">
         <h4 style="margin-bottom:20px;">ITEM: <span class="white">
               <?php

               echo $itemSelected[0]["name"];
               ?>
            </span></h4>
         <ul>
            <li><span>ITEM DESCRIPTION :</span>
               <?php

               echo $itemSelected[0]["description"];
               ?>
            </li>

            <li><span>Category :</span>
               <?php

               echo $itemSelected[0]["category"];

               ?>
            </li>

            <li><span>USER NAME :</span>
               <?php echo $data1[0]["username"]; ?>
            </li>
         </ul>

      </div>
      <div style="margin-left: 250px;">

         <?php
         if ($_SESSION["where_it_came_from"] == "trade.php") {
            
         //    echo '<div style="display: flex; margin-top: 10%;">
         //    <h5 style="margin-right: 7%; margin-top: 3%;">Rate </h5>
         //    <fieldset class="rating">
         //       <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5"
         //          title="Awesome - 5 stars"></label>
         //       <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half"
         //          title="Pretty good - 4.5 stars"></label>
         //       <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4"
         //          title="Pretty good - 4 stars"></label>
         //       <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half"
         //          title="Meh - 3.5 stars"></label>
         //       <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3"
         //          title="Meh - 3 stars"></label>
         //       <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half"
         //          title="Kinda bad - 2.5 stars"></label>
         //       <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2"
         //          title="Kinda bad - 2 stars"></label>
         //       <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half"
         //          title="Meh - 1.5 stars"></label>
         //       <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1"
         //          title="Sucks big time - 1 star"></label>
         //       <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf"
         //          title="Sucks big time - 0.5 stars"></label>
         //       <input type="number" readonly="readonly" type="hidden">
         //    </fieldset>
         
         // </div>';
            echo " <h4 style='margin:20px 20px;'>like this item?</h4>
            <a href='oussemaform2.html' class='btn btn-style-two' style='text-decoration: none;'>Trade Now</a>
         <h4 style='margin:20px 20px; '>Nah it aint for me</h4>
         <a  href='trade.php?' class='btn btn-style-two' style='text-decoration: none;'> browse again</a><br><br>";

         }
         if ($_SESSION["where_it_came_from"] == "OnGoingTrades.php" && isset($_GET["trade"])) {
            echo "<h4 style='margin:20px 20px;'>This is your post</h4>
            <a href='offers.php?offer=" . $_GET["trade"] . "' class='btn btn-style-two' style='text-decoration: none;'>See offers i got</a>
            <br><br>
            <a onclick='back()' class='btn btn-style-two' style='text-decoration: none;'> go back</a>
            <br><br>
            <a href='#' class='btn btn-style-two' style='text-decoration: none;'> Edit My trade</a>";
         }
         if ($_SESSION["where_it_came_from"] == "OnGoingTrades.php" && isset($_GET["offre"])) {
            echo "<h4 style='margin:20px 20px;'>This an offer you got</h4>
            <a href='../controller/accept.php?accept=" . $_GET["offre"] . "' class='btn btn-style-two' style='text-decoration: none;'>Accept this offre</a>
            <br><br>
            <a  onclick='back()' class='btn btn-style-two' style='text-decoration: none;'> go back</a>
            <br><br>";
         }
         if (isset($_GET["offer"])) {
            echo "<h4 style='margin:20px 20px;'>This is an offer you made</h4>
            <a href='../controller/gestion2.php?deleted=" . $_GET["offer"] . "' class='btn btn-style-two' style='text-decoration: none;'>Delete your offer</a>
            <br><br>
            <a  onclick='back()' class='btn btn-style-two' style='text-decoration: none;'> go back</a>
            <br><br>";
         }
         ?>
         

      </div>
   </div>
   
   <div class='options'>
      

      <!-- partial:index.partial.html -->
      <?php
      echo "<div class='option active' style='--optionBackground:url(data:image;base64," . base64_encode($itemSelected[1]['data']) . "); background-repeat: no-repeat;
                   background-size: cover;'>";

      echo "<div class='shadow'></div>";

      echo "</div>";
      for ($i = 2; $i < count($itemSelected); $i++) {
         echo "<div class='option' style='--optionBackground:url(data:image;base64," . base64_encode($itemSelected[$i]['data']) . "); background-repeat: no-repeat;
                  background-size: cover;'>";

         echo "<div class='shadow'></div>";

         echo "</div>";
      }
      ?>
   </div>


   <!-- partial -->
   <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
   <script> function back() {
         window.history.back();
      }
      let star=document.querySelector('input');
      let showValue = document.querySelector('#rating-value');
      for(let i=0 ; i< star.length ; i++){
         i= this.value;
      }
      </script>
   <script src="./js/cards.js"></script>


</body>

</html>