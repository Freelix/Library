<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Ajouter des films ou des livres</title>
<meta name="keywords" content="simple, grid, theme, free templates, web design, one page layout, slategray, steelblue, templatemo, CSS, HTML" />

<link href="../css/templatemo_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../css/menu_style.css" type="text/css"/>
<script type='text/javascript' src="../js/jquery-1.9.1.min.js"></script>

<script>
$(document).ready(function(){
	$("#filmOuLivre").change(function() {
		if ($("#filmOuLivre").val() == "Film"){
			$("#infosLivre").fadeOut("slow");
		}	
		else{
			$("#infosLivre").fadeIn("slow");
		}
	});
});
</script>

</head>   
<body>

<div id="templatemo_wrapper">

<!-- ===================================================== -->
	<?php include("../elements/header.php"); ?>
<!-- ===================================================== -->

<!-- ===================================================== -->    
    <?php include("../elements/menu.php"); ?>
<!-- ===================================================== --> 
    <div id="templatemo_main">

<!-- ===================================================== -->      
        <div id="about" class="main_box">
        	<div id="contact_form">
				<h4>Ajouter un livre ou un film</h4>
        		<form method="post" name="ajout" action="../elements/ajouterLivreFilm.php">
                	<label>Nom du livre/film : </label> 
					<input type="text" name="nomLivre" value="<?php if(isset($_SESSION['nomLivre'])) echo utf8_encode($_SESSION['nomLivre']); ?>" class="required input_field" />
					
					<label for="author">Auteur/Réalisateur : </label> 
					<input type="text" name="auteurLivre" value="<?php if(isset($_SESSION['nomAuteur'])) echo utf8_encode($_SESSION['nomAuteur']); ?>" class="required input_field" />
					
					<div id="infosLivre">
						<label for="author">Éditeur : </label> 
						<input type="text" name="editeurLivre" id="editLivre" value="<?php if(isset($_SESSION['editeur'])) echo utf8_encode($_SESSION['editeur']); ?>" class="required input_field" />
					</div>
					
					<label for="author">Sommaire : </label>
					<textarea name="sommaireLivre" id="sommLivre" class="required input_large_field"><?php if(isset($_SESSION['sommaire'])) echo utf8_encode($_SESSION['sommaire']); ?></textarea>
						
					<label for="author">Notes : </label>
					<textarea name="noteLivre" id="notLivre" class="required input_large_field"><?php if(isset($_SESSION['note'])) echo utf8_encode($_SESSION['note']); ?></textarea>	
					
					<label for="author">Emplacement du livre/film : </label>
					<?php include("../elements/afficherEmplacement.php") ?>
					
					<label for="author">Type : </label>
					<select id="filmOuLivre" name="LivreOrFilm">
						<option>Livre</option>
						<option>Film</option>
					</select>
					
					</br>
					<input type="submit" value="Ajouter" class="submit_btn float_l" />
        		</form>
				
				</br></br></br>
				
				<h4>Faire une recherche avec le code barre</h4>
				<h6>Sélectionner la zone de texte et scanner le livre:</h6>
				</br>
				
				<form method="post" name="recherche" action="../XMLParser.php">
					<label for="author">Code barre : </label>
					<input type="text" name="isbn" value="9782714449689" class="required input_field" />
					</br>
					<input type="submit" value="Rechercher le code barre" class="submit_btn float_l" />
				</form>             
    		</div> 
		</div> <!-- END of about -->
		<?php include("../elements/afficherMessage.php"); ?>
<!-- ===================================================== -->
	</div> <!-- END of -->
    
<!-- ===================================================== -->	
    <?php include("../elements/footer.php"); ?> 
<!-- ===================================================== -->

</div> 

</body>
</html>