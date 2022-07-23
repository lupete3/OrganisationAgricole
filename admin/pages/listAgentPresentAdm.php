<?php 

  include('../access/security_adm.php');
  require_once ('../access/connex.php'); 
  $id= $_SESSION['profile']['admin']['id'];
  $username= $_SESSION['profile']['admin']['login'];
  

  function getTimeDiff($dtime,$atime){
    $nextDay = $dtime>$atime?1:0;
    $dep = explode(':', $dtime);
    $arr = explode(':', $atime);
    $diff = abs(mktime($dep[0],$dep[1],0,date('n'),date('j'),date('y'))-mktime($arr[0],$dep[1],0,date('n'),date('j')+$nextDay,date('y')));
    $hours = floor($diff/(60*60));
    $mins = floor(($diff-($hours*60*60))/($hours*60));
    $secs = floor(($diff-(($hours*60*60)+($mins*60))));
    if (strlen($hours)<2) {$hours="0".$hours;}
    if (strlen($mins)<2) {$mins="0".$mins;}
    if (strlen($secs)<2) {$secs="0".$secs;}

    return $hours.':'.$mins;
  }
 ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta charset="utf-8">

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

    <a class="navbar-brand mr-1" href="espace_agent.php">Espace Agent </a>

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
          <li class="breadcrumb-item active">Liste des agents présents</li>
        </ol>
        <!-- DataTables Example -->
       <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Liste des agents Présents <?php echo  date('d-m-Y'); ?> <a href="fichelistAgentPresentAdm.php" target="_blank" class="btn btn-info float-right"><span class="fa fa-print"></span> Imprimer la liste</a></div>
          <div class="card-body">
            <div class="table-responsive">
              
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nom Complet</th>
                    <th>Fonction</th>
                    <th>Matricule</th>
                    <th>Grade</th>
                    <th>Heure Arrivée au Travail</th>
                    <th>Service</th>
                    <th>Bureau Urbain</th>
                    <th>Observation</th>
                  </tr>
                </thead>
                
                <tbody>
                  <?php 
                  $date = date('Y-m-d');

                    $req=$bd->prepare("SELECT A.id,A.noms,A.sexe,A.titre,A.matricule,A.grade,A.login,A.password,B.denomination,C.heureArrive,C.datePresence,C.observation,D.libelle FROM agent AS A,service AS B, presence AS C, bureau AS D WHERE A.idService = B.id AND C.idAgent = A.id AND A.idBureau = D.id AND C.datePresence = ? ORDER BY libelle ASC");
                    $req->execute(array($date));
                    while ($res = $req->fetch()) { ?>
                  <tr>
                    <td><?php echo $res['id'] ?></td>
                    <td><?php echo $res['noms'] ?></td>
                    <td><?php echo $res['titre'] ?></td>
                    <td><?php echo $res['matricule'] ?></td>
                    <td><?php echo $res['grade'] ?></td>
                    
                    <?php $tt = $res['heureArrive']; ?>
                    <td><?php echo (($tt < '08:00' || $tt > '08:30' )?'<span class="text-danger">'.$tt.'</span>':'<span class="text-primary">'.$tt.'');  ?>
                    <td><?php echo $res['denomination'] ?></td>
                    <td><?php echo $res['libelle'] ?></td>
                    <td><?php echo $res['observation'] ?></td>
                    
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      <div class="spacer">
        
      </div>

      <!-- Sticky Footer -->
      <?php include('include/footerList.php'); ?>

  <!-- Valid Modal-->
  

</body>

</html>
