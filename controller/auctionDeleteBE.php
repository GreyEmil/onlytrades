<?php 
require "auction.php";
if(isset($_SESSION["auctions"][$_GET["selectedAuction"]]["id"]))
 auction::deleteAuctionBE($_SESSION["auctions"][$_GET["selectedAuction"]]["id"]);

?>