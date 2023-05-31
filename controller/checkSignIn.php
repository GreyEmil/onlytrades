<?php 
error_reporting(E_ERROR | E_PARSE);
require 'user.php';
$pay=file_get_contents("php://input");
if($pay!="") $user=json_decode($pay,true);
$response=user::signIn($user["email"],$user["password"]);

if($response==0) echo 'Email does not exist!';
if($response==1) echo 'Password is not correct!';

