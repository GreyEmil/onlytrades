<?php
session_start();
require 'auction.php';
auction::fetchAuction($_GET["selectedAuction"]);