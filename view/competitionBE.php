<?php
session_start();
$pay=file_get_contents("php://input");
if($pay!="") $_SESSION["test"]=json_decode($pay,true);
var_dump($_SESSION["test"]);