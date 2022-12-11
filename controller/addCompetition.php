<?php
require "competition.php";
$pay=file_get_contents("php://input");
if($pay!="") $competition=json_decode($pay,true);

competition::addCompetition($competition);
