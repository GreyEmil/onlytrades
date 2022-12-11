<?php 
session_start();
unset($_SESSION["user"]);
$_SESSION["user"]["id"]=0;
header("location: index.php");
?>