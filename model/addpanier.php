<?php
session_start();
include '../controller/merch.php';
$id=$_SESSION["user"]["id"];
$prod=$_POST['id'];
$add=new panier;
$add->addbasket($id,$prod);
 echo(json_encode($add->showbasket($id)));
?>