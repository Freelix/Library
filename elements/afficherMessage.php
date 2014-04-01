<?php
	// Affiche un message de réussite ou d'erreur
	if(isset($_SESSION['message'])){
		if($_SESSION['message'] == "Le livre a bien été ajouté !" || $_SESSION['message'] == "Le film a bien été ajouté !")
			$color = "green";
		else
			$color = "red";
			
		echo "<div class='message' style='color: $color'>";
		echo $_SESSION['message'];
		echo "</div>";
		
		unset($_SESSION['message']);	
	}
	
	// Efface les variables de session
	
	if(isset($_SESSION['nomLivre']))
		unset($_SESSION['nomLivre']);
	
	if(isset($_SESSION['nomAuteur']))
		unset($_SESSION['nomAuteur']);
		
	if(isset($_SESSION['editeur']))
		unset($_SESSION['editeur']);
		
	if(isset($_SESSION['sommaire']))
		unset($_SESSION['sommaire']);
		
	if(isset($_SESSION['note']))
		unset($_SESSION['note']);
		
	if(isset($_SESSION['emplacement']))
		unset($_SESSION['emplacement']);
?>