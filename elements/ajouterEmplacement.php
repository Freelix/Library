<?php
	session_start();
	if (!empty($_POST['nomEmplacement'])){
		include("../connexion.php");
		
		$emp = utf8_decode($_POST['nomEmplacement']);
		
		$emp = str_replace("'", "''", $emp);
		
		$queryCount = "SELECT COUNT(*) as nbr FROM emplacement
						WHERE nom_emplacement = '$emp'";
							
		$result = $bdd->query($queryCount);
		$row = $result->fetch_row();
		
		if($row[0] == 0){
			$query = "INSERT INTO emplacement(nom_emplacement) VALUES(
				'$emp')";

			mysqli_query($bdd, $query);
			$_SESSION['validAdd'] = true;
			$_SESSION['message'] = "L'emplacement '$_POST[nomEmplacement]' a bien été ajouté.";
		}
		else{
			$_SESSION['validAdd'] = false;
			$_SESSION['message'] = "Cet emplacement existe déjà. Vous ne pouvez pas le recréer.";
		}
		mysqli_close($bdd);
	}
	else{
		$_SESSION['message'] = "Vous devez saisir un emplacement avant d'ajouter.";
	}
	
	header("Location: ../views/listeEmplacements.php");
?>