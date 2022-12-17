<?php
	include '../Controller/ReclamationC.php';
	$reclamationC=new ReclamationC();
	$reclamationC->supprimerreclamation($_POST["id"]);
	header('Location:consulterreclamation.php');
?>