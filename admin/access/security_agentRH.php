<?php

	session_start();

	if(!isset($_SESSION['profile']['grh'])){
		header('location:../index.php');
     }
     $idB= $_SESSION['profile']['grh']['idBureau'];
 ?>