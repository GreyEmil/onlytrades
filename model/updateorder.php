<?php
require '../controller/merch.php';
$update=new commande;
$update->updateorder($_GET['id_com']);
header('location:../view/backendorders.php');
?>
