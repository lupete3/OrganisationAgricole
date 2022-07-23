<?php 
	include ('connex.php');

	if(isset($_POST['save'])){

	$titre = $_POST['titre'];
	$detail = $_POST['detail'];
	$id = $_POST['id'];
	
		$im=$_FILES['photo']['name'];
    	$r_tmp=$_FILES['photo']['tmp_name'];
    	move_uploaded_file($r_tmp,"../../images/blog/$im");

    	
	
		$im1=$_FILES['photo1']['name'];
    	$r_tmp=$_FILES['photo1']['tmp_name'];
    	move_uploaded_file($r_tmp,"../../images/blog/$im1");

    	
	
		$im2=$_FILES['photo2']['name'];
    	$r_tmp=$_FILES['photo2']['tmp_name'];
    	move_uploaded_file($r_tmp,"../../images/blog/$im2");


	if(!empty($titre) AND !empty($detail)){

		$req=$bd->prepare('UPDATE projet SET titre = ?,detail = ? WHERE id = ?');

		if ($req->execute(array($titre,$detail,$id))){

			header('location:../pages/listProjets.php?sms=2');
		}else{

			header('location:../pages/listProjets.php?sms=3');
		}
        
	}else{
		header('location:../pages/listProjets.php?sms=4');
	}
	}

	if (isset($_POST['delete'])) {

		$id = $_POST['id']; 

		$req=$bd->prepare('DELETE FROM projet WHERE id = ?');

		if ($req->execute(array($id))){

			header('location:../pages/listProjets.php');
		}else{

			header('location:../pages/listProjets.php');
		}
	}

?>