<?php 
	include ('connex.php');

	if(isset($_POST['update'])){

	$nom = $_POST['nom'];
	$id = $_POST['id'];

		if(!empty($nom)){

			$req=$bd->prepare('UPDATE partenaire SET entreprise = ? WHERE id = ?');

			if ($req->execute(array($nom,$id))){

				header('location:../pages/listPartenaires.php?sms=2');
			}else{

				header('location:../pages/listPartenaires.php?sms=3');
			}
	        
		}else{
			header('location:../pages/listPartenaires.php?sms=4');
		}
	}

	if(isset($_POST['delete'])){

		$id = $_POST['id'];

		if(!empty($id)){

			$req=$bd->prepare('DELETE FROM partenaire WHERE id = ?');

			if ($req->execute(array($id))){

				header('location:../pages/listPartenaires.php?sms=2');
			}else{

				header('location:../pages/listPartenaires.php?sms=3');
			}
	        
		}else{
			header('location:../pages/listPartenaires.php?sms=4');
		}
	}

?>