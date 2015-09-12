<?php	
	session_start();
	
	$output = array();
	$return_code = 0;
	$codeISBN = $_POST['isbn'];
	set_time_limit(120);
	$commande = "powershell.exe  -executionpolicy unrestricted -command \"C:\\wamp\\www\\Bibliotheque\\search.ps1\" $codeISBN";
	$last_line = exec($commande, $output, $return_code);
	
	$infoLivre = array();
	$i = 0;
	foreach($output as $line) {
    	$infoLivre[$i] = $line;
		$i++;
	}
	
	$_SESSION['nomLivre'] = $infoLivre[0];
	$_SESSION['nomAuteur'] = $infoLivre[1];
	header("Location: http://localhost/Bibliotheque/views/ajouterFilmOuLivre.php");
?>