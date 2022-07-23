<?php 
	include ('connex.php');

	if(isset($_POST['update'])){

	$nom = $_POST['nom'];
	$fonction = $_POST['fonction'];
	$id = $_POST['id'];

		if(!empty($nom) AND !empty($fonction)){

			$req=$bd->prepare('UPDATE equipe SET nom = ?, fonction = ? WHERE id = ?');

			if ($req->execute(array($nom,$fonction,$id))){

				header('location:../pages/listMembres.php?sms=2');
			}else{

				header('location:../pages/listMembres.php?sms=3');
			}
	        
		}else{
			header('location:../pages/listMembres.php?sms=4');
		}
	}

	if(isset($_POST['delete'])){

		$id = $_POST['id'];

		if(!empty($id)){

			$req=$bd->prepare('DELETE FROM equipe WHERE id = ?');

			if ($req->execute(array($id))){

				header('location:../pages/listMembres.php?sms=2');
			}else{

				header('location:../pages/listMembres.php?sms=3');
			}
	        
		}else{
			header('location:../pages/listMembres.php?sms=4');
		}
	}

?>