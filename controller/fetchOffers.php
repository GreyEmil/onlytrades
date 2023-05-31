<?php
require "auction.php";
$offers=auction::fetchOffers($_POST["id"]);
if($offers=="none")
{
  echo 'none';
}
else echo json_encode($offers);