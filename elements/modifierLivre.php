<?php
	session_start();
	include("../connexion.php");
	
	if (empty($_POST['idLivrePop']) OR empty($_POST['nomLivrePop']) OR empty($_POST['auteurLivrePop']) OR empty($_POST['emplacementDropDown']))
	{
		header("Location: ../views/listeLivres.php");
		exit();
	}
	
	$nLivre = utf8_decode($_POST['nomLivrePop']);
	$autLivre = utf8_decode($_POST['auteurLivrePop']);
	$empLivre = utf8_decode($_POST['emplacementDropDown']);
	$editLivre = utf8_decode($_POST['editeurLivrePop']);
	$sommLivre = utf8_decode($_POST['sommaireLivrePop']);
	$noteLivre = utf8_decode($_POST['noteLivrePop']);
	
	$nLivre = str_replace("'", "''", $nLivre);
	$autLivre = str_replace("'", "''", $autLivre);
	$empLivre = str_replace("'", "''", $empLivre);
	$editLivre = str_replace("'", "''", $editLivre);
	$sommLivre = str_replace("'", "''", $sommLivre);
	$noteLivre = str_replace("'", "''", $noteLivre);
	
	$query = "UPDATE livre SET
		nom_livre = '$nLivre',
		auteur_livre = '$autLivre',
		id_emplacement = '$empLivre',
		editeur_livre = '$editLivre',
		sommaire_livre = '$sommLivre',
		note_livre = '$noteLivre'
		WHERE id_livre = '$_POST[idLivrePop]'";
	
	mysqli_query($bdd, $query);

	mysqli_close($bdd);
	
	header("Location: ../views/listeLivres.php");
?>