<?php 
  include('../access/security_adm.php');
  require_once ('../access/connex.php'); 
  $id= $_SESSION['profile']['admin']['id'];
  $username= $_SESSION['profile']['admin']['login'];

 ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Espace Admin</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<style>
  .spacer{
    margin-top: 30px;
  }
</style>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">Espace Admin</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      
      
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          
          <a class="dropdown-item" href="#"><?php echo $username;?></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../access/deconnexion.php" >Déconnexion</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <?php include('include/sidebarAdmin.php'); ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="admin.php">Accueil</a>
          </li>
          <li class="breadcrumb-item active">Ajouter un Agent RH</li>
        </ol>

        <!-- DataTables Example -->
       <div class="card card-register mx-auto mt-5">
      <div class="card-header text-uppercase">Enregistrement Agent RH</div>
      <div class="card-body">
        <form action="../access/register_agentRh.php" method="post">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                 <?php 
                  if (isset($_GET['sms']) AND $_GET['sms'] == 1) { ?>
                    <div class="alert alert-danger alert-dismissible" id="msg" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4>Cet agent existe déjà</h4>
                          </div>
                  <?php }else if (isset($_GET['sms']) AND $_GET['sms'] == 2){ ?>
                    <div class="alert alert-success alert-dismissible" id="msg" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4>Agent Ajouté</h4>
                          </div>
                  <?php }else if (isset($_GET['sms']) AND $_GET['sms'] == 3){ ?>
                    <div class="alert alert-danger alert-dismissible" id="msg" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4>Erreur d'enregistrement</h4>
                          </div>
                  <?php }else if (isset($_GET['sms']) AND $_GET['sms'] == 4){ ?>
                    <div class="alert alert-danger alert-dismissible" id="msg" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4>Certains champs sont vides</h4>
                          </div>
                   <?php }
                  ?>
              </div>
              <div class="col-md-6">
                <input type="text" id="nom" name="nom" class="form-control" placeholder="Nom" required="required" autocomplete="off">
              </div>
              <div class="col-md-6">
                <input type="text" id="postnom" name="postnom" class="form-control" placeholder="Postnom" required="required" autocomplete="off">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <select name="sexe" id="sexe" class="form-control" required="" >
                  <option value="" selected="" disabled="">Sexe</option>
                  <option value="M">Masculin</option>
                  <option value="F">Féminin</option>
                </select>
              </div>
              <div class="col-md-6">
                <input type="text" id="tel" name="tel" class="form-control" placeholder="Téléphone" required="required" autocomplete="off">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <input type="text" id="matricule" name="matricule" class="form-control" placeholder="Matricule" required="required" autocomplete="off">
              </div>
              <div class="col-md-6">
                <input type="text" id="login" name="login" class="form-control" placeholder="Login" required="required" autocomplete="off">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <input type="text" id="password" name="password" class="form-control" placeholder="Password" required="required" autocomplete="off">
              </div>
              
            </div>
          </div>
         
          
          <button type="submit" name="save" class="btn btn-primary btn-block">Enregistrer</button><br>
        </form>
        
      </div>
    </div>
      <div class="spacer">
        
      </div>

      <!-- Sticky Footer -->
      <?php include('include/footer.php'); ?>