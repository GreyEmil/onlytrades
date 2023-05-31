<?php
require 'configmerch.php';
class merch{
public $name;
public $price;
public $quantity;


public $file_name ;
		public $file_temp ;
		public $file_size ;
		public $file_type;
        public $location;

   public function add($info,$img)
    {   $name=$info['namep'];
        $price=$info['price'];
        $quantity=$info['quantity'];
        $file_name = $img['name'];
        $file_temp = $img['tmp_name'];
        $file_size = $img['size'];
        $location="upload/".$file_name;
        if($file_size < 5242880)
        {
			if(move_uploaded_file($file_temp, $location))
            {
                        
                        $db=config::getConnexion();
                        $sql = "INSERT INTO merch(name,price,quantity,img_url)
                          VALUES ('$name','$price','$quantity','$location')";
                          $db->query($sql);
            }
        }
    }
    public function affiche()
    {
        $db=config::getConnexion();
        $sql="Select * FROM merch";
       return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    public function delete($id)
    {
        $db=config::getConnexion();
        $sql="Delete FROM merch where id='$id'";
        $db->query($sql);
    }
}


?>