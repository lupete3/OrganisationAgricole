<?php 
	include ('connex.php');

	if(isset($_POST['save'])){

	$titre = $_POST['titre'];

	if(!empty($titre)){

		$req=$bd->prepare('INSERT INTO categorie(libelle) VALUES (?)');

		if ($req->execute(array($titre))){

			header('location:../pages/gCategories.php?sms=2');
		}else{

			header('location:../pages/gCategories.php?sms=3');
		}
        
	}else{
		header('location:../pages/gCategories.php?sms=4');
	}
}

?>