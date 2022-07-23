<?php 
	include ('connex.php');

	if(isset($_POST['update'])){

	$titre = $_POST['libelle'];
	$id = $_POST['id'];

		if(!empty($titre)){

			$req=$bd->prepare('UPDATE categorie SET libelle = ? WHERE id = ?');

			if ($req->execute(array($titre,$id))){

				header('location:../pages/listCategories.php?sms=2');
			}else{

				header('location:../pages/listCategories.php?sms=3');
			}
	        
		}else{
			header('location:../pages/listCategories.php?sms=4');
		}
	}

?>