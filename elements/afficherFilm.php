<?php
	include("../connexion.php");

	if (isset($_SESSION['rechercheFilm']))
		$resultat = mysqli_query($bdd, $_SESSION['rechercheFilm']);
	else
		$resultat = mysqli_query($bdd, "SELECT * FROM film");
	
	while($donnees = mysqli_fetch_array($resultat))
	{
		$empQuery = "SELECT * FROM emplacement WHERE id_emplacement = '$donnees[id_emplacement]'";
		$result = $bdd->query($empQuery);
		$row = $result->fetch_row();
	
		?>
		<tr class="pop">
			<td class="hide"><?php echo $donnees['id_film']; ?></td>
			<td><?php echo utf8_encode($donnees['nom_film']); ?></td>
			<td><?php echo utf8_encode($donnees['realisateur_film']); ?></td>
			<td><?php echo utf8_encode($row[1]); ?></td>
			<td class="hide"><?php echo utf8_encode($donnees['sommaire_film']); ?></td>
			<td class="hide"><?php echo utf8_encode($donnees['note_film']); ?></td>
			<td class="hide"><?php echo utf8_encode($row[0]); ?></td>
		</tr>
		<?php
	}
	
	mysqli_close($bdd);
	
	if(isset($_SESSION['rechercheFilm']))
		unset($_SESSION['rechercheFilm']);
?>