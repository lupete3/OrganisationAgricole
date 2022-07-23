<?php 
  include('../access/security_adm.php');
  require_once ('../access/connex.php'); 

  $idPro = $_GET['idAr'];

  $req=$bd->prepare("SELECT * FROM projet WHERE id = ?");
  $req->execute(array($idPro));
  $res = $req->fetch();
  

 ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Gestion Projet</title>

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

    <a class="navbar-brand mr-1" href="admin.pgp">Tableau de bord</a>

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
            <a href="admin.php">Tableau de Bord</a>
          </li>
          <li class="breadcrumb-item active">Modification Projet</li>
        </ol>
        <form action="../access/edit_projet.php" method="POST" enctype="multipart/form-data">

        <!-- DataTables Example -->
        <div class=" col-md-12 text-right" style="margin-bottom: -45px;">
          <button type="submit" name="save" class="btn btn-sm btn-primary "><i class="fa fa-check-circle"></i> Enregistrer la mofification</button>
          <a href="gProjets.php" title=""><button type="button" class="btn btn-sm btn-success "><i class="fa fa-plus-circle"></i> Ajouter un nouvel projet</button></a>
          <button type="submit" name="delete" class="btn btn-sm btn-danger "><i class="fa fa-trash"></i> Supprimer le projet</button>
          <a href="listArticles.php" title=""><button type="button" class="btn btn-sm btn-secondary "><i class="fa fa-list"></i> Liste des projets</button></a>
        </div>
       <div class="card mx-auto mt-5">
        <div class="card-header text-uppercase">Modifier projet</div>
          <div class="card-body">
            
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-12">
                     <?php 
                       if (isset($_GET['sms']) AND $_GET['sms'] == 2){ ?>
                        <div class="alert alert-success alert-dismissible" id="msg" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h6>Projet modifié avec succès</h6>
                              </div>
                      <?php }else if (isset($_GET['sms']) AND $_GET['sms'] == 3){ ?>
                        <div class="alert alert-danger alert-dismissible" id="msg" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h6>Erreur de modification du projet</h6>
                              </div>
                      <?php }else if (isset($_GET['sms']) AND $_GET['sms'] == 4){ ?>
                        <div class="alert alert-danger alert-dismissible" id="msg" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h6>Vueillez compléter tous les champs !</h6>
                              </div>
                       <?php }
                      ?>
                  </div>
                              
                  <div class="col-md-12">
                    <input type="hidden" id="" name="id" class="form-control" placeholder="ID User" required="required" autocomplete="off" value="<?php echo $res['id'] ?>">
                    <label for="#detail">Titre du projet <i class="text-danger">*</i></label>
                    <input type="text" id="firstName" name="titre" class="form-control" placeholder="Titre" required="required" autocomplete="off" value="<?php echo $res['titre'] ?>"><br>
                  </div>
                  
                  <div class="col-md-12">
                    <label for="#detail">Détail du projet <i class="text-danger">*</i></label>
                    <textarea class="form-control ckeditor" id="detail" name="detail" required><?php echo $res['detail'] ?></textarea><br>
                  </div>
                  <div class="col-md-6" style="margin-bottom: 10px;">
                    <img src="../../images/<?php echo $res['image'] ?>" class="border-primary" height="100" border="4" alt=""> 
                  </div><br>
                  <div class="col-md-6">
                    <label for="">Choisir une image</label>
                    <input type="file" name="photo" value="<?php echo $res['image'] ?>" class="" id="custom-file" >
                  </div>
                  
                </div>
              </div>
              
            </form>
            
          </div>
        </div>

      </div>
      <div class="spacer">
        
      </div>

      <!-- Sticky Footer -->
      <?php include('include/footer.php'); ?>

  <!-- bootstrap-wysiwyg -->
  <script src="js/jquery.hotkeys.js"></script>
  <script src="js/bootstrap-wysiwyg.js"></script>
  <script src="js/bootstrap-wysiwyg-custom.js"></script>
  <script src="js/moment.js"></script>
  <script src="js/bootstrap-colorpicker.js"></script>
  <script src="js/daterangepicker.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <!-- ck editor -->
  <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
  <!-- custom form component script for this page-->
  <script src="js/form-component.js"></script>
  <!-- custome script for all page -->
  <script src="js/scripts.js"></script>
