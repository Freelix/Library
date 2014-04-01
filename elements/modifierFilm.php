<?php
	session_start();
	include("../connexion.php");
	
	if (empty($_POST['idFilmPop']) OR empty($_POST['nomFilmPop']) OR empty($_POST['realFilmPop']) OR empty($_POST['emplacementDropDown']))
	{
		header("Location: ../views/listeFilms.php");
		exit();
	}
	
	$nFilm = utf8_decode($_POST['nomFilmPop']);
	$autFilm = utf8_decode($_POST['realFilmPop']);
	$empFilm = utf8_decode($_POST['emplacementDropDown']);
	$sommFilm = utf8_decode($_POST['sommaireFilmPop']);
	$noteFilm = utf8_decode($_POST['noteFilmPop']);
	
	$nFilm = str_replace("'", "''", $nFilm);
	$autFilm = str_replace("'", "''", $autFilm);
	$empFilm = str_replace("'", "''", $empFilm);
	$sommFilm = str_replace("'", "''", $sommFilm);
	$noteFilm = str_replace("'", "''", $noteFilm);
	
	$query = "UPDATE film SET
		nom_film = '$nFilm',
		realisateur_film = '$autFilm',
		id_emplacement = '$empFilm',
		sommaire_film = '$sommFilm',
		note_film = '$noteFilm'
		WHERE id_film = '$_POST[idFilmPop]'";
	
	mysqli_query($bdd, $query);

	mysqli_close($bdd);
	
	header("Location: ../views/listeFilms.php");
?>