<?php
	include '../Controller/ReponseC.php';
	$reponseC=new ReponseC();
	$reponseC->supprimerreponse($_POST["id"]);
	header('Location:consulterreponse.php');
?>