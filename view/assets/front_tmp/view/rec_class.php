<?php
include "config.php";
class recla{

public $dt_inc ; 
public $name_c ;
public $prename_c ;
public $n_c ;
public $tlf ;
public $email_c ;
public $decription ;

public $img_name;
public $img_temp;
public $img_size;
public $img_type;
public $location;

public function add_rec($REC,$img){
  
    $dt_inc=$REC['dt_inc'];
    $name_c=$REC['name_c'];

    echo"<br>".$name_c;
    $prename_c=$REC['prename_c'];
    $n_c=$REC['n_c'];
    $tlf=$REC['tlf'];
    $email_c=$REC['email_c'];
    $decription=$REC['decription'];
    $img_name = $img['file']['name'];
        $img_temp = $img['file']['tmp_name'];
        $img_size = $img['file']['size'];
        $img_type = $img['file']['type'];
        $location="images_rec/".$img_name;
        if($img_size < 5242880)
        {
			if(move_uploaded_file($img_temp, $location))
            {
                        
                $confi=new config;
                $base=$confi->getConnexion();
                $sql="INSERT INTO imports(dt_inc,name_c,prename_c,n_c,tlf,email_c,decription,file) Values ('$dt_inc','$name_c','$prename_c','$n_c','$tlf','$email_c','$decription','$location') " ;
                 $base->query($sql);            
            }
        }
}
public function affiche()
    {
        $db=config::getConnexion();
        $sql="Select * FROM imports";
       return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

}



?>