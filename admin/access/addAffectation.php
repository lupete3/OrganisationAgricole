<?php 
	include('../access/security_adm.php');
  require_once ('../access/connex.php'); 
  $id= $_SESSION['profile']['admin']['id'];
  $username= $_SESSION['profile']['admin']['login'];


	if(isset($_POST['envoyer'])){

		$dateAffect = date('Y-m-d');
		$dateDebut = $_POST['dateDeut'];
		$dateFin = $_POST['dateFin'];
		$maison = $_POST['maison'];
		$idAgent = $_POST['id'];
		$obs = 'affecté';


		if(!empty($idAgent)){

			$req = $bd->prepare("SELECT * FROM affectation WHERE dateAffectation = ? AND idAgent = ? ");
			$req->execute(array($dateAffect,$idAgent));
			if ($res = $req->fetch()) {
				header("Location:../pages/listAgentAffectRH.php?sms=0&err=Vous avez déjà signaler cette affectation");
			}else{
				$req=$bd->prepare('INSERT INTO affectation (dateDebut,dateFin,dateAffectation,idMaison,idAgent,observation) VALUES (?,?,?,?,?,?)');

				if ($req->execute(array($dateDebut,$dateFin,$dateAffect,$maison,$idAgent,$obs))){

					header('location:../pages/listAgentAffectRH.php?sms=1&&err=Affectation Ajoutée');
				}else{

					header('location:../pages/listAgentAffectRH.php?sms=2&&err=Une erreur est survenue');
				}
			}
	    }else{

			header('location:../pages/listAgentAffectRH.php?sms=3&err=Certains champs sont vides');
		}

	}

?>