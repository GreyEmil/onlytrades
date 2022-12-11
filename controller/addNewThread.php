<?php
require 'forum.php';
if(isset($_POST["comment"]))
forum::addComment($_POST,$_GET["idThread"],$_GET["idUser"]);
else
forum::addNewThread($_POST);