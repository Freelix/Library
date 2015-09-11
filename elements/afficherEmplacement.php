<?php
	include("../connexion.php");
	
	$resultat = mysqli_query($bdd, "SELECT * FROM emplacement");
?>
	<select id="emplacementDropDown" name="emplacementDropDown" class="textPop">
<?php
	$array = [];

	while($donnees = mysqli_fetch_array($resultat))
	{
		$array[] = $donnees['image_emplacement'];
?>
		<option value="<?php echo $donnees['id_emplacement']; ?>"> <?php echo htmlspecialchars_decode($donnees['nom_emplacement']); ?> </option>
<?php
	}
?>	
</select>

<ul id="ulEmplacement" style="display: none;">
<?php
    foreach (array_values($array) as $i => $value) {
?>
		<li value="<?php echo $i; ?>"><?php echo $value; ?></li>
<?php
	}
?>
</ul>

<?php
	mysqli_close($bdd);
?>