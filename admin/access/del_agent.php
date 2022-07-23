<?php 
	include ('connex.php');

	if(isset($_POST['delete'])){

		$id = $_POST['id'];

		if(!empty($id)){

			$req=$bd->prepare('DELETE FROM users WHERE id = ?');

			if ($req->execute(array($id))){

				header('location:../pages/listAgents.php');
			}else{

				header('location:../pages/listAgents.php');
			}
	    }

	}

?>