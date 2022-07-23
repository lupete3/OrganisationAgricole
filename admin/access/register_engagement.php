<?php 
	include ('connex.php');

	if(isset($_POST['save'])){

	$detail = $_POST['detail'];

	if(!empty($detail)){

		$req=$bd->prepare('INSERT INTO engagement(detail) VALUES (?)');

		if ($req->execute(array($detail))){

			header('location:../pages/gEngagement.php?sms=2');
		}else{

			header('location:../pages/gEngagement.php?sms=3');
		}
        
	}else{
		header('location:../pages/gEngagement.php?sms=4');
	}
}

?>