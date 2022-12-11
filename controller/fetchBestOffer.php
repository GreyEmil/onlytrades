<?php
require "auction.php";
$best=auction::fetchBestOffer($_POST["id"]);
if($best=="none")
{
  echo 'none';
}
else echo json_encode($best);
//var_dump($best);