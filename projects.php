<!doctype html>
<html lang="en">

<?php require_once ('admin/access/connex.php');  ?>
   

<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" href="images/favicon.png">
      <title>Nos Projets</title>
      <!-- CSS FILES START -->
      <link href="css/custom.css" rel="stylesheet">
      <link href="css/color.css" rel="stylesheet">
      <link href="css/responsive.css" rel="stylesheet">
      <link href="css/owl.carousel.min.css" rel="stylesheet">
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/prettyPhoto.css" rel="stylesheet">
      <link href="css/all.min.css" rel="stylesheet">
      <!-- CSS FILES End -->
   </head>
   <body>
      <div class="wrapper">
         <!--Header Start-->
         <?php include('header.php'); ?>
         <div id="search">
            <button type="button" class="close">×</button>
            <form class="search-overlay-form">
               <input type="search" value="" placeholder="type keyword(s) here" />
               <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
            </form>
         </div>
         <!--Header End-->
         <!--Inner Header Start-->
         <section class="wf100 p100 inner-header" style="height: 150px; padding-top: 20px;">
            <div class="container" >
               <h1>Projects</h1>
               <ul>
                  <li><a href="index.php">Accueil</a></li>
                  <li><a href="#">Nos Projets</a></li>
               </ul>
            </div>
         </section>
         <!--Inner Header End--> 
         <!--Causes Start-->
         <section class="wf100 p80 projects">
            <div class="projects-list">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-9 col-md-8">
                        <!--Project Box Start-->
                        <?php 

                     //Delimiter le nombre des articles à afficher par page
                     $articleparPage = 3;
                     $totalArticlesReq = $bd->prepare('SELECT * FROM projet ORDER BY datePub DESC');
                     $totalArticlesReq->execute();
                     $totalArticles = $totalArticlesReq->rowCount();
                     $pagesTotales = ceil($totalArticles / $articleparPage);

                     if (isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0) {
                        $_GET['page'] = intval($_GET['page']);
                        $pageCourante = $_GET['page'];
                     }else{
                        $pageCourante = 1;
                     }

                     $depart = ($pageCourante - 1) * $articleparPage;

                   if (isset($_GET['search'])) {
                     $text = $_GET['txt'];
                      if (!empty($text)) {
                         $req=$bd->prepare("SELECT * FROM projet WHERE titre LIKE '%$text%' || detail LIKE '%$text%'|| datePub LIKE '%$text%'");
                         $req->execute();
                      }else header('location:projects.php');
                   } else

                    $req=$bd->prepare('SELECT * FROM projet ORDER BY datePub DESC LIMIT '.$depart.','.$articleparPage);
                    $req->execute();

                     
                    while ($res = $req->fetch()) {  
                     ?>
                        <div class="pro-list-box">
                           <div class="pro-thumb"> <a href="projetDetail.php?idP=<?php echo $res['id'] ?>"><i class="fas fa-link"></i></a> <img src="images/<?php echo $res['image']; ?>" alt="" style="height: 300px;"> </div>
                           <div class="pro-txt">
                              <h3> <a href="projetDetail.php?idP=<?php echo $res['id'] ?>"><?php echo $res['titre']; ?></a> </h3>
                              <p> <?php echo $res['detail']; ?> </p>
                              <a href="projetDetail.php?idP=<?php echo $res['id'] ?>" class="view">Plus de Détails</a> 
                           </div>
                        </div>
                     <?php } ?>
                        
                        <!--Project Box End--> 
                     </div>
                     <div class="col-lg-3 col-md-4">
                        <div class="sidebar">
                           <!--Widget Start-->
                           <div class="side-widget">
                              <h5>Rechercher</h5>
                              <div class="side-search">
                                 <form action="projects.php" method="get">
                                    <input type="search" class="form-control" name="txt" placeholder="Rechercher">
                                    <button type="submit" name="search"><i class="fas fa-search"></i></button>
                                 </form>
                              </div>
                           </div>
                           <!--Widget End--> 
                           <!--Widget Start-->
                           <div class="side-widget text-widget">
                              <h5>A Savoir</h5>
                              <p> L'inadéquation entre la demande et l'offre où la demande est cohérente mais l'offre est incohérente en raison de l'ignorance parmi les agriculteurs de ce qui est produit par les autres agriculteurs dans cette région , ville ou province.Cela conduit à une surproduction ou à une sous-production. </p>
                           </div>
                           <!--Widget End--> 
                           <!--Widget Start-->
                           <div class="side-widget">
                              <h5>Derniers Articles</h5>
                              <ul class="lastest-products">
                                 <?php
                                    $req1=$bd->prepare('SELECT A.id as idArt, A.titre, A.detail, A.datePub, A.img_one, B.nom, C.libelle FROM article AS A, users AS B, categorie AS C WHERE A.idUser = B.id AND A.idCat = C.id ORDER BY datePub DESC LIMIT 0,3');
                                   $req1->execute();
                                   while ($res1 = $req1->fetch()) { ?>

                                 <li> <img src="images/blog/<?php echo $res1['img_one'] ?>" alt="" style="height: 60px; width: 65px"> <strong><a href="blogDetails.php?idPost=<?php echo $res1['idArt'];?>"><?php echo $res1['titre'] ; ?></a></strong> <span class="pdate"><i class="fas fa-calendar-alt"></i> <?php echo $res1['datePub'] ?></span> </li> <?php } ?>
                              </ul>
                           </div>
                           <!--Widget Start--> 
                           <!--Widget Start-->
                           <div class="side-widget project-list-widget">
                              <h5>Recents Projets</h5>
                              <ul>
                                 <?php 
                                    $req=$bd->prepare('SELECT * FROM projet ORDER BY datePub DESC LIMIT 0,4');
                                    $req->execute();                     
                                    while ($res = $req->fetch()) {

                                  ?>
                                 <li><a href="projetDetail.php?idP=<?php echo $res['id']; ?>"><?php echo $res['titre']; ?></a></li>
                                 <?php } ?>
                              </ul>
                           </div>
                           <!--Widget End--> 
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <?php if (isset($_GET['search'])) {

                  }else {?>
                  <div class="gt-pagination mt20">
                     <nav>
                        <ul class="pagination">
                           

                           <?php 
                              $prec = $pageCourante - 1;
                              $suiv = $pageCourante + 1;
                              if ($suiv > $pagesTotales) {
                                 $suiv = $pageCourante;
                                 $a = "active";
                              }else $a = "";
                              echo '<li class="page-item"> <a class="page-link" href="projects.php?page='.$prec.'" aria-label="Previous"> <i class="fas fa-angle-left"></i> </a> </li>';

                                 for ($i=1; $i <= $pagesTotales; $i++) { 
                                    echo '<li class="page-item "><a class="page-link" href="projects.php?page='.$i.'">'.$i.'</a></li>';
                                 }
                                    echo '<li class="page-item"> <a class="page-link" href="projects.php?page='.$suiv.'" aria-label="Next"> <i class="fas fa-angle-right"></i> </a> </li>';
                           ?>

                        </ul>
                     </nav>
                  </div>
               <?php } ?>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!--Causes End--> 
         <!--Footer Start-->
        <?php include('footer.php'); ?>
         <!--Footer End--> 
      </div>
      <!--   JS Files Start  --> 
      <script src="js/jquery-3.3.1.min.js"></script> 
      <script src="js/jquery-migrate-1.4.1.min.js"></script> 
      <script src="js/popper.min.js"></script> 
      <script src="js/bootstrap.min.js"></script> 
      <script src="js/owl.carousel.min.js"></script> 
      <script src="js/jquery.prettyPhoto.js"></script> 
      <script src="js/isotope.min.js"></script> 
      <script src="js/custom.js"></script>
   </body>


</html>