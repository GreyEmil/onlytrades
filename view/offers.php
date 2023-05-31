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
$connect = Config::getConnexion();
$sql = "select * from file where product_id=?";
$request = $connect->prepare($sql);
$request->execute(array($_GET["offer"]));
$data = $request->fetchAll();
///
$connect = Config::getConnexion();
$sql = "select * from product2 where id_product=?";
$request1 = $connect->prepare($sql);
$request1->execute(array($_GET["offer"]));
$data1 = $request1->fetchAll();
$itemSelected = $_GET["offer"];

//file prod 2
$sql = "select * from file2 ";
$request2 = $connect->prepare($sql);
$request2->execute();
$data2 = $request2->fetchAll();

?>

<body>
  <!-- partial:index.partial.html -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

  <section class="hero-section">
  <div class="card-grid">
    <!--  -->
    <a class="card"  onclick="back()">
      <?php echo "<div class='card__background' style='background-image: url(data:image;base64," . base64_encode($data[0]['data']) . ");'>"; ?>
      </div>
      <div class="card__content">
        <p class="card__category">Category</p>
        <h3 class="card__heading">GO BACK</h3>
      </div>
    </a>
    <!--  -->
      <?php
    for ($i = 0; $i < count($data1); $i++) {
      if($data1[$i]["status"]>0){
      echo "<a class='card' href='cards.php?offre=".$data1[$i]["id"]."'>";
      foreach ($data2 as $row2) {
        if ($row2["product_id"] == $data1[$i]["id"]) {
          echo "<div class='card__background'
          style='background-image: url(data:image;base64," . base64_encode($row2['data']) . ");'>";
          break;
        }
      }
     echo'
      </div>
       <div class="card__content">
      <p class="card__category">'.$data1[$i]["category"].'</p>
      <h3 class="card__heading">' . $data1[$i]["name"] . '</h3>
    </div>
    </a>';
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