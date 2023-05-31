<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleadd.css">
    <title>add</title>
</head>
<body>
<div class='card-wrapper'>    
<form method='post' enctype="multipart/form-data">
      
      <div class='field'>
         Name Product<br>
        <input type='text' name='namep' id='name'>
      </div>
      
      <div class='field'>
      Price<br>
      <input type="text" name='price' id='price'>OTP
      </div>
      <div class='field'>
        Quantity<br>
        <input type="text" name='quantity' id='quantity'>
        </div>
        <div class='field'>
            Image of the product<br><br>
            <input type="file" name='file' id='file'>
            </div>
      <br>
      <br>
      <div class="containeradd">
        <div class="btn"><input type="submit" name='add' value="ADD"></div>
        <div class="btn"><input type="submit" value="CANCEL"></div>
      </div> 
 </form>
 </div>
<?php
require '../controller/merch.php';
error_reporting(E_ERROR | E_PARSE);
$img=$_FILES['file'];
if (isset($_POST['add'])) 
{
if ($img['type']=='image/jpg' || $img['type']=='image/jpeg' || $img['type']=='image/png')
{
        $merch = new merch;
        $merch->add($_POST,$_FILES['file']);
       header('location:backendmerch.php');
}
else 
{
  echo("<div class='field'>your file is not an image</div>");
}
}
?>
</body>
</html>