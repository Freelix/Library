<form id="overlay_form" method="post" action="/Library/elements/edit/modifierFilm.php" style="display:none">
	<h2> Modifier ce film</h2>
	<input type="text" class="textPopHidden" name="idFilmPop" id="idNoMovie" style="visibility: hidden"/><br/>
	
	<label class="labelPop">Titre du film: </label><br/>
	<input type="text" class="textPop" name="nomFilmPop" id="titreMovie"/><br/>
	
	<label class="labelPop">Réalisateur du film: </label><br/>
	<input type="text" class="textPop" name="realFilmPop" id="realMovie"/><br/>
	
	<label class="labelPop">Sommaire: </label><br/>
	<textarea class="textAreaPop" name="sommaireFilmPop" id ="sommaireMovie"></textarea><br/>
	
	<label class="labelPop">Notes: </label><br/>
	<textarea class="textAreaPop" name="noteFilmPop" id ="noteMovie"></textarea><br/>
	
	<label class="labelPop">Emplacement du film: </label><br/>
	<?php $root = $_SERVER['DOCUMENT_ROOT'] . "Library/"; ?>
	<?php include($root . "elements/show/afficherEmplacement.php") ?><br/><br/>
	
	<input type="submit" class="buttonPop" value="Enregistrer" />
	<a href="#" id="closePop">Fermer</a>
	<a id="supprimerPop">Supprimer</a>
</form>