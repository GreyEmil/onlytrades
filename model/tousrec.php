<?php
class Reclamation{
    private $type=null;
    private $date=null;
    private $description=null;
    private $mail=null;
    private $sujet=null;
public  function __construct($type,$date,$description,$sujet){
    
    $this->type=$type;
    $this->date=$date;
    $this->description=$description;
   // $this->mail=$mail;
    $this->sujet=$sujet;
}

public  function gettype(){
    return $this->type;
}
public  function getdate(){
    return $this->date;
}
public function getdescription(){
    return $this->description;
}
/*public  function getmail(){
    return $this->mail;
}*/
public  function getsujet(){
    return $this->sujet;
}
public  function settype(string $type){
    $this->type=$type;
}
public  function setdate(string $date){
    $this->date=$date;
}
public  function setdescription(string $description){
    $this->description=$description;
}
public  function setmail(string $mail){
    $this->mail=$mail;
}
public  function setsujet(string $sujet){
    $this->sujet=$sujet;
}
}
?>