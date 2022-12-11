<?php 
require "../model/auctionModel.php";
$auctions=auctionModel::notifyAuction();
if(isset($auctions))echo json_encode($auctions);
?>
