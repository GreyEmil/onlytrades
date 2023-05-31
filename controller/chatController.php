<?php
error_reporting(E_WARNING | E_PARSE);
session_start();
require_once "../model/chatModel.php";

if($_POST["request"]=="addmessage")
{
  $id_chat=chatModel::getChatId($_POST["idauction"]);
  chatModel::addMessage($id_chat,$_SESSION["user"]["id"],$_POST["message"]);
}

if($_POST["request"]=="getnewmessages")
{
  $messages=chatModel::getNewMessages($_POST["idauction"],$_POST["lastmessageid"]);
  if(!empty($messages))
  echo json_encode($messages);
}
?>