<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Gérer les emplacements</title>
<meta name="keywords" content="simple, grid, theme, free templates, web design, one page layout, slategray, steelblue, templatemo, CSS, HTML" />

<link href="../css/templatemo_style.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src="../js/jquery-1.9.1.min.js"></script>
<script type='text/javascript' src="../js/helper.js"></script>
<link rel="stylesheet" href="../css/menu_style.css" type="text/css"/>

<script>
$(document).ready(function(){
	$("#emplacementDropDown").change(function() {
		setImageEmplacement();
	});
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imgEmplacement').attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
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
				<h4>Gérer les emplacements</h4>
        		<form method="post" name="delete" action="../elements/supprimerEmplacement.php">
                	<label for="author">Nom de l'emplacement : </label>
					<?php include("../elements/afficherEmplacement.php") ?>
					
					</br>
					<input type="submit" value="Supprimer" class="submit_btn float_l" />
				</form>
				
				<form method="post" enctype="multipart/form-data" name="ajout" action="../elements/ajouterEmplacement.php">	
					<label>Ajouter un emplacement : </label> 
					<input id="inputEmplacement" type="text" name="nomEmplacement" class="required input_field" />

					<img id="imgEmplacement" class="imgEmplacement" src="" alt="" />
					
					<br/>
					<input id="btnSubmitEmplacement" type="submit" value="Ajouter" class="submit_btn float_l" />
					<br/>
					<input id="btnUploadImage" name="image" type='file' onchange="readURL(this);" />
				</form>            
    		</div> 
		</div> <!-- END of about -->
		<?php include("../elements/afficherMessageEmplacement.php"); ?>
<!-- ===================================================== -->
	</div> <!-- END of -->
    
<!-- ===================================================== -->	
    <?php include("../elements/footer.php"); ?> 
<!-- ===================================================== -->

</div> 

</body>
</html>