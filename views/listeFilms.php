<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Liste des films</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link href="../css/templatemo_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../css/table.css" type="text/css"/>
<link rel="stylesheet" href="../css/popupFilm.css" type="text/css"/>
<link rel="stylesheet" href="../css/menu_style.css" type="text/css"/>
<script type='text/javascript' src="../js/jquery-1.9.1.min.js"></script>
<script type='text/javascript' src="../js/popupFilm.js"></script>
</head>  
 
<body>
<form id="overlay_form" method="post" action="../elements/modifierFilm.php" style="display:none">
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
	<?php include("../elements/afficherEmplacementAreaPop.php") ?><br/><br/>
	
	<input type="submit" class="buttonPop" value="Enregistrer" />
	<a href="#" id="closePop">Fermer</a>
	<a id="supprimerPop">Supprimer</a>
</form>

<div id="templatemo_wrapper">

<!-- ===================================================== -->
	<?php include("../elements/header.php"); ?>
<!-- ===================================================== -->

<!-- ===================================================== -->    
    <?php include("../elements/menu.php"); ?>
<!-- ===================================================== -->
	
    <div id="templatemo_main">
<!-- ===================================================== -->
		<div id="contact_form">
			<h4>Effectuer une recherche</h4>
        	<form method="post" name="recherche" action="../elements/rechercheFilm.php">
                <label>Nom du film : </label>
				<input type="text" name="nomFilm" class="required input_field" />
				<label for="author">Réalisateur du film : </label> 
				<input type="text" name="realisateurFilm" class="required input_field" />
				<label for="author">Emplacement du film : </label>
				<input type="text" name="emplacementFilm" class="required input_field" />
				</br>
				<input type="submit" value="Rechercher" class="submit_btn float_l" />
        	</form>
                
    	</div> 

    	<div id="home" class="tableau">
			<div class="CSS_Table_Example">
				<table>
					<tr>
						<th>Titre du film</th>
						<th>Réalisateur du film</th>
						<th>Emplacement</th>
					</tr>
					<?php include("../elements/afficherFilm.php"); ?>
				</table>
			</div>
		</div> <!-- END of home -->
<!-- ===================================================== -->
    </div> <!-- END of -->
    
<!-- ===================================================== -->	
    <?php include("../elements/footer.php"); ?>
<!-- ===================================================== -->

</div> 

</body>
</html>