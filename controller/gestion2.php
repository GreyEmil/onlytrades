<?php
require "../model/p2.php";
//table product variables
$product1 = new Product2();
$product1->AdminGestionProduit2($_GET["accepted"], $_GET["rejected"],$_GET["deleted"]);

?>