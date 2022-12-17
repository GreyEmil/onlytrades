<?php
require_once '../model/reportModel.php';


if($_POST["action"]=='remove comment')
{
    echo report::removeComment($_POST["id"],$_POST["idrep"],'removed');

}
if($_POST["action"]=='remove thread')
{
    echo report::removeThread($_POST["id"],$_POST["idrep"],'removed');

}
if(substr($_POST["action"],0,3)=='Ban')
{
    echo report::ban($_POST["id"],$_POST["idrep"],"banned");

}