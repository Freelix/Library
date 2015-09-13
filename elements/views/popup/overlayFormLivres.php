<form id="overlay_form" method="post" action="/Library/elements/edit/modifierLivre.php" style="display:none">
	<h2> Modifier ce livre</h2>
	<input type="text" class="textPopHidden" name="idLivrePop" id="idNoLiv" style="visibility: hidden"/><br/>
	
	<label class="labelPop">Titre: </label><br/>
	<input type="text" class="textPop" name="nomLivrePop" id="titreLiv"/><br/>
	
	<label class="labelPop">Auteur: </label><br/>
	<input type="text" class="textPop" name="auteurLivrePop" id="auteurLiv"/><br/>
	
	<label class="labelPop">Éditeur: </label><br/>
	<input type="text" class="textPop" name="editeurLivrePop" id="editeurLiv"/><br/>
	
	<label class="labelPop">Sommaire: </label><br/>
	<textarea class="textAreaPop" name="sommaireLivrePop" id ="sommaireLiv"></textarea><br/>
	
	<label class="labelPop">Notes: </label><br/>
	<textarea class="textAreaPop" name="noteLivrePop" id ="noteLiv"></textarea><br/>

	<label class="labelPop">Date publiée: </label><br/>
	<input type="text" class="textPop" name="publishedDatePop" id="publishedDateLiv"/><br/>

	<label class="labelPop">Nombre de pages: </label><br/>
	<input type="text" class="textPop" name="pageCountPop" id="pageCountLiv"/><br/>
	
	<label class="labelPop">Emplacement: </label><br/>
	<?php $root = $_SERVER['DOCUMENT_ROOT'] . "/Library/"; ?>
	<?php include($root . "elements/show/afficherEmplacement.php") ?><br/><br/>
	
	<input type="submit" class="buttonPop" value="Enregistrer" />
	<a href="#" id="closePop">Fermer</a>
	<a id="supprimerPop">Supprimer</a>
</form>