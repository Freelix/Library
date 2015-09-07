<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Liste des livres</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link href="../css/templatemo_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../css/table.css" type="text/css"/>
<link rel="stylesheet" href="../css/popupLivre.css" type="text/css"/>
<link rel="stylesheet" href="../css/menu_style.css" type="text/css"/>
<script type='text/javascript' src="../js/jquery-1.9.1.min.js"></script>

<script>
    $(document).ready(function() {
    	var pageNumber = 0;
    	var totalRows = $("#hiddenNumberOfRows").html();

		$('#arrowRightLivre').click(function() {
	        // Make a new request
	        var tempPageNumber = pageNumber;
	        pageNumber = pageNumber + 5;

	        if (totalRows > pageNumber) {
	        	$("#tableLivre > tbody").empty();

			    var customQuery = $("#customQuery").html();

			    ajaxRequest = $.ajax({
		            url: "../elements/afficherLivre.php",
		            type: "POST",
		            dataType: "html",
		            data: { data: pageNumber, cq: customQuery }
		        });

		        ajaxRequest.done(function(response, textStatus, jqXHR) {
		        	$('#tableLivre tbody').append(response);
		        });

		        ajaxRequest.fail(function(jqXHR, textStatus) {
		        });
		    }
		    else
		    	pageNumber = tempPageNumber;
	    });

	    $('#arrowLeftLivre').click(function() {
	        // Make a new request
	        pageNumber = pageNumber - 5;

	        if (pageNumber >= 0) {
	        	$("#tableLivre > tbody").empty();

	        	var customQuery = $("#customQuery").html();

			    ajaxRequest = $.ajax({
		            url: "../elements/afficherLivre.php",
		            type: "POST",
		            dataType: "html",
		            data: { data: pageNumber, cq: customQuery }
		        });

		        ajaxRequest.done(function(response, textStatus, jqXHR) {
		        	$('#tableLivre tbody').append(response);
		        });

		        ajaxRequest.fail(function(jqXHR, textStatus) {
		        });
	    	}
	    	else
	    		pageNumber = 0;
	    });
    });
</script>

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

        <label id="numberOfRows"></label>

    	<div id="home" class="tableau">
			<div class="CSS_Table_Example">
				<table id="tableLivre">
					<thead>
						<tr>
							<th class="hide"></th>
							<th>Titre du livre</th>
							<th>Auteur du livre</th>
							<th>Emplacement</th>
							<th class="hide"></th>
							<th class="hide"></th>
							<th class="hide"></th>
						</tr>
					</thead>
					<tbody>
					    <?php include("../elements/afficherLivre.php"); ?>
					</tbody>
				</table>
			</div>
		</div> <!-- END of home -->

		<i id="arrowLeftLivre" class="arrowLeft fa fa-arrow-left fa-3x"></i>
		<i id="arrowRightLivre" class="arrowRight fa fa-arrow-right fa-3x"></i>
<!-- ===================================================== -->
    </div> <!-- END of -->
    
<!-- ===================================================== -->	
    <?php include("../elements/footer.php"); ?>
<!-- ===================================================== -->

</div> 

</body>
</html>