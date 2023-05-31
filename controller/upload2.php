<?php
require "../model/p2.php";
session_start();
$product2=new Product2();
echo $_SESSION["id"];
$product2->addProduct2($_POST, $_FILES,$_SESSION["id"],$_SESSION["user"]["id"]);
?>