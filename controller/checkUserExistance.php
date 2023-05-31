<?php
require 'user.php';
user::checkExistance($_GET["username"],$_GET["email"]);