<?php
require_once '../model/auctionModel.php';
error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();



class auction
{
  public static function addAuction()
  {
    $id=auctionModel::addAuction($_SESSION["user"]["id"],$_POST,$_FILES);
    header("location: ../view/auctionView.php?idauc=$id");
  }

  public static function fetchAuction($id)
  {
    
    $data=auctionModel::fetchAuction($id);
    $_SESSION["temp"]=$data;
    header("location: ../view/auctionView.php");
  }

  public static function displayAllAuctions()
  {
    $auctions=auctionModel::fetchAllAuctions();
    $_SESSION["auctions"]=$auctions;
    
    header("location: ../view/auctions.php");
  }

  public static function displayOwnedAuctions()
  {
    $auctions=auctionModel::fetchOwnedAuctions();
    $_SESSION["auctions"]=$auctions;
    header("location: ../view/displayOwnedAuctionsView.php");

  }
  public static function deleteAuction($id)
  {
    auctionModel::deleteAuction($id);
    echo $id;
    header("location: ../controller/displayOwnedAuctions.php");

  }

  public static function displayAllAuctionsBE()
  {
    $auctions=auctionModel::fetchAllAuctions();
    if(!isset($_SESSION["lastChecked"])) $_SESSION["lastChecked"]=[];
    
    if(count($_SESSION["lastChecked"])!=count($auctions)) {$_SESSION["auctions"]=$auctions;$_SESSION["lastChecked"]=$auctions;$_SESSION["auctionTemp"]=$auctions;} else {if(empty($auctions)) $_SESSION["auctionTemp"]=[]; else $_SESSION["auctionTemp"]=NULL;}
    header("location: ../view/auctionsBE.php");
  }
  public static function deleteAuctionBE($id)
  {
    auctionModel::deleteAuction($id);
  }
  public static function addOffer($info,$image)
  {
    $img=file_get_contents($image["tmp_name"]);
    auctionModel::addOffer($info,$img);
    
  }

  public static function fetchBestOffer($idAuction)
  {
    return auctionModel::fetchBestOffer($idAuction);
  }
  public static function fetchOffers($idAuction)
  {
    return auctionModel::fetchOffers($idAuction);
  }
  public static function makeBestOffer($idOffer)
  {
    auctionModel::makeBestOffer($idOffer);
  }
  public static function removeOffer($idOffer)
  {
    auctionModel::removeOffer($idOffer);
  }
  public static function checkOfferExistance($idUser,$idAcution)
  {
    return auctionModel::checkOfferExistance($idUser,$idAcution);
  }
  public static function removeMyOffer($myId)
  {
    auctionModel::removeMyOffer($myId);
  }
  public static function getParticipentsNumber($id)
  {
    return auctionModel::getParticipentsNumber($id);
  }
  public static function modifyOffer($info,$image)
  {
    auctionModel::modifyOffer($info,$image);
  }
}



?>