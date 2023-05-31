<?php
require 'user.php';
user::signUp($_POST,$_FILES["photo"]["tmp_name"]);