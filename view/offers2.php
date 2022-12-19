<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>offers</title>
  <link rel="stylesheet" href="./css/offerstyle.css">
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
</head>
<?php
require "../controller/config.php";
require "../model/tradeModel.php";
if(!isset($_SESSION)) session_start();
$offers=tradeModel::getOffers($_GET["idTrade"]);
$thistrade=tradeModel::getTrade($_GET["idTrade"]);

?>

<body>
  <!-- partial:index.partial.html -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

  <section class="hero-section">
  <div class="card-grid">
    <!--  -->
    <a class="card"  onclick="back()">
      <?php echo "<div class='card__background' style='background-image: url(data:image;base64," . $thistrade["images"][0] . ");'>"; ?>
      </div>
      <div class="card__content">
        <p class="card__category"></p>
        <h3 class="card__heading">GO BACK</h3>
      </div>
    </a>
    <!--  -->
      <?php
      if(isset($offers)){
    for ($i = 0; $i < count($offers); $i++) {
      if($offers[$i]["status"]=="APPROVED"){
      echo "<a class='card' href='viewtrade.php?trade=".$offers[$i]["id"]."&&select=1'>";
      echo "<div class='card__background'
          style='background-image: url(data:image;base64," . $offers[$i]['images'][0]. ");'>";
     echo'
      </div>
       <div class="card__content">
      <p class="card__category">'.$offers[$i]["category"].'</p>
      <h3 class="card__heading">' . $offers[$i]["name"] . '</h3>
    </div>
    </a>';
    }
  }
}
    ?>
  </div>
  </section>
  <!-- partial -->

</body>
<script>
  function back(){
    window.history.back();
  }
</script>

</html>