<?php
	include("../connexion.php");

	if (empty($_GET['id']))
	{
		header("Location: ../views/listeLivres.php");
		exit();
	}
	
	$query = "DELETE FROM livre WHERE
		id_livre = '$_GET[id]'";
	
	mysqli_query($bdd, $query);

	mysqli_close($bdd);
	
	header("Location: ../views/listeLivres.php");
?>