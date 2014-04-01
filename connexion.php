<?php
	$bdd=mysqli_connect("localhost","root","password","biblio");

	if (mysqli_connect_errno($bdd))
  	{
 	 	echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
?> 