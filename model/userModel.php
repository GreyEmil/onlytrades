<?php
error_reporting(E_ERROR | E_PARSE);
  require_once '../controller/config.php';
  class userModel
  {
    public static function checkExistance($userName,$email)
    {
      
      $db=config::getConnexion();
      $req=$db->prepare("SELECT * FROM user WHERE username=?");
      $req->execute(array($userName));
      $usertmp=$req->fetchAll();
      if(count($usertmp)==0) echo '0'; else echo '1';
      $req=$db->prepare("SELECT * FROM user WHERE email=?");
      $req->execute(array($email));
      $usertmp=$req->fetchAll();
      if(count($usertmp)==0) echo '0'; else echo '1';

    }

    public static function signUp($userInfo,$photo)
    {
      $db=config::getConnexion();
      $req=$db->prepare("INSERT INTO user (username,first_name,last_name,dob,adress,zip_code,email,password,role,phone,photo,creation_date) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
      $req->execute(array($userInfo["username"],$userInfo["firstName"],$userInfo["lastName"],$userInfo["birthdate"],$userInfo["adress"],$userInfo["zipCode"],$userInfo["email"],$userInfo["password"],0,$userInfo["phone"],base64_encode(file_get_contents($photo)),date('Y-m-d')));
      $idUser=$db->lastInsertId();
      $req=$db->prepare("SELECT * FROM user WHERE id=?");
      $req->execute(array($idUser));
      return $req->fetchAll()[0];
      

    }

    public static function signIn($email,$password)
    {
      $db=config::getConnexion();
      $req=$db->prepare("SELECT * FROM user WHERE email=?");
      $req->execute(array($email));
      $user=$req->fetchAll()[0];
      if(!isset($user))
      return 0;
      if($user["password"]!=$password)
      return 1;
      return $user;
    }

  }