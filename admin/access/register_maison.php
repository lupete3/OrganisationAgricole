<?php 
	include ('connex.php');

	if(isset($_POST['save'])){

	$a = $_POST['nom'];
	$b = $_POST['activite'];
	$c = $_POST['rccm'];
	$e = $_POST['adresse'];
	$f = $_POST['tel'];
	$g = $_POST['nomRespo'];

	if(!empty($a) AND !empty($b) AND !empty($c) AND !empty($e) AND !empty($f)AND !empty($g)){

		$query1 = $bd->prepare("SELECT * FROM maison  WHERE  designation=? AND rccm=?  ");
		$query1->execute(array($a,$c));

		if ($done=$query1->fetch(PDO::FETCH_ASSOC)) {

			header('location:../pages/gMaisons.php?sms=1');

		} else {

			$req=$bd->prepare('INSERT INTO maison(designation,activite,rccm,adresse,telRespo,nomsResponsable) VALUES (?,?,?,?,?,?)');

			if ($req->execute(array($a,$b,$c,$e,$f,$g))){

				header('location:../pages/gMaisons.php?sms=2');
			}else{

				header('location:../pages/gMaisons.php?sms=3');
			}
        }
	}

	}else{
		header('location:../pages/gMaisons.php?sms=4');
	}

?>