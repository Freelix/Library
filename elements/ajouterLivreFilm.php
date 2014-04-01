<?php
	session_start();
	include("../connexion.php");
	
	if (empty($_POST['nomLivre']) OR empty($_POST['auteurLivre']) OR empty($_POST['emplacementDropDown']))
	{
		$_SESSION['message'] = "Le nom, l'auteur et l'emplacement doivent être renseignés.";
		
		$_SESSION['nomLivre'] = $_POST['nomLivre'];
		$_SESSION['nomAuteur'] = $_POST['auteurLivre'];
		$_SESSION['emplacement'] = $_POST['emplacementDropDown'];
		$_SESSION['editeur'] = $_POST['editeurLivre'];
		$_SESSION['sommaire'] = $_POST['sommaireLivre'];
		$_SESSION['note'] = $_POST['noteLivre'];
		
		header("Location: ../views/ajouterFilmOuLivre.php");
		exit();
	}
	
	$nLivre = utf8_decode($_POST['nomLivre']);
	$autLivre = utf8_decode($_POST['auteurLivre']);
	$empLivre = utf8_decode($_POST['emplacementDropDown']);
	$editLivre = utf8_decode($_POST['editeurLivre']);
	$sommLivre = utf8_decode($_POST['sommaireLivre']);
	$noteLivre = utf8_decode($_POST['noteLivre']);
	
	$nLivre = str_replace("'", "''", $nLivre);
	$autLivre = str_replace("'", "''", $autLivre);
	$empLivre = str_replace("'", "''", $empLivre);
	$editLivre = str_replace("'", "''", $editLivre);
	$sommLivre = str_replace("'", "''", $sommLivre);
	$noteLivre = str_replace("'", "''", $noteLivre);
	
	if($_POST['LivreOrFilm'] == 'Livre')
	{	
		$query = "INSERT INTO livre(nom_livre, auteur_livre, id_emplacement, editeur_livre, sommaire_livre, note_livre) VALUES(
			'$nLivre', 
			'$autLivre', 
			'$empLivre',
			'$editLivre',
			'$sommLivre',
			'$noteLivre')";		
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
	
	echo $query;
	
	mysqli_query($bdd, $query);

	mysqli_close($bdd);
	
	if($_POST['LivreOrFilm'] == 'Livre')
		$_SESSION['message'] = "Le livre a bien été ajouté !";
	else
		$_SESSION['message'] = "Le film a bien été ajouté !";
		
	header("Location: ../views/ajouterFilmOuLivre.php");
?>