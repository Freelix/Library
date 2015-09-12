<?php
	session_start();
	$root = $_SERVER['DOCUMENT_ROOT'] . "Library/";
    include($root . "Utils/database/connexion.php");
	
	if (empty($_POST['idLivrePop']) OR empty($_POST['nomLivrePop']) OR empty($_POST['auteurLivrePop']) OR empty($_POST['emplacementDropDown']))
	{
		header("Location: /Library/views/listeLivres.php");
		exit();
	}
	
	$nLivre = htmlspecialchars($_POST['nomLivrePop'], ENT_QUOTES);
	$autLivre = htmlspecialchars($_POST['auteurLivrePop'], ENT_QUOTES);
	$empLivre = htmlspecialchars($_POST['emplacementDropDown'], ENT_QUOTES);
	$editLivre = htmlspecialchars($_POST['editeurLivrePop'], ENT_QUOTES);
	$sommLivre = htmlspecialchars($_POST['sommaireLivrePop'], ENT_QUOTES);
	$noteLivre = htmlspecialchars($_POST['noteLivrePop'], ENT_QUOTES);
	$publishedDate = htmlspecialchars($_POST['publishedDatePop'], ENT_QUOTES);
	$pageCount = htmlspecialchars($_POST['pageCountPop'], ENT_QUOTES);
	
	$nLivre = str_replace("'", "''", $nLivre);
	$autLivre = str_replace("'", "''", $autLivre);
	$empLivre = str_replace("'", "''", $empLivre);
	$editLivre = str_replace("'", "''", $editLivre);
	$sommLivre = str_replace("'", "''", $sommLivre);
	$noteLivre = str_replace("'", "''", $noteLivre);
	$publishedDate = str_replace("'", "''", $publishedDate);
	$pageCount = str_replace("'", "''", $pageCount);
	
	$query = "UPDATE livre SET
		nom_livre = '$nLivre',
		auteur_livre = '$autLivre',
		id_emplacement = '$empLivre',
		editeur_livre = '$editLivre',
		sommaire_livre = '$sommLivre',
		note_livre = '$noteLivre',
		publishedDate = '$publishedDate',
		pageCount = '$pageCount'
		WHERE id_livre = '$_POST[idLivrePop]'";
	
	mysqli_query($bdd, $query);

	mysqli_close($bdd);
	
	header("Location: /Library/views/listeLivres.php");
?>