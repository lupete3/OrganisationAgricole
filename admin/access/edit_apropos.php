<?php 
	include ('connex.php');

	if(isset($_POST['save'])){

	$titre = $_POST['titre'];
	$slogan = $_POST['slogan'];
	$detail = $_POST['detail'];

	$titreVision = $_POST['titreVision'];
	$vision = $_POST['vision'];

	$ville = $_POST['ville'];
	$nbVille = $_POST['nbVille'];
	$projet = $_POST['projet'];
	$nbProjet = $_POST['nbProjet'];
	$population = $_POST['population'];
	$nbPopulation = $_POST['nbPopulation'];

	
		$im=$_FILES['photo']['name'];
    	$r_tmp=$_FILES['photo']['tmp_name'];
    	move_uploaded_file($r_tmp,"../../images/$im");


	if(!empty($titre) AND !empty($slogan) AND !empty($detail) AND !empty($titreVision) AND !empty($vision) ){

		$req=$bd->prepare('UPDATE apropos SET titre = ?,slogan = ?,detail = ?,image = ? ');

		$req->execute(array($titre,$slogan,$detail,$im));

		$req1=$bd->prepare('UPDATE vision SET titre = ?,detail = ? ');

		$req1->execute(array($titreVision,$vision));

		$req1=$bd->prepare('UPDATE compteur_succes SET ville = ?,nbVille = ?, projet = ?, nbProjet = ?, population = ?, nbPopulation = ? ');

		$req1->execute(array($ville,$nbVille,$projet,$nbProjet,$population,$nbPopulation));

			header('location:../pages/gApropos.php?sms=2');
        
	}else{
		header('location:../pages/gApropos.php?sms=4');
	}
}


?>