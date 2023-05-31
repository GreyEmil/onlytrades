<?php
require_once '../controller/config.php';

class merchModel{

    public static function getMerch()
    {
        $db=config::getConnexion();
        $req=$db->prepare("SELECT * FROM merch");
        $req->execute(array());
        return $req->fetchAll();
    }
}