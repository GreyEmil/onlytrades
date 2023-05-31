<?php
require_once '../controller/config.php';
class ticketModel{

    public static function submitTicket($info)
    {
        $db=config::getConnexion();
        if($info['username']!='')
        {
            $req=$db->prepare("INSERT INTO ticket (type,status,creation_date,content,subject,id_user,reported_user) VALUES(?,?,?,?,?,?,?)");
            $req->execute(array($info["type"],"in progress",date('Y-m-d H:i:s'),$info["content"],$info["subject"],$info["id"],$info['username']));
        }
        else
        {
        $req=$db->prepare("INSERT INTO ticket (type,status,creation_date,content,subject,id_user) VALUES(?,?,?,?,?,?)");
        $req->execute(array($info["type"],"OPEN",date('Y-m-d H:i:s'),$info["content"],$info["subject"],$info["id"]));
        }
        return $db->lastInsertId();
    }

    public static function getMyTickets()
    {
        $db=config::getConnexion();
        $req=$db->prepare("SELECT * FROM ticket where id_user=?");
        $req->execute(array($_SESSION["user"]["id"]));
        return $req->fetchAll();
        
    }
    public static function getTickets()
    {
        $db=config::getConnexion();
        $req=$db->prepare("SELECT * FROM ticket");
        $req->execute(array());
        return $req->fetchAll();
        
    }

    public static function getTicket($id)
    {
        $db=config::getConnexion();
        $req=$db->prepare("SELECT * FROM ticket where id=?");
        $req->execute(array($id));
        $data["request"]=$req->fetchAll()[0];
        $req=$db->prepare("SELECT username,photo,id FROM user where id=?");
        $req->execute(array($data["request"]["id_user"]));
        $data["request"]["user"]=$req->fetchAll()[0];
        $req=$db->prepare("SELECT * FROM response where id_ticket=?");
        $req->execute(array($id));
        $data["replies"]=$req->fetchAll();
        for($i=0;$i<count($data["replies"]);$i++)
        {
            $req=$db->prepare("SELECT username,photo FROM user where id=?");
            $req->execute(array($data["replies"][$i]["id_user"]));
            $data["replies"][$i]["user"]=$req->fetchAll()[0];
            
        }
        return $data;
    }

    public static function addReply($info)
    {
        $db=config::getConnexion();
        $req=$db->prepare("INSERT INTO response (id_user,id_ticket,content,reply_date) VALUES(?,?,?,?)");
        $req->execute(array($_SESSION["user"]["id"],$info['id_ticket'],$info["replyt"],date('Y-m-d H:i:s')));
    }
    public static function updateStatus($info)
    {
        $db=config::getConnexion();
        $req=$db->prepare("UPDATE ticket SET status=? where id=?");
        $req->execute(array($info["status"],$info['id_ticket']));
    }


    public static function getStatistics()
    {
        $db=config::getConnexion();
        $req=$db->prepare("SELECT id FROM ticket WHERE status=?");
        $req->execute(array("SOLVED"));
        $statistics["solved"]=$req->rowCount();

        $req->execute(array("AWAITING YOUR REPLY"));
        $statistics["awaitingReply"]=$req->rowCount();

        $req->execute(array("OPEN"));
        $statistics["open"]=$req->rowCount();

        return $statistics;
    }
    


}