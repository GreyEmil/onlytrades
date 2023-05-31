<?php
require 'forum.php';
if(isset($_POST["idUser"]))
echo forum::addLike($_POST["idThread"],$_POST["idUser"]);
else {
  echo forum::getLikes($_POST["idThread"]);
}
