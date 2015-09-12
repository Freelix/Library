<?php
	session_start();
	$queryDebut = "SELECT * FROM livre INNER JOIN emplacement ON livre.id_emplacement = emplacement.id_emplacement";
	$query = $queryDebut;
	
	if (!empty($_POST['nomLivre'])){
		$query .= " WHERE UPPER(livre.nom_livre) LIKE UPPER('%" . $_POST['nomLivre'] . "%')";
	}
	
	if (!empty($_POST['auteurLivre'])){
		if ($query == $queryDebut){
			$query .= " WHERE UPPER(livre.auteur_livre) LIKE UPPER('%" . $_POST['auteurLivre'] . "%')";
		}
		else{
			$query .= " AND UPPER(livre.auteur_livre) LIKE UPPER('%" . $_POST['auteurLivre'] . "%')";
		}		
	}
	
	if (!empty($_POST['emplacementLivre'])){
		if ($query == $queryDebut){
			$query .= " WHERE UPPER(emplacement.nom_emplacement) LIKE UPPER('%" . $_POST['emplacementLivre'] . "%')";
		}
		else{
			$query .= " AND UPPER(emplacement.nom_emplacement) LIKE UPPER('%" . $_POST['emplacementLivre'] . "%')";
		}		
	}

	$_SESSION['rechercheLivre'] = $query;
	header("Location: /Library/views/listeFilms.php");
?>