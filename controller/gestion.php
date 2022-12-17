<?php
require "../model/p1.php";
//table product variables
$product1 = new Product1();
$product1->AdminGestionProduit($_GET["accepted"], $_GET["rejected"],$_GET["delete"]);
?>