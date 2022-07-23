<?php 
	include ('connex.php');

	if(isset($_POST['save'])){

	$a = $_POST['nom'];
	$b = $_POST['fonction'];
	$c = $_POST['login'];
	$d = $_POST['password'];


	if(!empty($a) AND !empty($b) AND !empty($c) AND !empty($d)){

		$query1 = $bd->prepare("SELECT * FROM users  WHERE  nom=? AND login=?  AND role = ? ");
		$query1->execute(array($a, $c, $b));

		if ($done=$query1->fetch(PDO::FETCH_ASSOC)) {

			header('location:../pages/gAgents.php?sms=1');

		} else {

			$req=$bd->prepare('INSERT INTO users(nom,role,login,password) VALUES (?,?,?,?)');

			if ($req->execute(array($a,$b,$c,$d))){

				header('location:../pages/gAgents.php?sms=2');
			}else{

				header('location:../pages/gAgents.php?sms=3');
			}
        }
	}

	}else{
		header('location:../pages/gAgents.php?sms=4');
	}

?>