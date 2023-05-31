
<?php
require_once "../controller/config.php";
session_start();
class auctionModel
{
  public static function  addAuction($id_owner,$auction,$images)
  {
    if(isset($auction["form_submit"]))
    {
    $db=config::getConnexion();
    $req=$db->prepare("INSERT INTO auction (id_owner,start_date)VALUES(?,?)");
    $req->execute(array($_SESSION["user"]["id"],$auction["add_date"]));
    $idauc=$db->lastInsertId();
    $req=$req=$db->prepare("INSERT INTO product (id_auction,name,description,add_date)VALUES(?,?,?,?)");
    $req->execute(array($idauc,$auction["name"],$auction["description"],date('Y-m-d H:i:s')));
    $id=$db->lastInsertId();
    $req=$db->prepare("INSERT INTO image (name,path,bin,id_product) VALUES (?,?,?,?) ");
    for($i=0;$i<count($images['img_file']['name']);$i++)
    {
    $name=rand(1,99999999).".jpeg";
    $path="../tmp/image/".$name;
    $req->execute(array($name,$path,file_get_contents($images["img_file"]["tmp_name"][$i]),$id));
    }
    
    $req=$db->prepare("INSERT INTO chat (id_auction) VALUES(?)");
    $req->execute(array($idauc));
    return $idauc;
    }
    
  }
  public static function fetchAuction($id)
  {
    $db=config::getConnexion();
    $req=$db->prepare("SELECT * FROM auction WHERE id=?");
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $req->execute(array($id));
    $temp=$req->fetchAll()[0];
    $data["id"]=$id;
    $data["startDate"]=$temp["start_date"];
    $data["duration"]=$temp["duration"];
    $req=$db->prepare("SELECT * FROM user WHERE id=?");
    $req->execute(array($temp["id_owner"]));
    $data["owner"]=$req->fetchAll()[0];
    
    $req=$db->prepare("SELECT * FROM product WHERE id_auction=? AND type=?");
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $req->execute(array($id,0));
    $temp=$req->fetchAll()[0];
    $proId=$temp["id"];
    $data["name"]=$temp["name"];
    $data["description"]=$temp["description"];
    $data["approved"]=$temp["approved"];
    $data["addDate"]=$temp["add_date"];
    
    $req=$db->prepare("SELECT * FROM image WHERE id_product=?");
    $req->execute(array($proId));
    $data["images"]=$req->fetchAll();
    for($i=0;$i<count($data["images"]);$i++)
    {
      $data["images"][$i]["bin"]=base64_encode($data["images"][$i]["bin"]);
    }
    return $data;
  }
  
  public static function fetchAllAuctions()
  {
    $data=  array();
    $db=config::getConnexion();
    $req=$db->prepare("SELECT * FROM auction ");
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $req->execute(array());
    $ownedAuctions=$req->fetchAll();
    for($i=0;$i<count($ownedAuctions);$i++)
    {
    $id=$ownedAuctions[$i]['id'];
    $req=$db->prepare("SELECT * FROM product WHERE id_auction=? AND type=?");
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $req->execute(array($id,0));
    $product=$req->fetchAll()[0];
    $id=$product["id"];
    $req=$db->prepare("SELECT * FROM image WHERE id_product=?");
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $req->execute(array($id));
    $images=$req->fetchAll();
    for($j=0;$j<count($images);$j++)
    {
      $images[$j]["bin"]=base64_encode($images[$j]["bin"]);
    }
    
      $data[$i]["id"]=$ownedAuctions[$i]["id"];
      $data[$i]["startDate"]=$ownedAuctions[$i]["start_date"];
      $data[$i]["duration"]=$ownedAuctions[$i]["duration"];
      $data[$i]["status"]=$ownedAuctions[$i]["status"];
      $data[$i]["name"]=$product["name"];
      $data[$i]["description"]=$product["description"];
      $data[$i]["approved"]=$product["approved"];
      $data[$i]["addDate"]=$product["add_date"];
      $data[$i]["images"]=$images;
      $req=$db->prepare("SELECT username,id FROM user WHERE id=? ");
      $req->execute(array($ownedAuctions[$i]["id_owner"]));
      $data[$i]["user"]=$req->fetchAll()[0];

    }
    return $data;

  }
  public static function fetchOwnedAuctions()
  {
    $logedIn=$_SESSION["user"]["id"];
    $data=  array();
    $db=config::getConnexion();
    $req=$db->prepare("SELECT * FROM auction WHERE id_owner=?");
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $req->execute(array($logedIn));
    $ownedAuctions=$req->fetchAll();
    for($i=0;$i<count($ownedAuctions);$i++)
    {
    $id=$ownedAuctions[$i]['id'];
    $req=$db->prepare("SELECT * FROM product WHERE id_auction=? AND type=?");
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $req->execute(array($id,0));
    $product=$req->fetchAll()[0];
    $id=$product["id"];
    $req=$db->prepare("SELECT * FROM image WHERE id_product=?");
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $req->execute(array($id));
    $images=$req->fetchAll();
    for($j=0;$j<count($images);$j++)
    {
      $images[$j]["bin"]=base64_encode($images[$j]["bin"]);
    }
    
      $data[$i]["id"]=$ownedAuctions[$i]["id"];
      $data[$i]["startDate"]=$ownedAuctions[$i]["start_date"];
      $data[$i]["duration"]=$ownedAuctions[$i]["duration"];
      $data[$i]["name"]=$product["name"];
      $data[$i]["description"]=$product["description"];
      $data[$i]["approved"]=$product["approved"];
      $data[$i]["addDate"]=$product["add_date"];
      $data[$i]["images"]=$images;
      
    
    }
    return $data;

  }
  public static function deleteAuction($id)
  {
    $db=config::getConnexion();
    $req=$db->prepare("DELETE FROM auction WHERE id=$id");
    $req->execute(array());
    

  }
  public static function notifyAuction()
  {
    $now= date('Y-m-d H:i:s');
    $range=strtotime($now)+300;
    $notifyRange=date('Y-m-d H:i:s',$range);
    $db=config::getConnexion();
    $req=$db->prepare("SELECT * FROM auction WHERE notified=? AND start_date BETWEEN ? AND ? ");
    $req->execute(array(0,$now,$notifyRange));
    $inRange=$req->fetchAll();
    if(!empty($inRange))
    {
    $req=$db->prepare("UPDATE auction SET notified=? WHERE id=?");
    $req->execute(array(1,$inRange[0]["id"]));
    return $inRange[0];
    }
  }

  public static function addOffer($info,$image)
  {
    $db=config::getConnexion();
    $req=$db->prepare("INSERT INTO product (name,description,type,add_date,id_auction) VALUES(?,?,?,?,?)");
    $req->execute(array($info["name"],$info["description"],1,date('Y-m-d'),$info["idAuction"]));
    $id=$db->lastInsertId();
    $req=$db->prepare("INSERT INTO image (bin,id_product) VALUES(?,?)");
    $req->execute(array($image,$id));
    $req=$db->prepare("INSERT INTO participate (id_product,id_auction,id_participent) VALUES(?,?,?)");
    $req->execute(array($id,$info["idAuction"],$info["idParticipent"]));
  }
  public static function fetchBestOffer($idAuc)
  {
    $db=config::getConnexion();
    $req=$db->prepare("SELECT * FROM participate WHERE best=? AND id_auction=?");
    $req->execute(array(1,$idAuc));
    $data=$req->fetchAll();
    if(count($data)==1)
    {
      $bestOffer=$data[0];
      $req=$db->prepare("SELECT * FROM user WHERE id=?");
      $req->execute(array($bestOffer["id_participent"]));
      $bestOfferer=$req->fetchAll()[0];
      $req=$db->prepare("SELECT * FROM product WHERE id=?");
      $req->execute(array($bestOffer["id_product"]));
      $bestProduct=$req->fetchAll()[0];
      $req=$db->prepare("SELECT bin FROM image WHERE id_product=?");
      $req->execute(array($bestOffer["id_product"]));
      $best["participent"]=$bestOfferer;
      $bestProduct["image"]=base64_encode($req->fetchAll()[0]['bin']);
      $best["offer"]=$bestProduct;
      
      return $best;
    }
    else return 'none';
  }
  public static function fetchOffers($idAuc)
  {
    $db=config::getConnexion();
    $req=$db->prepare("SELECT * FROM participate WHERE id_auction=?");
    $req->execute(array($idAuc));
    $data=$req->fetchAll();
    $i=0;
    if(count($data)>0)
    {
      foreach ($data AS $offer) {
        $req=$db->prepare("SELECT * FROM product WHERE id=?");
        $req->execute(array($offer["id_product"]));
        $tempOffer=$req->fetchAll()[0];
        $offers[$i]["offer"]=$tempOffer;
        $offers[$i]["offer"]['id_offer']=$offer["id"];
        $req=$db->prepare("SELECT * FROM image WHERE id_product=? ");
        $req->execute(array($offer["id_product"]));
        $offers[$i]["offer"]["image"]=base64_encode($req->fetchAll()[0]['bin']);
        $req=$db->prepare("SELECT * FROM user WHERE id=? ");
        $req->execute(array($offer["id_participent"]));
        $offers[$i]["participent"]=$req->fetchAll()[0]; 
        $i++; 
      }
      return $offers;
    }
    else return 'none';
  }

  public static function makeBestOffer($idOffer)
  {
    $db=config::getConnexion();
    $req=$db->prepare("UPDATE participate SET best=? where best=?");
    $req->execute(array(0,1));
    $req=$db->prepare("UPDATE participate SET best=? where id=?");
    $req->execute(array(1,$idOffer));
  }

  public static function removeOffer($idOffer)
  {
    $db=config::getConnexion();
    $req=$db->prepare("DELETE FROM participate where id=?");
    $req->execute(array($idOffer));
  }
  public static function checkOfferExistance($idUser,$idAuction)
  {
    $db=config::getConnexion();
    $req=$db->prepare("SELECT id from participate where id_participent=? AND id_auction=?");
    $req->execute(array($idUser,$idAuction));
    $offer=$req->fetchAll();
    if(count($offer)!=0)
    return "exist"; else return 'none';

  }
  public static function removeMyOffer($myId)
  {
    $db=config::getConnexion();
    $req=$db->prepare("DELETE FROM participate where id_participent=?");
    $req->execute(array($myId));
  }

  public static function getParticipentsNumber($id)
  {
    $db=config::getConnexion();
    $req=$db->prepare("SELECT id FROM participate where id_auction=?");
    $req->execute(array($id));
    return count($req->fetchAll());
  }
  public static function modifyOffer($info,$image)
  {
    $db=config::getConnexion();
    $req=$db->prepare("UPDATE product SET name=?,description=?  WHERE id_auction=? AND type=?");
    $req->execute(array($info["name"],$info["description"],$info["idAuction"],1));
    $req=$db->prepare("SELECT id FROM product  WHERE id_auction=? AND type=?");
    $req->execute(array($info["idAuction"],1));
    $id=$req->fetchAll()[0]['id'];

    $req=$db->prepare("UPDATE  image SET bin=? where id_product=? ");
    $req->execute(array(file_get_contents($image["tmp_name"]),$id));
    
  }


  public static function closeAuction($id,$duration)
  {
    $db=config::getConnexion();
    $req=$db->prepare("SELECT id FROM participate where id_auction=? AND best=?");
    $req->execute(array($id,1));
    $best=$req->fetchAll()[0];

    $req=$db->prepare("UPDATE auction SET status=? , id_winner=?, duration=? where id=? ");
    $req->execute(array("CLOSED",$best["id"],$duration,$id));
    
  }

  public static function checkIfClosed($id)
  {
    $db=config::getConnexion();
    $req=$db->prepare("SELECT status FROM auction where id=?");
    $req->execute(array($id));
    $status=$req->fetchAll()[0];
    if($status["status"]=="CLOSED")
    {
      return 1;
    }
    else return 0;


  }


  public static function getStatistics()
  {
    $db=config::getConnexion();
    $req=$db->prepare("SELECT duration FROM auction where duration<?");
    $req->execute(array(15));
    $statistics["<15"]=$req->rowCount();

    $req=$db->prepare("SELECT duration FROM auction where duration>? AND duration<?");
    $req->execute(array(15,30));
    $statistics[">15<30"]=$req->rowCount();

    $req=$db->prepare("SELECT duration FROM auction where duration>? AND duration<?");
    $req->execute(array(30,45));
    $statistics[">30<45"]=$req->rowCount();


    $req=$db->prepare("SELECT duration FROM auction where duration>?");
    $req->execute(array(45));
    $statistics[">45"]=$req->rowCount();

    return $statistics;
  }
  // public static function  modifyAuction($id_owner,$auction,$images)
  // {
  //   if(isset($auction["form_submit"]))
  //   {
  //   $db=config::getConnexion();
  //   $req=$req=$db->prepare(
  //     "INSERT INTO product (name,description,add_date,id_owner) VALUES (?,?,?,?) ;
  //     INSERT INTO auction (id_owner,add_date)VALUES(?,?)"
  //   );
  //   $req->execute(array($auction["name"],$auction["description"],$auction["add_date"],1,$id_owner,$auction["add_date"]));
  //   $id=$db->lastInsertId();
  //   $req=$db->prepare("INSERT INTO image (name,path,bin,product_id) VALUES (?,?,?,?) ");
  //   for($i=0;$i<count($images['img_file']['name']);$i++)
  //   {
  //   $name=rand(1,99999999).".jpeg";
  //   $path="../tmp/image/".$name;
  //   $req->execute(array($name,$path,file_get_contents($images["img_file"]["tmp_name"][$i]),$id));
  //   }
  //   return $id;
  //   }
  // }
}

  


?>