<?php 
	include ('connex.php');

	if(isset($_POST['update'])){

		$id = $_POST['id'];
		$a = $_POST['nom'];
		$b = $_POST['role'];
		$c = $_POST['login'];
		$d = $_POST['password'];
		

		if(!empty($a)){

			$req=$bd->prepare('UPDATE users SET nom = ?,role  = ?,login  = ?,password  = ? WHERE id = ?');

			if ($req->execute(array($a,$b,$c,$d,$id))){

				header('location:../pages/listAgents.php');
			}else{

				header('location:../pages/listAgents.php');
			}
	    }

	}

?>