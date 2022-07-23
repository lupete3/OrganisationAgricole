<?php 
	include ('connex.php');

	if(isset($_POST['save'])){

	$adresse = $_POST['adresse'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	


	if(!empty($adresse) AND !empty($email) AND !empty($phone) ){

		$req=$bd->prepare('UPDATE contact_company SET adresse = ?,email = ?,phone = ? ');

		if ($req->execute(array($adresse,$email,$phone))){

			header('location:../pages/gAdresses.php?sms=2');
		}else{

			header('location:../pages/gAdresses.php?sms=3');
		}
        
	}else{
		header('location:../pages/gAdresses.php?sms=4');
	}
}

?>