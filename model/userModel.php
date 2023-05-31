<?php
error_reporting(E_ERROR | E_PARSE);
  require_once '../controller/config.php';
  class userModel
  {
    public static function checkUsername($userName)
    {
      $db=config::getConnexion();
      $req=$db->prepare("SELECT * FROM user WHERE username=? ");
      $req->execute(array($userName));
      $d=$req->fetchAll();
      if(count($d)==1) return 1; else return 0;
    }

    public static function checkEmail($email)
    {
      $db=config::getConnexion();
      $req=$db->prepare("SELECT * FROM user WHERE email=? ");
      $req->execute(array($email));
      $d=$req->fetchAll();
      if(count($d)==1) return 1; else return 0;
    }

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

    public static function signUp($userInfo,$photo,$code)
    {
      $db=config::getConnexion();
      $req=$db->prepare("INSERT INTO user (username,first_name,last_name,dob,adress,zip_code,email,password,phone,photo,creation_date,verification_token) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
      $req->execute(array($userInfo["username"],$userInfo["firstName"],$userInfo["lastName"],$userInfo["birthdate"],$userInfo["adress"],$userInfo["zipCode"],$userInfo["email"],$userInfo["password"],$userInfo["phone"],base64_encode(file_get_contents($photo)),date('Y-m-d'),$code));
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
      if($password!=$user["password"])
      return 1;
      return $user;
    }

    public static function fetchAccounts()
    {
      $db=config::getConnexion();
      $req=$db->prepare("SELECT * FROM user");
      $req->execute(array());
      return $req->fetchAll();
    }

    public static function removeUser($id)
    {
      $db=config::getConnexion();
      $req=$db->prepare("DELETE FROM user where id=?");
      $req->execute(array($id));
      
    }

    public static function banUser($id)
    {
      $db=config::getConnexion();
      $req=$db->prepare("UPDATE user SET isBanned =? where id=?");
      $req->execute(array(1,$id));
      
    }
    public static function unbanUser($id)
    {
      $db=config::getConnexion();
      $req=$db->prepare("UPDATE user SET isBanned =? where id=?");
      $req->execute(array(0,$id));
      
    }

    public static function modifyUser($info)
    {
      $db=config::getConnexion();
      if(!empty($info["username"]))
      {
        $req=$db->prepare("UPDATE user SET username =? where id=?");
        $req->execute(array($info["username"],$info["id"]));
      }
      if(!empty($info["lastname"]))
      {
        $req=$db->prepare("UPDATE user SET last_name =? where id=?");
        $req->execute(array($info["lastname"],$info["id"]));
      }
      if(!empty($info["firstname"]))
      {
        $req=$db->prepare("UPDATE user SET first_name =? where id=?");
        $req->execute(array($info["firstname"],$info["id"]));
      }
      if(!empty($info["email"]))
      {
        $req=$db->prepare("UPDATE user SET email =? where id=?");
        $req->execute(array($info["email"],$info["id"]));
      }
      if(!empty($info["path"]))
      {
        $req=$db->prepare("UPDATE user SET photo =? where id=?");
        $req->execute(array(base64_encode(file_get_contents($info["path"])),$info["id"]));
      }



      $req=$db->prepare("SELECT * FROM user where  id=?");
      $req->execute(array($info["id"]));
      $_SESSION["user"]=$req->fetchAll()[0];
    }

    public static function getAccount($id)
    {
      $db=config::getConnexion();
      $req=$db->prepare("SELECT * FROM user where id=?");
      $req->execute(array($id));
      return $req->fetchAll()[0];
    }
  }