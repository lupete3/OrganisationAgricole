<?php 
	include ('connex.php');

	if(isset($_POST['save'])){

	$titre = $_POST['titre'];
	$detail = $_POST['detail'];
	
		$im=$_FILES['photo']['name'];
    	$r_tmp=$_FILES['photo']['tmp_name'];
    	move_uploaded_file($r_tmp,"../../images/$im");


	if(!empty($titre) AND !empty($detail) ){

		$req=$bd->prepare('INSERT INTO projet(titre,detail,image) VALUES (?,?,?)');

		if ($req->execute(array($titre,$detail,$im))){

			header('location:../pages/gProjets.php?sms=2');
		}else{

			header('location:../pages/gProjets.php?sms=3');
		}
        
	}else{
		header('location:../pages/gProjets.php?sms=4');
	}
}

?>