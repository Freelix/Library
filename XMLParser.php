<?php
	$isbn = $_POST["data"];
	$googleId = "AIzaSyDGgd3jmF7-BuVhGdlhsYLovQHNMBe0K_4";
	
	// Get the book id
	$url = "https://www.googleapis.com/books/v1/volumes?q=isbn:" . $isbn;
    $page = file_get_contents($url);
    $data = json_decode($page, true);
    $bookId = $data['items'][0]['id'];
    
    // Get the book's details
	$url = "https://www.googleapis.com/books/v1/volumes/" . $bookId . "?key=" . $googleId;
    $page = file_get_contents($url);
    $data = json_decode($page, true);

    $book = $data['volumeInfo'];

    $titre = $book['title'];
    $auteur = @implode(",", $book['authors']);
    $publisher = $book['publisher'];
    $publishedDate = $book['publishedDate'];
    $pageCount = $book['pageCount'];
    $sommaire = "";
    $notes = "";

    if (!empty($book['description']))
        $sommaire = $book['description'];
	
	// Conversion en string pour utiliser les variables de session
	$titre = (string)$titre;
	$auteur = (string)$auteur;
	$publisher = (string)$publisher;
	$publishedDate = (string)$publishedDate;
	$pageCount = (string)$pageCount;
	$sommaire = (string)$sommaire;

	$return[] = array("nomLivre" => $titre, 
		"auteurLivre" => $auteur,
		"editeurLivre" => $publisher,
		"sommaireLivre" => $sommaire,
		"noteLivre" => $notes);

    $json = json_encode($return);
	echo $json;
?>