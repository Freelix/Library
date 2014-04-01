<?php
	session_start();
	if (!empty($_POST['emplacementDropDown'])){
		include("../connexion.php");
		
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
			header("Location: ../views/listeEmplacements.php");
			exit(1);
		}
		
		$result2 = $bdd->query($attacheAFilm);
		$row2 = $result2->fetch_row();
		
		if($row2[0] != 0){
			$_SESSION['message'] = "Cet emplacement est utilisé pour un film, vous ne pouvez pas le supprimer.";
			$_SESSION['validDelete'] = false;
			mysqli_close($bdd);
			header("Location: ../views/listeEmplacements.php");
			exit(1);
		}
		
		$_SESSION['message'] = "L'emplacement a bien été supprimé.";	
		$_SESSION['validDelete'] = true;
		
		$query = "DELETE FROM emplacement WHERE
			id_emplacement = '$_POST[emplacementDropDown]'";
		
		mysqli_query($bdd, $query);
		mysqli_close($bdd);
	}
	
	header("Location: ../views/listeEmplacements.php");
?>