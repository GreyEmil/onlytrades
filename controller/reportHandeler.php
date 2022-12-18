<?php
require "../model/userModel.php";
require "../model/ticketModel.php";
if(!isset($_SESSION)) session_start();

if(isset($_POST["subject"]))
{
    header("location:../view/ticketview.php?id=".ticketModel::submitTicket($_POST));
}else
{
if(isset($_POST["reply_btn"]))
    {
        ticketModel::addReply($_POST);
        $_POST["status"]="OPEN";
        ticketModel::updateStatus($_POST);
        
        header("location:../view/ticketview.php?id=".$_POST["id_ticket"]);
    }
    else echo userModel::checkUsername($_POST["username"]);
}



