<?php
	include("../connexion.php");

	if (empty($_GET['id']))
	{
		header("Location: ../views/listeFilms.php");
		exit();
	}
	
	$query = "DELETE FROM film WHERE
		id_film = '$_GET[id]'";
	
	mysqli_query($bdd, $query);

	mysqli_close($bdd);
	
	header("Location: ../views/listeFilms.php");
?>