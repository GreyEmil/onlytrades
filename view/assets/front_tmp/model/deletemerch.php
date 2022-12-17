<?php
require '../controller/merch.php';
$delete=new merch;
$delete->delete($_GET['id']);
header('location:../view/backendmerch.php');
?>

