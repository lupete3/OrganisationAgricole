<?php 
	include ('connex.php');

	if(isset($_POST['save'])){

	$titre = $_POST['titre'];
	$detail = $_POST['detail'];
	$categorie = $_POST['categorie'];
	$datePub = date('Y-m-d');
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


	if(!empty($titre) AND !empty($detail) AND !empty($categorie)){

		$req=$bd->prepare('UPDATE article SET titre = ?,detail = ?,img_one = ?,img_two = ?,img_tree = ?,idCat = ?WHERE id = ?');

		if ($req->execute(array($titre,$detail,$im,$im1,$im2,$categorie,$id))){

			header('location:../pages/listArticles.php?sms=2');
		}else{

			header('location:../pages/listArticles.php?sms=3');
		}
        
	}else{
		header('location:../pages/listArticles.php?sms=4');
	}
	}

	if (isset($_POST['delete'])) {

		$id = $_POST['id']; 

		$req=$bd->prepare('DELETE FROM article WHERE id = ?');

		if ($req->execute(array($id))){

			header('location:../pages/listArticles.php');
		}else{

			header('location:../pages/listArticles.php');
		}
	}

?>