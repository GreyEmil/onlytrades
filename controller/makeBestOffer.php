<?php
require 'auction.php';

if(isset($_POST["request"]) && $_POST["request"]=="closeauction")
{
    auctionModel::closeAuction($_POST["id"],$_POST["duration"]);
}
else
{
if(isset($_POST["request"]) && $_POST["request"]=="checkclosed")
{
    echo auctionModel::checkIfClosed($_POST["id"]);
}
else
    auction::makeBestOffer($_POST['id']);
}


