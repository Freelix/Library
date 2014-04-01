<?php
	session_start();
	
	// Load le fichier XML
	$url = "http://isbndb.com/api/books.xml?access_key=92L5NBSB&results=texts&index1=isbn&value1=9782714449689";
	$xml = simplexml_load_file($url);
	
	$info = $xml->BookList->BookData;
	
	// Récupère les informations
	$titre = $info[0]->Title;
	$auteur = $info[0]->AuthorsText;
	$publisher = $info[0]->PublisherText;
	$sommaire = $info[0]->Summary;
	$notes = $info[0]->Notes;
	
	// Conversion en string pour utiliser les variables de session
	$titre2 = (string)$titre;
	$auteur2 = (string)$auteur;
	$publisher2 = (string)$publisher;
	$sommaire2 = (string)$sommaire;
	$notes2 = (string)$notes;
	
	$_SESSION['nomLivre'] = $titre2;
	$_SESSION['nomAuteur'] = $auteur2;
	$_SESSION['editeur'] = $publisher2;
	$_SESSION['sommaire'] = $sommaire2;
	$_SESSION['notes'] = $notes2;
	
	header("Location: http://localhost/Biblio/views/ajouterFilmOuLivre.php");
?>