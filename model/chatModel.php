<?php
require_once "../controller/config.php";
session_start();

class chatModel
{
  public static function getChatId($id_auc)
  {
    $db=config::getConnexion();
    $req=$db->prepare("SELECT id from chat where id_auction=?");
    $req->execute(array($id_auc));
    return $req->fetch(PDO::FETCH_ASSOC)["id"];
  }
  public static function addMessage($id_chat,$id_user,$message)
  {
    $db=config::getConnexion();
    $req=$db->prepare("INSERT INTO message (id_chat,id_user,content,time) VALUES(?,?,?,?)");
    $req->execute(array($id_chat,$id_user,$message,date("h:i:sa",strtotime('-1 hour'))));
  }

  public static function getNewMessages($id_auc,$lastMessageId)
  {
    $id_chat=chatModel::getChatId($id_auc);
    $db=config::getConnexion();
    $req=$db->prepare("SELECT * FROM message where id_chat=? AND id>?");
    $req->execute(array($id_chat,$lastMessageId));
    $data=$req->fetchAll(pdo::FETCH_ASSOC);
    for($i=0;$i< count($data);$i++)
    {
      $req=$db->prepare("SELECT username,photo FROM user where id=?");
      $req->execute(array($data[$i]["id_user"]));
      $data[$i]["user"]=$req->fetchAll(PDO::FETCH_ASSOC)[0];
    }
    return $data;
  }
}
?>