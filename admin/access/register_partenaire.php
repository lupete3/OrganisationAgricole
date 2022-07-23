<?php 
	include ('connex.php');

	if(isset($_POST['save'])){

	$titre = $_POST['titre'];
	
		$im=$_FILES['photo']['name'];
    	$r_tmp=$_FILES['photo']['tmp_name'];
    	move_uploaded_file($r_tmp,"../../images/sponsors/$im");


	if(!empty($titre)){

		$req=$bd->prepare('INSERT INTO partenaire(entreprise,image) VALUES (?,?)');

		if ($req->execute(array($titre,$im))){

			header('location:../pages/gPartenaire.php?sms=2');
		}else{

			header('location:../pages/gPartenaire.php?sms=3');
		}
        
	}else{
		header('location:../pages/gPartenaire.php?sms=4');
	}
}

?>