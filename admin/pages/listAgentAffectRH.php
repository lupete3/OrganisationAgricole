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
          <li class="breadcrumb-item active">Liste des agents</li>
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
            Liste des agents <h4 class="float-right">Le <?php echo  date('d-m-Y'); ?></h4></div>
          <div class="card-body">
            <div class="table-responsive">
              
              <table class="table table-bordered table-sm"  id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nom Complet</th>
                    <th>Sexe</th>
                    <th>Fonction</th>
                    <th>Matricule</th>
                    <th>Grade</th>
                    <th>Service</th>
                    <th>Bureau Urbain</th>
                    <th>Action</th>
                  </tr>
                </thead>
                
                <tbody>
                  <?php 
                    $req=$bd->prepare("SELECT A.id,A.noms,A.sexe,A.titre,A.matricule,A.grade,A.login,A.password,B.denomination, C.libelle FROM agent AS A,service AS B, bureau AS C WHERE A.idService = B.id AND A.idBureau = C.id ORDER BY libelle ASC");
                    $req->execute();
                    while ($res = $req->fetch()) { 

                     $obs = 'affecté'; 
                     $req1=$bd->prepare("SELECT A.id, B.observation FROM agent AS A,affectation AS B WHERE B.idAgent = A.id AND B.observation = ? ");
                    $req1->execute(array($obs));
                    $res1 = $req1->fetch();
                    if ($res1) { } else ?>
                   <tr>

                    <td><?php echo $res['id'] ?></td>
                    <td><?php echo $res['noms'] ?></td>
                    <td><?php echo $res['sexe'] ?></td>
                    <td><?php echo $res['titre'] ?></td>
                    <td><?php echo $res['matricule'] ?></td>
                    <td><?php echo $res['grade'] ?></td>
                    <td><?php echo $res['denomination'] ?></td>
                    <td><?php echo $res['libelle'] ?></td>
                    <td>
                      <?php $date = date('Y-m-d'); $req1=$bd->prepare("SELECT A.id, B.dateAffectation,B.dateFin FROM agent AS A,affectation AS B WHERE B.idAgent = A.id AND A.id = ? AND B.observation = ? ");
                    $req1->execute(array($res['id'],$obs));
                    $res1 = $req1->fetch();
                    if ($date < $res1['dateFin']) { 
                      echo '<span class="badge badge-success">Affecté</span>';
                     }else{
                     ?>
                      <button class="btn btn-info btn-sm editBtn"><i class="fa fa-check-circle" title="Signaler la présence"></i> Affecter</button>
                      <?php } ?>
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

          <h4 class="modal-title" id="AddSectionLabel">Affecter Agent</h4>
          <button type="button" class="close btn " data-dismiss="modal" aria-hidden="true">&times;</button>
                        
        </div>
        <div class="modal-body">
        <form action="../access/addAffectation.php" method="POST" was-validate>
          <input type="hidden" name="id" id="id" class="form-control" placeholder="Id" required="required" >

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="">Date Debut</label>
                <input type="date" id="dateDeut" name="dateDeut" class="form-control" placeholder="Date Début" required="required" autocomplete="off">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="">Date Fin</label>
                <input type="date" id="dateFin" name="dateFin" class="form-control" placeholder="Date Fin" required="required" autocomplete="off">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <select name="maison" id="maison" class="form-control" required="" >

                  <option value="" selected="" disabled="">Comptoir</option>
                  <?php 
                    $req=$bd->prepare("SELECT * FROM maison ");
                    $req->execute();
                    while ($res = $req->fetch()) { ?>
                  <option value="<?php echo $res['id'] ?>"><?php echo $res['designation'].' / '.$res['adresse'] ?></option>
                <?php } ?>
                </select>
              </div>
            </div>
          </div>
          
          <br>
          <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <button type="submit" class="btn btn-secondary btn-block" data-dismiss="modal" name="btn">Annuler </button>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <button type="submit" class="btn btn-primary btn-block" name="envoyer"> Enregistrer </button>
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
