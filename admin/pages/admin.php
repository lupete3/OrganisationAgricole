<?php 
  include('../access/security_adm.php');
  require_once ('../access/connex.php'); 
  $id= $_SESSION['profile']['admin']['id'];
  $username= $_SESSION['profile']['admin']['login'];

  $dt = date('Y-m-d');

  $req = $bd->prepare("SELECT COUNT(*) AS nbArticles FROM article ");
  $req->execute();
  $res = $req->fetch();

  $req1 = $bd->prepare("SELECT COUNT(*) AS nbUsers FROM users ");
  $req1->execute();
  $res1 = $req1->fetch();

  $req2 = $bd->prepare("SELECT COUNT(*) AS nbCategorie FROM categorie ");
  $req2->execute();
  $res2 = $req2->fetch();

  $req3 = $bd->prepare("SELECT COUNT(*) AS nbService FROM service ");
  $req3->execute();
  $res3 = $req3->fetch();

  $req4 = $bd->prepare("SELECT COUNT(*) AS nbPartenaires FROM partenaire ");
  $req4->execute();
  $res4 = $req4->fetch();

  $req5 = $bd->prepare("SELECT COUNT(*) AS nbEmail FROM email_box ");
  $req5->execute();
  $res5 = $req5->fetch();

  $req6 = $bd->prepare("SELECT COUNT(*) AS nbAbonne FROM subscribe ");
  $req6->execute();
  $res6 = $req6->fetch();

  $req7 = $bd->prepare("SELECT COUNT(*) AS nbAgentsAffect FROM affectation WHERE observation = 'affecté' ");
  $req7->execute();
  $res7 = $req7->fetch();

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
          Utilisateur <i class="fas fa-user-circle fa-fw"></i>
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
        <p style="font-size: 35px">Bonjour <?php echo $username;?> !</hp>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="../../index.php">Voir le site</a>
          </li>
          <li class="breadcrumb-item">
            <a href="#">Tableau de Bord</a>
          </li>
        </ol>
         <div class="alert alert-success alert-dismissible" id="msg" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button>
            <i class="fa fa-bullhorn" style="font-size: 24px;"></i> <span style="font-size: 20px;">Bienvenu dans votre espace d'Administration...</span>
          </div>

        <!-- Icon Cards-->
        <div class="row">
          <div class="col-md-3 spacer" >
            <div class="card border-primary o-hidden h-100">
              <div class="card-body text-primary" style="margin-bottom: -30px;">
                <div class="float-left">
                  <i class="fas fa-fw fa-rss" style="font-size: 55px;"></i>
                </div>
                <div class="float-right">
                  <h3 style="font-size: 35px;"><?php echo $res['nbArticles'] ?></h3>
                <p class="float-right" style="font-weight: bold;">Articles</p>
                </div>
              </div>
              <a class="card-footer text-primary clearfix small z-10" href="listArticles.php">
                <h6 class="float-left">Voir</h6>
                <h6 class="float-right">
                  <i class="fas fa-angle-right"></i>
                </h6>
              </a>
            </div>
          </div><br>
          <div class="col-md-3 spacer" >
            <div class="card border-danger o-hidden h-100">
              <div class="card-body text-danger" style="margin-bottom: -30px;">
                <div class="float-left">
                  <i class="fas fa-fw fa-users" style="font-size: 55px;"></i>
                </div>
                <div class="float-right">
                  <h3 style="font-size: 35px;"><?php echo $res1['nbUsers'] ?></h3>
                <p class="float-right" style="font-weight: bold;">Utilisateurs</p>
                </div>
              </div>
              <a class="card-footer text-danger clearfix small z-10" href="listAgents.php">
                <h6 class="float-left">Voir</h6>
                <h6 class="float-right">
                  <i class="fas fa-angle-right"></i>
                </h6>
              </a>
            </div>
          </div><br>
          <div class="col-md-3 spacer" >
            <div class="card border-success o-hidden h-100">
              <div class="card-body text-success" style="margin-bottom: -30px;">
                <div class="float-left">
                  <i class="fas fa-fw fa-folder" style="font-size: 55px;"></i>
                </div>
                <div class="float-right">
                  <h3 style="font-size: 35px;"><?php echo $res2['nbCategorie'] ?></h3>
                <p class="float-right" style="font-weight: bold;">Catégories Articles</p>
                </div>
              </div>
              <a class="card-footer text-success clearfix small z-10" href="listCategories.php">
                <h6 class="float-left">Voir</h6>
                <h6 class="float-right">
                  <i class="fas fa-angle-right"></i>
                </h6>
              </a>
            </div>
          </div><br>
          <div class="col-md-3 spacer" >
            <div class="card border-dark o-hidden h-100">
              <div class="card-body text-dark" style="margin-bottom: -30px;">
                <div class="float-left">
                  <i class="fas fa-fw fa-list" style="font-size: 55px;"></i>
                </div>
                <div class="float-right">
                  <h3 style="font-size: 35px;"><?php echo $res3['nbService'] ?></h3>
                <p class="float-right" style="font-weight: bold;"> Services</p>
                </div>
              </div>
              <a class="card-footer text-dark clearfix small z-10" href="listServices.php">
                <h6 class="float-left">Voir</h6>
                <h6 class="float-right">
                  <i class="fas fa-angle-right"></i>
                </h6>
              </a>
            </div>
          </div><br>
          <div class="col-md-3 spacer" >
            <div class="card border-warning o-hidden h-100">
              <div class="card-body text-warning" style="margin-bottom: -30px;">
                <div class="float-left">
                  <i class="fas fa-fw fa-user" style="font-size: 55px;"></i>
                </div>
                <div class="float-right">
                  <h3 style="font-size: 35px;"><?php echo $res4['nbPartenaires'] ?></h3>
                <p class="float-right" style="font-weight: bold;">Partenaires</p>
                </div>
              </div>
              <a class="card-footer text-warning clearfix small z-10" href="listPartenaires.php">
                <h6 class="float-left">Voir</h6>
                <h6 class="float-right">
                  <i class="fas fa-angle-right"></i>
                </h6>
              </a>
            </div>
          </div><br>
          <div class="col-md-3 spacer" >
            <div class="card border-info o-hidden h-100">
              <div class="card-body text-info" style="margin-bottom: -30px;">
                <div class="float-left">
                  <i class="fas fa-fw fa-envelope" style="font-size: 55px;"></i>
                </div>
                <div class="float-right">
                  <h3 style="font-size: 35px;"><?php echo $res5['nbEmail'] ?></h3>
                <p class="float-right" style="font-weight: bold;">Mails</p>
                </div>
              </div>
              <a class="card-footer text-info clearfix small z-10" href="listMessages.php">
                <h6 class="float-left">Voir</h6>
                <h6 class="float-right">
                  <i class="fas fa-angle-right"></i>
                </h6>
              </a>
            </div>
          </div><br>
          <div class="col-md-3 spacer" >
            <div class="card border-danger o-hidden h-100">
              <div class="card-body text-danger" style="margin-bottom: -30px;">
                <div class="float-left">
                  <i class="fas fa-fw fa-users" style="font-size: 55px;"></i>
                </div>
                <div class="float-right">
                  <h3 style="font-size: 35px;"><?php echo $res6['nbAbonne'] ?></h3>
                <p class="float-right" style="font-weight: bold;">Abonnés</p>
                </div>
              </div>
              <a class="card-footer text-danger clearfix small z-10" href="#">
                <h6 class="float-left"></h6>
                <h6 class="float-right">
                  <i class="fas fa-angle-right"></i>
                </h6>
              </a>
            </div>
          </div><br>
          
        </div>
        

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <?php include('include/footer.php'); ?>
