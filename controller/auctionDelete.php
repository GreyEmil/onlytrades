<?php 
require "auction.php";
 auction::deleteAuction($_SESSION["auctions"][$_GET["selectedAuction"]]["id"]);

?>