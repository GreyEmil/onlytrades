<?php 
session_start();
include '../controller/merch.php';
require_once 'dompdf/autoload.inc.php'; 
require 'vendor/autoload.php';
use Dompdf\Dompdf; 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$id=$_SESSION["user"]["id"];
$nopoints=0;
  $db=config::getConnexion();
     $sql="Select * from user where id='$id'";
     $fetch=$db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
     $points=$fetch[0]['points'];
     if(isset($_POST["check"]))
     {
      if($points>=$_POST["check"])
      {
    echo ("enough");
      }
    die;
     }
     $total=$_POST['total'];
        $checkout=new commande;
        $checkout->addcheckout($id,$total,$points);
        $pdf1 = $checkout->pdf1($id);
        $pdf2 = $checkout->pdf2($id);
        $length = count($pdf2);
        $prod='';
        $qt=0;
        for($i=0;$i<$length;$i++)
        {
         $prod.='<td>'.$pdf2[$i][0].'</td>
          <td>'.$pdf2[$i][1].' OTP</td>
          <td>'.$pdf2[$i][2].'</td>
          <td>'.$pdf2[$i][2]*$pdf2[$i][1].'</td>
        </tr>';
        $qt=$qt+$pdf2[$i][2];
        }
        $path = 'img/logo.png';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        $path2 = 'img/favicon.png';
        $type2 = pathinfo($path2, PATHINFO_EXTENSION);
        $data2 = file_get_contents($path2);
        $base644 = 'data:image/' . $type2 . ';base64,' . base64_encode($data2);
        $dompdf = new Dompdf(['chroot' => __DIR__]);

  $html = '<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" media="screen" href="pdf.css" />
      <title>Onlytrades</title>
      <body><div class="main">
      <table class="table">
      <tr>
      <td class="img">
          <img src="'.$base64.'" alt="" >
          </td>
          <td class="top_right" class="alnright">
          <h1>INVOICE</h1>
          <p>'.$pdf1[3].'</p>
          <p>#IN00'.$pdf1[7].'</p>
          </td>
          </tr>
          </table>
  <div class="mid">
  <table class="center">
  <tr>
  <td class="livraison">
          <h1>Delivery address</h1>
          <p>'.$pdf1[1].' '.$pdf1[0].'</p>
          <p>'.$pdf1[4].'</p>
          <p>'.$pdf1[5].'</p>
          <p>'.$pdf1[6].'</p>
      </td>
      <td class="facture">
          <h1>Invoice address</h1>
          <p>'.$pdf1[1].' '.$pdf1[0].'</p>
          <p>'.$pdf1[4].'</p>
          <p>'.$pdf1[5].'</p>
          <p>'.$pdf1[6].'</p>
          </td>
          </tr>
          </table>
        </div>
  <div class="bot">
      <div class="fact">
          <table>
              <tr>
                <th>Invoice number</th>
                <th>bill date</th>
                <th>Order reference</th>
                <th>date of the order</th>
              </tr>
              <tr>
                <td>#IN00'.$pdf1[7].'</td>
                <td>'.$pdf1[3].'</td>
                <td>'.$pdf1[7].'</td>
                <td>'.$pdf1[3].'</td>
              </tr>
            </table>
      </div>
      <div class="produit">
          <table>
              <tr>
                <th>product</th>
                <th>unit price</th>
                <th>qty</th>
                <th>total</th>
              </tr>
              <tr>'.$prod.'
            </table>
      </div>
      </div>
      <div class="adc">
        <table class="right">
          <tr>
              <td class="vert">Total products</td>
              <td>'.$qt.'</td>
          </tr>
          <tr>
              <td class="vert">shipping cost</td>
              <td>free</td>
          </tr>
          <tr>
              <td class="vert">total</td>
              <td>'.$pdf1[2].'</td>
          </tr>
        </table>  
        </div>
        </div>
  </div></body></html>';
$dompdf->loadHtml($html); 
$dompdf->setPaper('A4','portrait'); 
$dompdf->render();
$pdf=$dompdf->output();
  $namepdf="#IN00".$pdf1[7];
$user_email = $checkout->email($id);
$mail = new PHPMailer(true);
$mail->AddEmbeddedImage('img/favicon.png', 'my-image');
$body='<html><body><center><a href="http://localhost/onlytrades/view/index.php"><img src="cid:my-image" width="100" height="100"></a>
</center>
<p><hr NOSHADE></p>
<center><h1>Hello '.$pdf1[1].' '.$pdf1[0].'</h1></center>
<center><h3>Congratulation for buying a product from our merch with your OTP</h3></center>
<p><hr NOSHADE></p></body></html>
<a href="http://localhost/onlytrades/view/index.php">OnlyTrades</a>
';
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username = 'only.trades.tn@gmail.com'; //SMTP username
    $mail->Password = 'hbebdhacbzaamzoi'; //SMTP password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;                                 //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
     $mail->setFrom('only.trades.tn@gmail.com','OnlyTrades');
     $mail->addAddress($user_email);
     $mail->addStringAttachment($pdf, $namepdf.'.pdf');       //Name is optional

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = '[OnlyTrades]Order Invoice';
    $mail->Body    = $body;
    $mail->AltBody = '';

    $mail->send();
?>