<?php 
require "auction.php";
if(isset($_POST['myId']))
auction::removeMyOffer($_POST['myId']);
else
auction::removeOffer($_POST["id"]);