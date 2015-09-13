<?php
    $root = $_SERVER['DOCUMENT_ROOT'] . "/Library/";
	include($root . "Utils/database/connexion.php");

	$message = "";
	
	if (empty($_POST['nomLivre']) OR $_POST['auteurLivre'] == "" OR empty($_POST['emplacementDropDown']))
	{
        header("HTTP/1.0 406 Not Acceptable");
		$message = "Le nom, l'auteur et l'emplacement doivent être renseignés.";

		echo $message;
		exit();
	}
	
	$nLivre = htmlspecialchars($_POST['nomLivre'], ENT_QUOTES);
	$autLivre = htmlspecialchars($_POST['auteurLivre'], ENT_QUOTES);
	$empLivre = htmlspecialchars($_POST['emplacementDropDown'], ENT_QUOTES);
	$editLivre = htmlspecialchars($_POST['editeurLivre'], ENT_QUOTES);
	$sommLivre = htmlspecialchars($_POST['sommaireLivre'], ENT_QUOTES);
	$noteLivre = htmlspecialchars($_POST['noteLivre'], ENT_QUOTES);
	$publishedDate = htmlspecialchars($_POST['publishedDate'], ENT_QUOTES);
	$pageCount = htmlspecialchars($_POST['pageCount'], ENT_QUOTES);
	
	$nLivre = str_replace("'", "''", $nLivre);
	$autLivre = str_replace("'", "''", $autLivre);
	$empLivre = str_replace("'", "''", $empLivre);
	$editLivre = str_replace("'", "''", $editLivre);
	$sommLivre = str_replace("'", "''", $sommLivre);
	$noteLivre = str_replace("'", "''", $noteLivre);
	$publishedDate = str_replace("'", "''", $publishedDate);
	$pageCount = str_replace("'", "''", $pageCount);
	
	if($_POST['LivreOrFilm'] == 'Livre')
	{	
		$query = "INSERT INTO livre(nom_livre, auteur_livre, id_emplacement, editeur_livre, sommaire_livre, note_livre, publishedDate, pageCount) VALUES(
			'$nLivre', 
			'$autLivre', 
			'$empLivre',
			'$editLivre',
			'$sommLivre',
			'$noteLivre',
			'$publishedDate',
			'$pageCount')";		
	}
	else
	{
		$query = "INSERT INTO film(nom_film, realisateur_film, id_emplacement, sommaire_film, note_film) VALUES(
			'$nLivre', 
			'$autLivre', 
			'$empLivre',
			'$sommLivre',
			'$noteLivre')";
	}
	
	mysqli_query($bdd, $query);

	mysqli_close($bdd);
	
	if($_POST['LivreOrFilm'] == 'Livre')
		$message = "Le livre a bien été ajouté !";
	else
		$message = "Le film a bien été ajouté !";

	echo $message;
?>