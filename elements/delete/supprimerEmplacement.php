<?php
	session_start();
	$root = $_SERVER['DOCUMENT_ROOT'] . "Library/";

	if (!empty($_POST['emplacementDropDown'])){
		include($root . "Utils/database/connexion.php");
		
		// Regardez s'il existe une relation avec le numéro d'emplacement dans livre ou film
		$attacheALivre = "SELECT emplacement.id_emplacement FROM emplacement, livre
			WHERE livre.id_emplacement = emplacement.id_emplacement AND 
			emplacement.id_emplacement = '$_POST[emplacementDropDown]'";
	
		$attacheAFilm = "SELECT emplacement.id_emplacement FROM emplacement, film
			WHERE film.id_emplacement = emplacement.id_emplacement AND 
			emplacement.id_emplacement = '$_POST[emplacementDropDown]'";
			
		$result = $bdd->query($attacheALivre);
		$row = $result->fetch_row();
		
		if ($row[0] != 0){
			$_SESSION['message'] = "Cet emplacement est utilisé pour un livre, vous ne pouvez pas le supprimer.";
			$_SESSION['validDelete'] = false;
			mysqli_close($bdd);
			header("Location: /Library/views/listeEmplacements.php");
			exit(1);
		}
		
		$result = $bdd->query($attacheAFilm);
		$row = $result->fetch_row();
		
		if($row[0] != 0){
			$_SESSION['message'] = "Cet emplacement est utilisé pour un film, vous ne pouvez pas le supprimer.";
			$_SESSION['validDelete'] = false;
			mysqli_close($bdd);
			header("Location: /Library/views/listeEmplacements.php");
			exit(1);
		}

		// Delete File
		$query = "SELECT image_emplacement FROM emplacement WHERE
			id_emplacement = '$_POST[emplacementDropDown]'";

	    $result = $bdd->query($query);
	    $row = $result->fetch_row();

	    if (!empty($row[0]))
	    	unlink($row[0]);
		
		// Delete Row
		$query = "DELETE FROM emplacement WHERE
			id_emplacement = '$_POST[emplacementDropDown]'";

        mysqli_query($bdd, $query);

        $_SESSION['message'] = "L'emplacement a bien été supprimé.";	
		$_SESSION['validDelete'] = true;
			
		mysqli_close($bdd);
	}
	
	header("Location: /Library/views/listeEmplacements.php");
?>