<?php 
session_start();
include '../controller/merch.php';
$id=$_SESSION["user"]["id"];
$prod=$_GET["id_prod"];
$delete=new panier;
$delete->deletebasket($id,$prod);
header("location:../view/pointsshop.php");
?>