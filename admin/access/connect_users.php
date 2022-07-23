<?php 

include ('connex.php');
session_start();

if(isset($_POST['log_in'])){
	$user = $_POST['login'];
	$pwd = $_POST['password'];

	$query1 = $bd->prepare("SELECT * FROM users WHERE login=? AND password=? ");
	$query1->execute(array($user, $pwd ));

	if ($done=$query1->fetch(PDO::FETCH_ASSOC)) {

		$_SESSION['profile']['admin']=$done;
								
		header('location:../pages/admin.php');

	}else {
		header('location:../index.php?err=Login ou mot de pass incorrect');
				  	
	}

		/*}else if($funct == 'grh'){

			$query3 = $bd->prepare("SELECT * FROM agent WHERE login = ? AND password = ? AND titre = ? ");
			$query3->execute(array($user,$pwd,'Chef Bureau' ));

			    if ($done2=$query3->fetch(PDO::FETCH_ASSOC)) {

					$_SESSION['profile']['grh']=$done2;

					
						header('location:../pages/espace_agentRH.php');
								
					
				}else {
				  	header('location:../index.php?err=Login ou mot de pass incorrect');
				  	
				}
		} */
}

 ?>