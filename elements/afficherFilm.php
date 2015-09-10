<?php
	include("../connexion.php");

	$pageNumber = 0;
    $customQuery = "";
    $query = "";

    if (!empty($_POST["data"]))
	    $pageNumber = $_POST["data"];

	if (!empty($_POST["cq"]))
		$_SESSION['rechercheFilm'] = $_POST["cq"];

	if (isset($_SESSION['rechercheFilm']) && strlen($_SESSION["rechercheFilm"]) > 4) // customQuery.length = 4)
	{
		$customQuery = $_SESSION["rechercheFilm"];
		$_SESSION["rechercheFilm"] = $_SESSION["rechercheFilm"] . " ORDER BY nom_film LIMIT " . $pageNumber . ", 5";
		$query = $_SESSION['rechercheFilm'];
		$resultat = mysqli_query($bdd, $query);	
	}
	else
	{
		$query = "SELECT * FROM film ORDER BY nom_film LIMIT " . $pageNumber . ", 5";
		$resultat = mysqli_query($bdd, $query);
	}
	
	while($donnees = mysqli_fetch_array($resultat))
	{
		$empQuery = "SELECT * FROM emplacement WHERE id_emplacement = '$donnees[id_emplacement]'";
		$result = $bdd->query($empQuery);
		$row = $result->fetch_row();
		$allRows[] = $donnees;	
		?>
		<tr class="pop">
			<td class="hide"><?php echo $donnees['id_film']; ?></td>
			<td><?php echo htmlspecialchars(utf8_encode($donnees['nom_film'])); ?></td>
			<td><?php echo htmlspecialchars(utf8_encode($donnees['realisateur_film'])); ?></td>
			<td><?php echo htmlspecialchars(utf8_encode($row[1])); ?></td>
			<td class="hide"><?php echo htmlspecialchars(utf8_encode($donnees['sommaire_film'])); ?></td>
			<td class="hide"><?php echo htmlspecialchars(utf8_encode($donnees['note_film'])); ?></td>
			<td class="hide"><?php echo htmlspecialchars(utf8_encode($row[0])); ?></td>
		</tr>
		<script type='text/javascript' src="../js/popupFilm.js"></script>
		<?php
	}

	$arr = explode("LIMIT", $query, 2);
    $first = $arr[0];

    $resultat = mysqli_query($bdd, $first);
    $data = mysqli_num_rows($resultat);
	$numberOfRows = $data;

	?>

	<div id="customQuery" style="display: none;">
		<?php echo $customQuery ?>
	</div>

	<div id="hiddenNumberOfRows" style="display: none;">
		<?php echo $numberOfRows ?>
	</div>

	<?php
	
	mysqli_close($bdd);
	
	if(isset($_SESSION['rechercheFilm']))
		unset($_SESSION['rechercheFilm']);
?>

<script>
    var number = $("#hiddenNumberOfRows").html();
	$("#numberOfRows").html("Items trouvés : " + number);
</script>