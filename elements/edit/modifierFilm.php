<?php
	session_start();
	$root = $_SERVER['DOCUMENT_ROOT'] . "/Library/";
    include($root . "Utils/database/connexion.php");
	
	if (empty($_POST['idFilmPop']) OR empty($_POST['nomFilmPop']) OR empty($_POST['realFilmPop']) OR empty($_POST['emplacementDropDown']))
	{
		header("Location: /Library/views/listeFilms.php");
		exit();
	}
	
	$nFilm = htmlspecialchars($_POST['nomFilmPop'], ENT_QUOTES);
	$autFilm = htmlspecialchars($_POST['realFilmPop'], ENT_QUOTES);
	$empFilm = htmlspecialchars($_POST['emplacementDropDown'], ENT_QUOTES);
	$sommFilm = htmlspecialchars($_POST['sommaireFilmPop'], ENT_QUOTES);
	$noteFilm = htmlspecialchars($_POST['noteFilmPop'], ENT_QUOTES);
	
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
	
	header("Location: /Library/views/listeFilms.php");
?>