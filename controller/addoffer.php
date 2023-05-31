<?php
require 'auction.php';
if(isset($_POST['getNumber']))
{
  echo auction::getParticipentsNumber($_POST['idAuction']);
}
else{
if(isset($_POST['idUser']))
echo auction::checkOfferExistance($_POST['idUser'],$_POST['idAuction']);
else
{
if(isset($_POST['forModification']))
{
  auction::modifyOffer($_POST,$_FILES["img_file"]);
}
else
auction::addoffer($_POST,$_FILES["img_file"]);
}
}

