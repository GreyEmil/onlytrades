<?php 
require 'forum.php';

if(isset($_POST["idUser"]))
{
  echo forum::view($_POST["idThread"],$_POST["idUser"]);
}
else
{
  echo ($_POST["idThread"].forum::getViews($_POST["idThread"]));
}