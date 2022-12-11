<?php 
error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();
$pay=file_get_contents("php://input");
if($pay!="") $_SESSION["lastChecked"]=[];
?>