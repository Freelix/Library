clear;
$isbn=$args[0];

function waitForNavigator
{
	while ($ie.Busy -eq $true)
	{
		Start-Sleep -Milliseconds 500;
	}
}

#$isbn = "9781841153971";
$url = "http://isbndb.com/";

$ie = New-Object -com internetexplorer.application;
waitForNavigator;
$ie.visible = $true;
$ie.navigate($url);
waitForNavigator;
$ie.Document.getElementById("suggest").value = $isbn;
$ie.Document.getElementById("searchform").submit();
waitForNavigator;

while (($ie.Document.getElementsByTagName('h1') | Select-Object -Last 1 -ExpandProperty innerHTML) -eq "ISBNdb.com — a unique book &amp; ISBN database")
{
	waitForNavigator;
}
$titre = $ie.Document.getElementsByTagName('h1') | Select-Object -Last 1 -ExpandProperty innerHTML;
$auteurArray = $ie.Document.getElementsByTagName('span') | Select-Object -ExpandProperty innerHTML;
$auteur = $auteurArray[14];

$i = 0;
$auteurSpan = ""
foreach($aut in $auteurArray)
{
	if ($i -eq 1){
		$auteurSpan = $aut;
	}
	$i++;
}

$auteurText = $auteurSpan.Split(">");

if ($auteurText[1].Contains('<a href=')){
	$auteur = $auteurText[2].Replace("</a","");
}
else{
	$auteur = $auteurText[1].Replace("</a","");
}

echo $titre;
echo $auteur;