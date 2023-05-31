<?php
require_once '../controller/config.php';
class report
{
    public static function makeReport($report)
    {
        $db=config::getConnexion();
        $req=$db->prepare("SELECT id FROM user where username=?");
        $req->execute(array($report["username"]));
        $id=$req->fetchAll()[0]["id"];
        if($report["id_comment"]=="")
        {
        $req=$db->prepare("INSERT INTO report (id_reporter,id_reported,message,id_thread,type) VALUES(?,?,?,?,?)");
        $req->execute(array($report["id_reporter"],$id,$report["message"],$report["id_thread"],$report["type"]));
        }
        else{
            $req=$db->prepare("INSERT INTO report (id_reporter,id_reported,message,id_thread,type,id_comment) VALUES(?,?,?,?,?,?)");
            $req->execute(array($report["id_reporter"],$id,$report["message"],$report["id_thread"],$report["type"],$report["id_comment"]));
        }
    }

    public static function fetchReports()
    {
        $db=config::getConnexion();
        $req=$db->prepare("SELECT * FROM report ");
        $req->execute(array());
        $temp=$req->fetchAll();
        $i=0;
        $reporter=$db->prepare("SELECT id,username,first_name,last_name FROM user where id=?");
        $reported=$db->prepare("SELECT id,username,first_name,last_name FROM user where id=?");
        foreach($temp AS $report)
        {       
            $reporter->execute(array($report["id_reporter"]));
            $reported->execute(array($report["id_reported"]));
            $reports[$i]["id"]=$report["id"];
            $reports[$i]["reporter"]=$reporter->fetchAll()[0];
            $reports[$i]["reported"]=$reported->fetchAll()[0];
            $reports[$i]["threadId"]=$report["id_thread"];
            $reports[$i]["message"]=$report["message"];
            $reports[$i]["type"]=$report["type"];
            $reports[$i]["action"]=$report["action"];

            if($report["type"]==0)
            {
                $reports[$i]["commentId"]=$report["id_comment"];
            }
            $i++;
        }
        return $reports;
    }

    public static function removeComment($id,$idrep,$action)
    {
        $db=config::getConnexion();
        $req=$db->prepare("DELETE  FROM comment where id=? ");
        $req->execute(array($id));
        $req=$db->prepare("select action from  report where id=?");
        $req->execute(array($idrep));
        $r=$req->fetchAll()[0]["action"];
        $req=$db->prepare("UPDATE report set action=? where id=? ");
        if($r=='banned')
        {
        return "removed-banned";
        $req->execute(array("removed-banned",$idrep));
        }
        else
        $req->execute(array($action,$idrep));
        return "removed";
        

    }
    public static function removeThread($id,$idrep,$action)
    {
        $db=config::getConnexion();
        $req=$db->prepare("DELETE  FROM thread where id=? ");
        $req->execute(array($id));
        $req=$db->prepare("select action from  report where id=?");
        $req->execute(array($idrep));
        $r=$req->fetchAll()[0]["action"];
        $req=$db->prepare("UPDATE report set action=? where id=? ");
        if($r=='banned')
        {
        return "removed-banned";
        $req->execute(array("removed-banned",$idrep));
        }
        else
        $req->execute(array($action,$idrep));
        return "removed";

        
        

    }
    public static function ban($id,$idrep,$action)
    {
        $db=config::getConnexion();
        $req=$db->prepare("UPDATE user SET  isBanned=? where id=?");
        $req->execute(array(1,$id));
        $req=$db->prepare("select action from  report where id=?");
        $req->execute(array($idrep));
        $r=$req->fetchAll()[0]["action"];
        $req=$db->prepare("UPDATE report set action=? where id=? ");
        if($r=='removed')
        {
        $req->execute(array("removed-banned",$idrep));
        return "removed-banned";
        }
        else
        $req->execute(array($action,$idrep));
        return "banned";
    }
    
}