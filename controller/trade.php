<?php
require_once "../model/tradeModel.php";
if(!isset($_SESSION)) session_start();



if(isset($_POST["submitb"]))
{
    $id=tradeModel::addTrade($_POST,$_FILES);
    
    if($_POST["type"]==0)
    {
        tradeModel::addOffer($_POST["id_trade"],$id);
    }
    header("location: ../view/displayTrades.php");
}

if(isset($_GET["accepted"]))
{
    tradeModel::acceptOffer($_GET["id"]);
    header("location:../view/donedealsf.php");
}