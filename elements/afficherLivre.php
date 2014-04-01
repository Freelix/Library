<?php
	include("../connexion.php");

	if (isset($_SESSION['rechercheLivre']))
		$resultat = mysqli_query($bdd, $_SESSION['rechercheLivre']);
	else
		$resultat = mysqli_query($bdd, "SELECT * FROM livre");
	
	while($donnees = mysqli_fetch_array($resultat))
	{
		$empQuery = "SELECT * FROM emplacement WHERE id_emplacement = '$donnees[id_emplacement]'";
		$result = $bdd->query($empQuery);
		$row = $result->fetch_row();
	
		?>
		<tr class="pop">
			<td class="hide"><?php echo $donnees['id_livre']; ?></td>
			<td><?php echo utf8_encode($donnees['nom_livre']); ?></td>
			<td><?php echo utf8_encode($donnees['auteur_livre']); ?></td>
			<td><?php echo utf8_encode($row[1]); ?></td>
			<td class="hide"><?php echo utf8_encode($donnees['editeur_livre']); ?></td>
			<td class="hide"><?php echo utf8_encode($donnees['sommaire_livre']); ?></td>
			<td class="hide"><?php echo utf8_encode($donnees['note_livre']); ?></td>
			<td class="hide"><?php echo utf8_encode($row[0]); ?></td>
		</tr>		
		<?php
	}
	
	mysqli_close($bdd);
	
	if(isset($_SESSION['rechercheLivre']))
		unset($_SESSION['rechercheLivre']);
?>