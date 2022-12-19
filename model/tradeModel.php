<?php
require_once "../controller/config.php";
session_start();

class tradeModel{

    public static function addTrade($trade,$images)
    {
        
        $db=config::getConnexion();
        $req=$db->prepare("INSERT INTO trade (name,description,category,creation_date,status,type,id_user) VALUES(?,?,?,?,?,?,?)");
        $req->execute(array($trade["name"],$trade["description"],$trade["category"],date('Y-m-d H:i:s'),"AWAITING APPROVAL",$trade["type"],$_SESSION["user"]["id"]));
        $id=$db->lastInsertId();
        for($i=0;$i<count($images["image1"]["name"]);$i++)
        {
        $req=$db->prepare("INSERT INTO tradeimg (bin,id_trade) VALUES(?,?)");
        $req->execute(array(file_get_contents($images["image1"]["tmp_name"][$i]),$id));
        }
        return $id;
        
    }

    public static function getTrades()
    {
        $db=config::getConnexion();
        $req=$db->prepare("SELECT * FROM trade ");
        $req->execute(array());
        $trades=$req->fetchAll();
        $req=$db->prepare("SELECT username FROM user where id=?");
        $img=$db->prepare("SELECT bin FROM tradeimg where id_trade=? ");
        for($i=0;$i<count($trades);$i++)
        {
            $req->execute(array($trades[$i]["id_user"]));
            $trades[$i]["user"]=$req->fetchAll()[0];
            $img->execute(array($trades[$i]["id"]));
            $trades[$i]["image"]=base64_encode($img->fetchAll()[0]["bin"]);
        }
        return $trades;
    }

    public static function updateTradeStatus($info){
        $db=config::getConnexion();
        $req=$db->prepare("UPDATE trade SET status=? where id=?");
        $req->execute(array($info["status"],$info["id"]));
    }

    public static function getTrade($id){
        $db=config::getConnexion();
        $req=$db->prepare("SELECT * FROM trade where id=?");
        $req->execute(array($id));
        $trade=$req->fetchAll()[0];
        $req=$db->prepare("SELECT username FROM user where id=?");
        $img=$db->prepare("SELECT bin FROM tradeimg where id_trade=? ");
        $req->execute(array($trade["id_user"]));
        $trade["user"]=$req->fetchAll()[0];
        $img->execute(array($trade["id"]));
        $images=$img->fetchAll();
        for($i=0;$i<count($images);$i++)
        $trade["images"][$i]=base64_encode($images[$i]["bin"]);
    
        return $trade;

    }

    public static function addOffer($idTrade,$idOfferedTrade)
    {
        $db=config::getConnexion();
        $req=$db->prepare("INSERT INTO offer (id_trade,id_offered_trade,chosen) VALUES(?,?,?)");
        $req->execute(array($idTrade,$idOfferedTrade,0));
    }


    public static function getMyTrades($id)
    {
        $db=config::getConnexion();
        $req=$db->prepare("SELECT * FROM trade where id_user=?");
        $req->execute(array($id));
        $trades=$req->fetchAll();
        $img=$db->prepare("SELECT bin FROM tradeimg where id_trade=? ");
        for($i=0;$i<count($trades);$i++)
        {
        $req=$db->prepare("SELECT id FROM offer where id_trade=?");
        $req->execute(array($trades[$i]["id"]));
        $trades[$i]["offersNumber"]=$req->rowCount();
        $img->execute(array($trades[$i]["id"]));
        $trades[$i]["image"]=base64_encode($img->fetchAll()[0]["bin"]);
        
        }
        return $trades;
    }

    public static function getOffers($idTrade)
    {
        $db=config::getConnexion();
        $req=$db->prepare("SELECT * FROM offer where id_trade=?");
        $req->execute(array($idTrade));
        $offers=$req->fetchAll();
        $req=$db->prepare("SELECT * FROM trade where id=? ");
        $i=0;
        foreach($offers AS $offer)
        {
            
            $offersdata[$i]=tradeModel::getTrade($offer["id_offered_trade"]);
            $i++;
        }
         if(isset($offersdata)) return $offersdata;
        
    }

    public static function acceptOffer($id)
    {
        $db=config::getConnexion();
        $req=$db->prepare("UPDATE offer SET chosen=? where id_offered_trade=?");
        $req->execute(array(1,$id));
        $req=$db->prepare("SELECT * FROM offer where id_offered_trade=?");
        $req->execute(array($id));
        $trade=$req->fetchAll()[0];

        $req=$db->prepare("SELECT id_user FROM trade where id=?");
        $req->execute(array($trade["id_trade"]));
        $u1=$req->fetchAll()[0];
        $req->execute(array($trade["id_offered_trade"]));
        $u2=$req->fetchAll()[0];

        $req=$db->prepare("UPDATE user SET points=points+? WHERE id=?");
        $req->execute(array(30000,$u1["id_user"]));
        $req->execute(array(30000,$u2["id_user"]));

        
        $req=$db->prepare("SELECT * FROM offer WHERE chosen=? AND id_trade=?");
        $req->execute(array(0,$trade["id_trade"]));
        $offers=$req->fetchAll();
        $req=$db->prepare("DELETE FROM trade WHERE  id=?");
        foreach($offers AS $offer)
        {
            $req->execute(array($offer["id_offered_trade"]));
        }

        $req=$db->prepare("DELETE FROM offer WHERE chosen=? AND id_trade=?");
        $req->execute(array(0,$trade["id_trade"]));

        $req=$db->prepare("UPDATE trade SET status=? WHERE id=?");
        $req->execute(array("DONE",$trade["id_trade"]));

        $req=$db->prepare("UPDATE trade SET status=? WHERE id=?");
        $req->execute(array("ACCEPTED",$id));

        $req=$db->prepare("SELECT points FROM user  WHERE id=?");
        $req->execute(array($_SESSION["user"]["id"]));
        $_SESSION["user"]["points"]=$req->fetchAll()[0]["points"];


    }

    public static function getMyDoneTrades($id)
    {
        $db=config::getConnexion();
        $req=$db->prepare("SELECT * FROM trade WHERE id_user=? AND ( status=? OR status=? )");
        $req->execute(array($id,"DONE","ACCEPTED"));
        $trades=$req->fetchAll();
        $i=0;
        $req=$db->prepare("SELECT * FROM offer WHERE id_trade=? OR id_offered_trade=?");
        foreach($trades AS $trade)
        {
            $req->execute(array($trade["id"],$trade["id"]));
            $offer=$req->fetchAll()[0];
            $doneTrades[$i]["side1"]=tradeModel::getTrade($offer["id_trade"]);
            $doneTrades[$i]["side2"]=tradeModel::getTrade($offer["id_offered_trade"]);
            $i++;
            
        }
        return $doneTrades;

    }
    

    public static function getStatistics()
    {
        $db=config::getConnexion();
        $req=$db->prepare("SELECT id FROM trade WHERE status=?");
        $req->execute(array("AWAITING APPROVAL"));
        $statistics["awaitingApproval"]=$req->rowCount();
        $req->execute(array("APPROVED"));
        $statistics["approved"]=$req->rowCount();
        $req->execute(array("REJECTED"));
        $statistics["rejected"]=$req->rowCount();
        $req=$db->prepare("SELECT id FROM trade WHERE status=? OR status=?");
        $req->execute(array("DONE","ACCEPTED"));
        $statistics["closed"]=$req->rowCount();
        return $statistics;
        
    }
    

   
}