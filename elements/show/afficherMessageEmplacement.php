<?php
	// Affiche un message de réussite ou d'erreur (Delete)
	if(isset($_SESSION['validDelete']) and isset($_SESSION['message'])){
		if($_SESSION['validDelete'] == true)
			$color = "green";
		else
			$color = "red";
			
		echo "<div class='message' style='color: $color; line-height:150%;'>";
			echo $_SESSION['message'];
		echo "</div>";		
	}
	
	// Affiche un message de réussite ou d'erreur (Add)
	if(isset($_SESSION['validAdd']) and isset($_SESSION['message'])){
		if($_SESSION['validAdd'] == true)
			$color = "green";
		else
			$color = "red";
			
		echo "<div class='message' style='color: $color; line-height:150%;'>";
			echo $_SESSION['message'];
		echo "</div>";			
	}
	
	unset($_SESSION['message']);
	unset($_SESSION['validDelete']);
	unset($_SESSION['validAdd']);
?>