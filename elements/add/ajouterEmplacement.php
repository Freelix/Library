<?php
	session_start();
	$root = $_SERVER['DOCUMENT_ROOT'] . "Library/";

	if (!empty($_POST['nomEmplacement'])){
		include($root . "Utils/database/connexion.php");
		
		$relativePath = "";
		$emp = utf8_decode($_POST['nomEmplacement']);
		$emp = str_replace("'", "''", $emp);

		if(isset($_FILES['image'])){
				$errors= array();
	      $file_name = $_FILES['image']['name'];
	      $file_size =$_FILES['image']['size'];
	      $file_tmp =$_FILES['image']['tmp_name'];
	      $file_type=$_FILES['image']['type'];
	      $temp = explode('.',$file_name);
        $file_ext = strtolower(end($temp));
	      
	      if($file_size > 2097152)
	         $errors[]='File size must be excately 2 MB';

	      if ($file_size > 0)
	      {
		      if(empty($errors)==true){
		      	 $relativePath = $root . "Content/images/emplacements/" . $emp . "." . $file_ext;
		         move_uploaded_file($file_tmp, $relativePath);
		      }
		      else{
		         print_r($errors);
		      }
	      }
		}
		
		$queryCount = "SELECT COUNT(*) as nbr FROM emplacement
						WHERE nom_emplacement = '$emp'";
							
		$result = $bdd->query($queryCount);
		$row = $result->fetch_row();
		
		if($row[0] == 0){
			$query = "INSERT INTO emplacement(nom_emplacement, image_emplacement) VALUES(
				'$emp', '$relativePath')";

			mysqli_query($bdd, $query);
			$_SESSION['validAdd'] = true;
			$_SESSION['message'] = "L'emplacement '$_POST[nomEmplacement]' a bien été ajouté.";
		}
		else{
			$_SESSION['validAdd'] = false;
			$_SESSION['message'] = "Cet emplacement existe déjà. Vous ne pouvez pas le recréer.";
		}
		mysqli_close($bdd);
	}
	else{
		$_SESSION['message'] = "Vous devez saisir un emplacement avant d'ajouter.";
	}
	
	header("Location: /Library/views/listeEmplacements.php");
?>