<?php 
	include ('connex.php');

	if(isset($_POST['save'])){

	$nom = $_POST['nom'];
	$fonction = $_POST['fonction'];
	$message = $_POST['message'];
	
		$im=$_FILES['photo']['name'];
    	$r_tmp=$_FILES['photo']['tmp_name'];
    	move_uploaded_file($r_tmp,"../../images/$im");


	if(!empty($nom) AND !empty($fonction) AND !empty($message) ){

		$req=$bd->prepare('INSERT INTO temoignage(nom,fonction,detail,avatar) VALUES (?,?,?,?)');

		if ($req->execute(array($nom,$fonction,$message,$im))){

			header('location:../pages/gTemoignage.php?sms=2');
		}else{

			header('location:../pages/gTemoignage.php?sms=3');
		}
        
	}else{
		header('location:../pages/gTemoignage.php?sms=4');
	}
}

?>