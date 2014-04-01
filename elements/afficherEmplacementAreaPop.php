<?php
	include("../connexion.php");
	
	$resultat = mysqli_query($bdd, "SELECT * FROM emplacement");
	/*$empSelected = mysqli_query($bdd, "SELECT * FROM emplacement
		WHERE id_emplacement = ")*/
?>
	<select id="emplacementDropDown" name="emplacementDropDown" class="textPop">
<?php
	while($donnees = mysqli_fetch_array($resultat))
	{
?>
		<option value="<?php echo $donnees['id_emplacement']; ?>"> <?php echo utf8_encode($donnees['nom_emplacement']); ?> </option>
<?php
	}
?>	
</select>
<?php
	mysqli_close($bdd);
?>