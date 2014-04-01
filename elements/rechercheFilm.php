<?php
	session_start();
	$queryDebut = "SELECT * FROM film INNER JOIN emplacement ON film.id_emplacement = emplacement.id_emplacement";
	$query = $queryDebut;
	
	if (!empty($_POST['nomFilm'])){
		$query .= " WHERE UPPER(nom_film) LIKE UPPER('%" . $_POST['nomFilm'] . "%')";
	}
	
	if (!empty($_POST['realisateurFilm'])){
		if ($query == $queryDebut){
			$query .= " WHERE UPPER(film.realisateur_film) LIKE UPPER('%" . $_POST['realisateurFilm'] . "%')";
		}
		else{
			$query .= " AND UPPER(film.realisateur_film) LIKE UPPER('%" . $_POST['realisateurFilm'] . "%')";
		}		
	}
	
	if (!empty($_POST['emplacementFilm'])){
		if ($query == $queryDebut){
			$query .= " WHERE UPPER(emplacement.nom_emplacement) LIKE UPPER('%" . $_POST['emplacementFilm'] . "%')";
		}
		else{
			$query .= " AND UPPER(emplacement.nom_emplacement) LIKE UPPER('%" . $_POST['emplacementFilm'] . "%')";
		}		
	}

	$_SESSION['rechercheFilm'] = $query;
	header("Location: ../views/listeFilms.php");
?>