<?php 
  
  include('../access/security_adm.php');
  require_once ('../access/connex.php'); 
  $id= $_SESSION['profile']['admin']['id'];
  $username= $_SESSION['profile']['admin']['login'];

  function getDay($dateDebut,$dateFin){
    $debut = explode("-", $dateDebut);
    $fin = explode("-", $dateFin);

    $diff = mktime(0,0,0, $fin[1], $fin[2], $fin[0]) - mktime(0,0,0, $debut[1], $debut[2], $debut[0]);

    return (($diff / 86400) + 1);
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

    <a class="navbar-brand mr-1" href="espace_agent.php">Espace Admin </a>

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
            <a href="espace_agentRH.php">Accueil</a>
          </li>
          <li class="breadcrumb-item active">Liste des agents partis en congé</li>
        </ol>
        <div class="row">
          <div class="col-md-12">
                 <?php 
                  if (isset($_GET['sms']) AND $_GET['sms'] == 0) { ?>
                    <div class="alert alert-danger alert-dismissible" id="msg" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4><?php echo $_GET['err']; ?></h4>
                          </div>
                  <?php }else if (isset($_GET['sms']) AND $_GET['sms'] == 1){ ?>
                    <div class="alert alert-success alert-dismissible" id="msg" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4><?php echo $_GET['err']; ?></h4>
                          </div>
                  <?php }else if (isset($_GET['sms']) AND $_GET['sms'] == 2){ ?>
                    <div class="alert alert-danger alert-dismissible" id="msg" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4><?php echo $_GET['err']; ?></h4>
                          </div>
                  <?php }else if (isset($_GET['sms']) AND $_GET['sms'] == 3){ ?>
                    <div class="alert alert-danger alert-dismissible" id="msg" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4><?php echo $_GET['err']; ?></h4>
                          </div>
                   <?php }
                  ?>
              </div>
        </div>        <!-- DataTables Example -->
       <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Liste des agents partis en congé <h4 class="float-right"><a href="ficheAgentsCongeAdm.php" target="blank" class="btn btn-sm btn-success" title=""><i class="fa fa-print"></i> Imprimer la fiche</a></button> </h4></div>
          <div class="card-body">
            <div class="table-responsive">
              
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nom Complet</th>
                    <th>Date Congé</th>
                    <th>Date Debut</th>
                    <th>Date Fin</th>
                    <th>Nbre Jours</th>
                    <th>Service</th>
                    <th>Motif</th>
                    <th>Action</th>
                  </tr>
                </thead>
                
                <tbody>
                  <?php $obs = 'congé'; 
                    $req=$bd->prepare("SELECT A.noms, B.id, B.dateDemande, B.dateDebut, B.dateFin, B.motif, C.denomination FROM agent AS A,conge AS B, service AS C WHERE B.idAgent = A.id AND A.idService = C.id AND B.statut = ? ");
                    $req->execute(array($obs));
                    while ($res = $req->fetch()) { ?>

                    
                   <tr>

                    <td><?php echo $res['id'] ?></td>
                    <td><?php echo $res['noms'] ?></td>
                    <td><?php echo $res['dateDemande'] ?></td>
                    <td><?php echo $res['dateDebut'] ?></td>
                    <td><?php echo $res['dateFin'] ?></td>
                    <td><?php echo getDay($res['dateDebut'], $res['dateFin']).' jours'?></td>
                    <td><?php echo $res['denomination'] ?></td>
                    <td><?php echo $res['motif'] ?></td>
                    <td>
                      
                      <button class="btn btn-danger btn-sm editBtn"><i class="fa fa-trash" title="Fin congé"></i> Fin Congé</button>
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
  
  <div class="modal fade" id="editBtn" tabindex="-1" role="dialog" aria-labelledby="Modregister" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content panel-primary">
        <div class="modal-header">

          <h4 class="modal-title" id="AddSectionLabel">Désaffecter Agent</h4>
          <button type="button" class="close btn " data-dismiss="modal" aria-hidden="true">&times;</button>
                        
        </div>
        <div class="modal-body">
        <form action="../access/finConge.php" method="POST" was-validate>
          <input type="hidden" name="id" id="id" class="form-control" placeholder="Id" required="required" >

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12 text-center">
                <h4>Etes-vous sûr de vouloir mettre fin au congé de cet agent ?</h4>
              </div>
            </div>
          </div>

           
          <br>
          <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <button type="submit" class="btn btn-secondary btn-block" data-dismiss="modal" name="btn">Non </button>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <button type="submit" class="btn btn-primary btn-block" name="finAff"> Oui </button>
                </div>
              </div>
          </div>
        </form> 
        </div> 
                
      </div>
    </div>
  </div>


  <!-- Bootstrap core JavaScript-->

  <script type="text/javascript">
    $(document).ready(function() {
      $('.editBtn').on('click', function(){
          $('#editBtn').modal('show');

          $tr =$(this).closest('tr');
          var data = $tr.children('td').map(function(){
            return $(this).text();
          }).get();
          console.log(data);

          $('#id').val(data[0]);
        });

      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>

</body>

</html>
