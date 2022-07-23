<?php 
	include ('connex.php');

	if(isset($_POST['save'])){

	$titre = $_POST['titre'];
	$fonction = $_POST['fonction'];
	
		$im=$_FILES['photo']['name'];
    	$r_tmp=$_FILES['photo']['tmp_name'];
    	move_uploaded_file($r_tmp,"../../images/$im");


	if(!empty($titre) AND !empty($fonction) ){

		$req=$bd->prepare('INSERT INTO equipe(nom,fonction,image) VALUES (?,?,?)');

		if ($req->execute(array($titre,$fonction,$im))){

			header('location:../pages/gEquipe.php?sms=2');
		}else{

			header('location:../pages/gEquipe.php?sms=3');
		}
        
	}else{
		header('location:../pages/gEquipe.php?sms=4');
	}
}

?>