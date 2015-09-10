<?php
    require_once("curlRequests.php");
	$isbn = $_POST["data"];

    // Get book identifier
	$bookKey = retrieveBookWithCurl($isbn);

	// Get book data
	$book = getBookInfo($bookKey);

    // Retrieve and create an array with wanted book values
	processData($book);

	function getBookInfo($bookKey)
	{
		if (isNumeric($bookKey))
		{
			$url = "https://www.googleapis.com/books/v1/volumes?q=isbn:" . $bookKey;
			$page = file_get_contents($url);
	    	$data = json_decode($page, true);
	    	$bookId = $data['items'][0]['id'];

	    	return getBookById($bookId);
		}
		else
			return getBookById($bookKey);
	}

	function isNumeric($bookKey)
	{
		$regex = "/^[0-9]+$/";

		if (preg_match($regex, $bookKey))
			return true;
		return false;
	}

	function getBookById($bookId)
	{
		$url = "https://www.googleapis.com/books/v1/volumes/" . $bookId;
	    $page = file_get_contents($url);
	    $data = json_decode($page, true);

	    return $data['volumeInfo'];
	}

	function processData($book)
	{
		$titre = (array_key_exists("title", $book) ? $book['title'] : "");
	    $auteur = (array_key_exists("authors", $book) ? @implode(",", $book['authors']) : "");
	    $publisher = (array_key_exists("publisher", $book) ? $book['publisher'] : "");
	    $publishedDate = (array_key_exists("publishedDate", $book) ? $book['publishedDate'] : "");
	    $pageCount = (array_key_exists("pageCount", $book) ? $book['pageCount'] : "");
	    $sommaire = (array_key_exists("description", $book) ? $book['description'] : "");
	    $notes = "";

		$return[] = array("nomLivre" => $titre, 
			"auteurLivre" => $auteur,
			"editeurLivre" => $publisher,
			"sommaireLivre" => $sommaire,
			"noteLivre" => $notes,
			"publishedDate" => $publishedDate,
			"pageCount" => $pageCount);

	    $json = json_encode($return);
		echo $json;
	}
?>