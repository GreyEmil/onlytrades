<?php
require_once '../model/reportModel.php';
var_dump($_POST);
report::makeReport($_POST);