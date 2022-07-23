<?php 
  include('../access/security_agentRH.php');
  require_once ('../access/connex.php'); 
  $id= $_SESSION['profile']['grh']['id'];
  

  $dt = date('Y-m-d');

  $username= $_SESSION['profile']['grh']['login'];

  $req = $bd->prepare("SELECT COUNT(*) AS nbAgentsPresent FROM presence AS A, agent AS B, bureau AS C WHERE A.idAgent = B.id AND B.idBureau = C.id AND C.id = ? AND datePresence LIKE '%$dt%' ");
  $req->execute(array($idB));
  $res = $req->fetch();

  $req1 = $bd->prepare("SELECT COUNT(*) AS nbAgentsSortie FROM sortie AS A, agent AS B, bureau AS C WHERE A.idAgent = B.id AND B.idBureau = C.id AND C.id = ? AND dateSortie LIKE '%$dt%'");
  $req1->execute(array($idB));
  $res1 = $req1->fetch();

  $req2 = $bd->prepare("SELECT COUNT(*) AS nbAgents FROM agent AS A, bureau AS B, service AS C WHERE A.idBureau = B.id AND A.idService = C.id AND B.id = ?");
  $req2->execute(array($idB));
  $res2 = $req2->fetch();

  $req3 = $bd->prepare("SELECT COUNT(*) AS nbService FROM service ");
  $req3->execute();
  $res3 = $req3->fetch();

  $req4 = $bd->prepare("SELECT COUNT(*) AS nbAgentConge FROM conge AS A, agent AS B, bureau AS C WHERE A.idAgent = B.id AND B.idBureau = C.id AND C.id = ? AND statut = ? ");
  $req4->execute(array($idB,'congé'));
  $res4 = $req4->fetch();

 ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Espace GRH</title>

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

    <a class="navbar-brand mr-1" href="index.html">Espace GRH</a>

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

    <?php include('include/sidebarGRH.php'); ?>
    
    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Accueil</a>
          </li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
          <div class="col-md-4 spacer" >
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-user-plus"></i>
                </div>
                <h3><?php echo $res['nbAgentsPresent'] ?> Agents Présents </h3>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="listStagServiceAgent.php">
                <h4 class="float-left">En Savoir plus</h4>
                <h4 class="float-right">
                  <i class="fas fa-angle-right"></i>
                </h4>
              </a>
            </div>
          </div><br>
          <div class="col-md-4 spacer">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-users"></i>
                </div>
                <h3><?php echo $res1['nbAgentsSortie'] ?> Agents Sortis</h3>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="listAgentPresentAg.php">
                <h4 class="float-left">En Savoir plus</h4>
                <h4 class="float-right">
                  <i class="fas fa-angle-right"></i>
                </h4>
              </a>
            </div>
          </div><br>
          <div class="col-md-4 spacer">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-user"></i>
                </div>
                <h3> <?php echo $res4['nbAgentConge'] ?> Agents en congé </h3>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="ficheAgentsConge.php">
                <h4 class="float-left">En Savoir plus</h4>
                <h4 class="float-right">
                  <i class="fas fa-angle-right"></i>
                </h4>
              </a>
            </div>
          </div><br><br><br><br>
          <div class="col-md-4 spacer">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-home"></i>
                </div>
                <h3><?php echo $res2['nbAgents'] ?> Total Agents</h3>
              </div>
              <a class="card-footer text-white clearfix small z-1" target="blank" href="ficheAgents.php">
                <h4 class="float-left">En Savoir plus</h4>
                <h4 class="float-right">
                  <i class="fas fa-angle-right"></i>
                </h4>
              </a>
            </div>
          </div>
          <div class="col-md-4 spacer">
            <div class="card text-white bg-info o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-home"></i>
                </div>
                <h3><?php echo $res3['nbService'] ?> Services</h3>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="listServicesRH.php">
                <h4 class="float-left">En Savoir plus</h4>
                <h4 class="float-right">
                  <i class="fas fa-angle-right"></i>
                </h4>
              </a>
            </div>
          </div>
        </div>
        

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <?php include('include/footer.php'); ?>
