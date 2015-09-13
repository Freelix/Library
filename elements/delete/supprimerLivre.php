<?php
    $root = $_SERVER['DOCUMENT_ROOT'] . "/Library/";
	include($root . "Utils/database/connexion.php");

	if (empty($_GET['id']))
	{
		header("Location: /Library/views/listeLivres.php");
		exit();
	}
	
	$query = "DELETE FROM livre WHERE
		id_livre = '$_GET[id]'";
	
	mysqli_query($bdd, $query);

	mysqli_close($bdd);
	
	header("Location: /Library/views/listeLivres.php");
?>