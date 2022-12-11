<?php
  require '../model/auctionModel.php';
  $data=auctionModel::fetchAuction($_GET["selectedAuction"]);
  $_SESSION["temp"]=$data;
  header("location: ../view/viewOnGoingAuction.php");
?>