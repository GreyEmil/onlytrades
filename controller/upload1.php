<?php
session_start();
require "../model/p1.php";
//table product variables
$product1 = new Product1();
$product1->addProduct1($_POST, $_FILES ,$_SESSION["user"]["id"]);
//

?>