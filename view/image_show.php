
<?php
session_start();
require "../controller/config.php";


$db=config::getConnexion();

$req=$db->prepare("SELECT * FROM image WHERE id=17");
$req->setFetchMode(PDO::FETCH_ASSOC);
$req->execute(array());
$img=$req->fetchAll();
$img_file = $img[0]["path"];
// if (!file_exists('../tmp/image')) {
//   mkdir('../tmp/image', 0777, true);
//   if(!file_exists($img[0]["path"]))
//   {
//     file_put_contents($img_file, $img[0]["bin"]);
//   }
// }
//$path="src=".$img[0]["path"];
$_SESSION["img"]='data:image/jpeg;base64,'.base64_encode($img[0]["bin"]);
header('location:image.php');









?>