<?php 
  include('../access/security_adm.php');
  require_once ('../access/connex.php'); 


  $req=$bd->prepare("SELECT * FROM contact_company ");
  $req->execute();
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

  <title>Notre Adresse</title>

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
          <li class="breadcrumb-item active">Adresse de l'entreprise</li>
        </ol>
        <form action="../access/edit_adresse.php" method="POST" enctype="multipart/form-data">

        <!-- DataTables Example -->
        <div class=" col-md-12 text-right" style="margin-bottom: -45px;">
          <button type="submit" name="save" class="btn btn-sm btn-primary "><i class="fa fa-check-circle"></i> Mettre à jour les informations</button>
        </div>
       <div class="card mx-auto mt-5">
        <div class="card-header text-uppercase">Adresse de l'entreprise</div>
          <div class="card-body">
            
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-12">
                     <?php 
                       if (isset($_GET['sms']) AND $_GET['sms'] == 2){ ?>
                        <div class="alert alert-success alert-dismissible" id="msg" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h6>Mise à jour effectuée avec succès</h6>
                              </div>
                      <?php }else if (isset($_GET['sms']) AND $_GET['sms'] == 3){ ?>
                        <div class="alert alert-danger alert-dismissible" id="msg" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h6>Erreur lors de la mise à jour des information</h6>
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
                    <input type="hidden" id="" name="id" class="form-control" placeholder="ID " required="required" autocomplete="off" value="<?php echo $res['id'] ?>">
                    <label for="#detail">Adresse de l'entreprise<i class="text-danger">*</i></label>
                    <input type="text" id="firstName" name="adresse" class="form-control" placeholder="Titre" required="required" autocomplete="off" value="<?php echo $res['adresse'] ?>"><br>
                  </div>
                  <div class="col-md-12">
                    <label for="#detail">Email de l'entreprise <i class="text-danger">*</i></label>
                    <input type="text" id="slogan" name="email" class="form-control" placeholder="Emails de l'entreprise" required="required" autocomplete="off" value="<?php echo $res['email'] ?>"><br>
                  </div>
                  <div class="col-md-12">
                    <label for="#detail">Numéros téléphone de l'entreprise <i class="text-danger">*</i></label>
                    <input type="text" id="slogan" name="phone" class="form-control" placeholder="Numéros de téléphone" required="required" autocomplete="off" value="<?php echo $res['phone'] ?>"><br>
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
