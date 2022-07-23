<?php 
  include('../access/security_adm.php');
  require_once ('../access/connex.php'); 
  

    if(isset($_GET['id'])){

      $id = $_GET['id'];

      $req=$bd->prepare('DELETE FROM comment WHERE id = ?');

      if ($req->execute(array($id))){

        header('location:listCommentaires.php');
      }else{

        header('location:listCommentaires.php');
      }
          
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

  <title>Commentaires sur des articles</title>

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

    <a class="navbar-brand mr-1" href="admin.php">Tableau de bord</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-fw fa-tachometer-alt"></i>
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

    <div id="content-wrapper" class="container-fluid">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="admin.php">Tableau de bord</a>
          </li>
          <li class="breadcrumb-item active">Commentaires des articles</li>
        </ol>

        <!-- DataTables Example -->
       <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Commentaires des articles 
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Noms</th>
                    <th>Email</th>
                    <th>Article</th>
                    <th>Commentaire</th>
                    <th>Action</th>
                  </tr>
                </thead>
                
                <tbody>
                  <?php 
                    $req=$bd->prepare("SELECT A.id as idCom, A.nom, A.email, A.comment,A.datePub,B.titre FROM comment AS A, article AS B WHERE A.idArticle = B.id ORDER BY A.datePub DESC");
                    $req->execute();
                    $i = 1;
                    while ($res = $req->fetch()) { ?>
                 
                  <tr style="font-size: 13px;">
                    
                    <td><?php echo $res['idCom'] ?></td>
                    <td><?php echo $res['nom'] ?></td>
                    <td> <a href="mailto:<?php echo $res['email'] ?>" title=""><?php echo $res['email'] ?></a></td>
                    <td><?php echo $res['titre'] ?></td>
                    <td><?php echo $res['comment'] ?></td>
                    <td>
                    <a href="?id=<?php echo $res['idCom'] ?>" title=""><button type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></a>
                  </td>
                  </tr>
                  <?php $i++; } ?>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>
    </div>


    <div class="modal fade" id="editBtn" tabindex="-1" role="dialog" aria-labelledby="Modregister" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content panel-primary">
            <div class="modal-header">
              <h4 class="modal-title" id="AddSectionLabel">Modification Partenaire</h4>
              <button type="button" class="close btn " data-dismiss="modal" aria-hidden="true">&times;</button>
                            
            </div>
            <div class="modal-body">
            <form action="../access/edit_partenaire.php" method="post" was-validate>
              <input type="hidden" name="id" id="id" class="form-control" placeholder="Id" required="required" >
              <div class="form-row">
                  <div class="col-md-12">
                    <label for="nom">Nom Entreprise</label>
                    <input type="text" id="nom" name="nom" class="form-control" placeholder="Nom Complet" required="required" autofocus="autofocus"> <br>
                  </div>
              </div>
              
              <div class="form-row">
                  <div class="col-md-6">
                    <div class="form-label-group">
                      <button type="submit" class="btn btn-secondary btn-block" data-dismiss="modal" name="btn">Annuler </button>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-label-group">
                      <button type="submit" class="btn btn-primary btn-block" name="update"> Modifier </button>
                    </div>
                  </div>
              </div>
                
            </div> 
            </form>
                 
                           
            </div>
            
            </form>
            
          </div>
  <!-- /.modal-content -->
        </div>
    </div>

    <div class="modal fade" id="supBtn" tabindex="-1" role="dialog" aria-labelledby="Modregister" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content panel-primary">
            <div class="modal-header">
              <h4 class="modal-title" id="AddSectionLabel">Suppression Partenaire</h4>
              <button type="button" class="close btn " data-dismiss="modal" aria-hidden="true">&times;</button>
                            
            </div>
            <div class="modal-body">
            <form action="../access/edit_partenaire.php" method="post" was-validate>
              <input type="hidden" name="id" id="idS" class="form-control" placeholder="Id" required="required" >
              <div class="form-row">
                  
                  <div class="col-md-12 text-center">
                    <h5>Voulez-vous vraiment supprimer ce partenaire ?</h5> <br>
                  </div>
                  
                  
              </div>
              
              <div class="form-row">
                  <div class="col-md-6">
                    <div class="form-label-group">
                      <button type="submit" class="btn btn-secondary btn-block" data-dismiss="modal" name="btn">Annuler </button>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-label-group">
                      <button type="submit" class="btn btn-primary btn-block" name="delete"> Oui </button>
                    </div>
                  </div>
              </div>
                
            </div> 
            </form>
                 
                           
            </div>
            
            </form>
            
          </div>
  <!-- /.modal-content -->
        </div>
    </div>
        
  
 <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>
    
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
          $('#nom').val(data[1]);
        });

      $('.supBtn').on('click', function(){
          $('#supBtn').modal('show');

          $tr =$(this).closest('tr');
          var data = $tr.children('td').map(function(){
            return $(this).text();
          }).get();
          console.log(data);

          $('#idS').val(data[0]);
        });
    });
  </script>

</body>

</html>
