<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/css/styleadd.css">
    <title>MODIFY</title>
</head>
<body>
<div class='card-wrapper'>    
<form method='post' enctype="multipart/form-data">
      
      <div class='field'>
         New Name Product<br>
        <input type='text' name='namep' id='name'>
      </div>
      
      <div class='field'>
      New Price<br>
      <input type="text" name='price' id='price'>OTP
      </div>
      <div class='field'>
       New Quantity<br>
        <input type="text" name='quantity' id='quantity'>
        </div>
        <div class='field'>
            New Image of the product<br><br>
            <input type="file" name='file' id='file'>
            </div>
            <div class='field'>
         New Description<br>
         <textarea name="description" id="description"></textarea>
      </div>
      
      <br>
      <br>
      <div class="containeradd">
        <div class="btn"><input type="submit" name='Modify' value="MODIFY"></div>
        <div class="btn"><a href="backendmerch.php"><input type="reset" value="CANCEL"></a></div>
      </div> 
 </form>
 </div>
<?php
require '../controller/merch.php';
error_reporting(E_ERROR | E_PARSE);
if (isset($_POST['Modify'])) 
{
        $merch = new merch;
        $merch->modify($_GET['id'],$_POST,$_FILES['file']);
       header("location:../view/backendmerch.php");
}
?>
</body>
</html>