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
<form method='post' enctype="multipart/form-data" id="form">
      
      <div class='field'>
         Product Name<br>
        <input type='text' name='namep' id='name'>
        <p id="errormsg"></p>
      </div>
      
      <div class='field'>
      Price<br>
      <input type="text" name='price' id='price'>OTP
      <p id="errormsg"></p>
      </div>
      
      <div class='field'>
        Quantity<br>
        <input type="text" name='quantity' id='quantity'>
        <p id="errormsg"></p>
        </div>
        <div class='field'>
            Image of the product<br><br>
            <input type="file" name='file' id='file'>
            <p id="errormsg"></p>
            </div>
            <div class='field'>
         Description<br>
         <textarea name="description" id="description"></textarea>
         <p id="errormsg"></p>
      </div>
      
      <br>
      <br>
      <div class="containeradd">
        <div class="btn"><input type="submit" name='add' value="ADD"></div>
        <div class="btn"><a href="backendmerch.php"><input type="reset" value="CANCEL"></a></div>
      </div> 
 </form>
 </div>
<?php
require '../controller/merch.php';
error_reporting(E_ERROR | E_PARSE);
$img=$_FILES['file'];
if (isset($_POST['add'])) 
{
        $merch = new merch;
        $merch->add($_POST,$_FILES['file']);
       header('location:backendmerch.php');
}
?>
<!-- <script src="js/addshop.js"></script> -->
</body>
</html>