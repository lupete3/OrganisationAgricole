<?php 
	include ('connex.php');

	if(isset($_POST['update'])){

	$nom = $_POST['nom'];
	$detail = $_POST['detail'];
	$temoignage = $_POST['temoignage'];
	$id = $_POST['id'];

		if(!empty($nom) AND !empty($detail) AND !empty($temoignage) ){

			$req=$bd->prepare('UPDATE temoignage SET nom = ?, fonction = ?, detail = ? WHERE id = ?');

			if ($req->execute(array($nom,$detail,$temoignage,$id))){

				header('location:../pages/listTemoignage.php?sms=2');
			}else{

				header('location:../pages/listTemoignage.php?sms=3');
			}
	        
		}else{
			header('location:../pages/listTemoignage.php?sms=4');
		}
	}

	if(isset($_POST['delete'])){

		$id = $_POST['id'];

		if(!empty($id)){

			$req=$bd->prepare('DELETE FROM temoignage WHERE id = ?');

			if ($req->execute(array($id))){

				header('location:../pages/listTemoignage.php?sms=2');
			}else{

				header('location:../pages/listTemoignage.php?sms=3');
			}
	        
		}else{
			header('location:../pages/listTemoignage.php?sms=4');
		}
	}

?>