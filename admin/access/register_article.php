<?php 
	include ('connex.php');

	if(isset($_POST['save'])){

	$titre = $_POST['titre'];
	$detail = $_POST['detail'];
	$categorie = $_POST['categorie'];
	$datePub = date('Y-m-d');
	$user = $_POST['id'];
	
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

		$req=$bd->prepare('INSERT INTO article(titre,detail,datePub,img_one,img_two,img_tree,idUser,idCat) VALUES (?,?,?,?,?,?,?,?)');

		if ($req->execute(array($titre,$detail,$datePub,$im,$im1,$im2,$user,$categorie))){

			header('location:../pages/gArticles.php?sms=2');
		}else{

			header('location:../pages/gArticles.php?sms=3');
		}
        
	}else{
		header('location:../pages/gArticles.php?sms=4');
	}
}

?>