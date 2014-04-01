<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Liste des livres</title>

<link href="../css/templatemo_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../css/table.css" type="text/css"/>
<link rel="stylesheet" href="../css/popupLivre.css" type="text/css"/>
<link rel="stylesheet" href="../css/menu_style.css" type="text/css"/>
<script type='text/javascript' src="../js/jquery-1.9.1.min.js"></script>
<script type='text/javascript' src="../js/popupLivre.js"></script>
</head>   

<body>
<form id="overlay_form" method="post" action="../elements/modifierLivre.php" style="display:none">
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
	
	<label class="labelPop">Emplacement: </label><br/>
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
        	<form method="post" name="recherche" action="../elements/rechercheLivre.php">
                <label>Nom du livre : </label> 
				<input type="text" name="nomLivre" class="required input_field" />
				<label for="author">Auteur du livre : </label> 
				<input type="text" name="auteurLivre" class="required input_field" />
				<label for="author">Emplacement du livre : </label>
				<input type="text" name="emplacementLivre" class="required input_field" />
				</br>
				<input type="submit" value="Rechercher" class="submit_btn float_l" />
        	</form>               
    	</div> 

    	<div id="home" class="tableau">
			<div class="CSS_Table_Example">
				<table>
					<tr>
						<th class="hide"></th>
						<th>Titre du livre</th>
						<th>Auteur du livre</th>
						<th>Emplacement</th>
						<th class="hide"></th>
						<th class="hide"></th>
						<th class="hide"></th>
					</tr>
					<?php include("../elements/afficherLivre.php"); ?>
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