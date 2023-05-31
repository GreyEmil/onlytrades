<?php 
session_start();
if(isset($_SESSION) )echo 1; else echo 0;
?>