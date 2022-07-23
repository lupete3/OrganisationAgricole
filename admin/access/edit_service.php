<?php 
	include ('connex.php');

	if(isset($_POST['update'])){

	$titre = $_POST['titre'];
	$detail = $_POST['detail'];
	$id = $_POST['id'];

		if(!empty($titre) AND !empty($detail) ){

			$req=$bd->prepare('UPDATE service SET titre = ?, detail = ? WHERE id = ?');

			if ($req->execute(array($titre, $detail,$id))){

				header('location:../pages/listServices.php?sms=2');
			}else{

				header('location:../pages/listServices.php?sms=3');
			}
	        
		}else{
			header('location:../pages/listServices.php?sms=4');
		}
	}

	if(isset($_POST['delete'])){

		$id = $_POST['id'];

		if(!empty($id)){

			$req=$bd->prepare('DELETE FROM service WHERE id = ?');

			if ($req->execute(array($id))){

				header('location:../pages/listServices.php?sms=2');
			}else{

				header('location:../pages/listServices.php?sms=3');
			}
	        
		}else{
			header('location:../pages/listServices.php?sms=4');
		}
	}

?>