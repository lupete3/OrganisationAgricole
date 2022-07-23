<?php 
	include ('connex.php');

	if(isset($_POST['save'])){

	$titre = $_POST['titre'];
	$detail = $_POST['detail'];

	if(!empty($detail)){

		$req=$bd->prepare('INSERT INTO service(titre,detail) VALUES (?,?)');

		if ($req->execute(array($titre,$detail))){

			header('location:../pages/gServices.php?sms=2');
		}else{

			header('location:../pages/gServices.php?sms=3');
		}
        
	}else{
		header('location:../pages/gServices.php?sms=4');
	}
}

?>