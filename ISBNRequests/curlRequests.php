<?php

function retrieveBookWithCurl($isbn)
{   
    $url = "https://www.google.fr/search?q=" . $isbn . "&btnG=Chercher+des+livres&tbm=bks&tbo=1&hl=fr";
    $html = getRequest($url);
    return parseHTML($html, $isbn);
}

function getRequest($url)
{
    // Initialize curl and following options
    $ch = curl_init();

    $ua = "Mozilla/5.0 (Windows NT 6.3; WOW64) 
        AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36";
    
    curl_setopt_array($ch, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $url,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_USERAGENT => $ua
    ));
    
    // Grab the html from the page
    $html = curl_exec($ch);
    
    if(curl_errno($ch))
    {
        echo 'Error: ' . curl_error($ch);
    }
    
    curl_close($ch);
    
    return $html;
}

function parseHTML($html, $isbn)
{
    // Create a new DOM Document to handle scraping
    $dom = new DOMDocument();
    @$dom->loadHTML($html);  
    $xpath = new DomXPath($dom);
    $class = '_Rm';
    $strISBN = "books?isbn=";
    $strID = "books?id=";
    $book = "";
    
    $elements = $xpath->query("//cite[contains(concat(' ', normalize-space(@class), ' '), ' $class ')]");
    
    foreach ($elements as $element) 
    {
        $txt = $element->nodeValue;

        if (strpos($txt, $strISBN) !== false || strpos($txt, $strID) !== false)  
        {
            // $a contains the first part (before $str)
            // and the second parameter the id
            list($a, $book) = explode("=", $txt);

            if (isTheRightBook($book, $isbn))
                break;
            else
                $book = "";
        }
    }

    if ($book != "")
        return $book;

    $class = 'rc';
    $elements = $xpath->query("//div[contains(concat(' ', normalize-space(@class), ' '), ' $class ')]");

    foreach ($elements as $element)
    {
        $href = $element->getElementsByTagName('h3')->item(0)->getElementsByTagName('a')->item(0)->getAttribute('href');

        $book = get_string_between($href, $strID, "&dq=");

        if ($book != "")
            return $book;
    }

    return "";
}

function get_string_between($string, $start, $end)
{
    $string = " " . $string;
    $ini = strpos($string,$start);
    
    if ($ini == 0) 
        return "";
    
    $ini += strlen($start);
    $len = strpos($string,$end,$ini) - $ini;
    
    return substr($string,$ini,$len);
}

// Check first characters to valided
function isTheRightBook($book, $isbn)
{
    $regex = "/^[0-9]+$/";

    if (preg_match($regex, $book))
    {
        $pageISBN = $isbn;
        
        if (substr($isbn, 0, 3 ) === "978")
            $pageISBN = substr($isbn, 3, 6);

        if (substr($book, 0, 6 ) === $pageISBN)
            return true;
        return false;
    }

    // It means it's an id, not an isbn
    return true;
}

// For tests purpose
function writeToFile($text)
{
    $file = "output.html";

    $myfile = fopen($file, "w") or die("Unable to open file!");
    fwrite($myfile, $text);
}

?>