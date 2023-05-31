<?php
if(!isset($_SESSION))session_start();
error_reporting(E_ERROR | E_PARSE);
require '../model/userModel.php';
require '../model/auctionModel.php';
class user
{
  public static function checkExistance($userName,$email)
  {
    userModel::checkExistance($userName,$email);
  }

  public static function signUp($userInfo,$photo,$code)
  {
    $user=userModel::signUp($userInfo,$photo,$code);
    $_SESSION["user"]=$user;
    $_SESSION["ownedAuctions"]=auctionModel::fetchOwnedAuctions();
    header("location: ../view/profile.php");
  }

  public static function signIn($email,$password)
  {
    $user=userModel::signIn($email,$password);
    if(isset($user["id"]))
    {
      $_SESSION["user"]=$user;
      return 'welcome';
    }
    else {$_SESSION["user"]["id"]=0; return $user;}
  }

}
