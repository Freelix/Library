<?php
	$root = $_SERVER['DOCUMENT_ROOT'] . "/Library/";
    include($root . "Utils/database/connexion.php");
	
	$pageLimit = 20; 
    $pageNumber = 0;
    $customQuery = "";
    $query = "";

    if (!empty($_POST["data"]))
	    $pageNumber = $_POST["data"];

	if (!empty($_POST["cq"]))
		$_SESSION['rechercheLivre'] = $_POST["cq"];

	if (isset($_SESSION['rechercheLivre']) && strlen($_SESSION["rechercheLivre"]) > 4) // customQuery.length = 4
	{
		$customQuery = $_SESSION["rechercheLivre"];
		$_SESSION["rechercheLivre"] = $_SESSION["rechercheLivre"] . " ORDER BY nom_livre LIMIT " . $pageNumber . ", " . $pageLimit;
		$query = $_SESSION['rechercheLivre'];
		$resultat = mysqli_query($bdd, $query);	
	}
	else
	{
		$query = "SELECT * FROM livre ORDER BY nom_livre LIMIT " . $pageNumber . ", " . $pageLimit;
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
			<td class="hide"><?php echo $donnees['id_livre']; ?></td>
			<td><?php echo htmlspecialchars_decode($donnees['nom_livre']); ?></td>
			<td><?php echo htmlspecialchars_decode($donnees['auteur_livre']); ?></td>
			<td><?php echo htmlspecialchars_decode($row[1]); ?></td>
			<td class="hide"><?php echo htmlspecialchars_decode($donnees['editeur_livre']); ?></td>
			<td class="hide"><?php echo htmlspecialchars_decode($donnees['sommaire_livre']); ?></td>
			<td class="hide"><?php echo htmlspecialchars_decode($donnees['note_livre']); ?></td>
			<td class="hide"><?php echo htmlspecialchars_decode($donnees['publishedDate']); ?></td>
			<td class="hide"><?php echo htmlspecialchars_decode($donnees['pageCount']); ?></td>
			<td class="hide"><?php echo htmlspecialchars_decode($row[0]); ?></td>
		</tr>
		<script type='text/javascript' src="/Library/Content/js/popup/popupLivre.js"></script>	
		<script type='text/javascript' src="/Library/Content/js/popup/popupBase.js"></script>	
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
	
	if(isset($_SESSION['rechercheLivre']))
		unset($_SESSION['rechercheLivre']);
?>

<script>
    var number = $("#hiddenNumberOfRows").html();
	$("#numberOfRows").html("Items trouvés : " + number);
</script>