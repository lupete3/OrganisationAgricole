<!doctype html>
<html lang="en">

<?php require_once ('admin/access/connex.php');  ?>
   

<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" href="images/favicon.png">
      <title>Notre Blog</title>
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
         <section class="wf100 inner-header" style="height: 150px; padding-top: 20px;">
            <div class="container">
               <h1>Nos Publications</h1>
               <ul>
                  <li><a href="index.php">Accueil</a></li>
                  <li><a href="#"> Articles </a></li>
               </ul>
            </div>
         </section>
         <!--Inner Header End--> 
         <!--Blog Start-->
         <div class="container">
            <div class="col-lg-3 float-right" style="margin-bottom: -50px; margin-top: 30px;">
            <div class="">
               <h5>Rechercher</h5>
               <div class="side-search">
                  <form action="blog.php" method="get">
                     <input type="search" name="txt" class="form-control" placeholder="Rechercher un article">
                     <button type="submit" name="search"><i class="fas fa-search"></i></button>
                  </form>
               </div>
            </div>
         </div>
         </div>
         <section class="wf100 p80 blog">
            <div class="blog-grid-medium">
               <div class="container">
                  <div class="row">
                     <?php 

                     //Delimiter le nombre des articles à afficher par page
                     $articleparPage = 9;
                     $totalArticlesReq = $bd->prepare('SELECT A.id as idArt, A.titre, A.detail, A.datePub, A.img_one, B.nom, C.libelle FROM article AS A, users AS B, categorie AS C WHERE A.idUser = B.id AND A.idCat = C.id ORDER BY datePub DESC');
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
                         $req=$bd->prepare("SELECT A.id as idArt, A.titre, A.detail, A.datePub, A.img_one, B.nom, C.libelle FROM article AS A, users AS B, categorie AS C WHERE A.idUser = B.id AND A.idCat = C.id AND A.titre LIKE '%$text%' || A.detail LIKE '%$text%'|| A.datePub LIKE '%$text%' || C.libelle LIKE '%$text%' ");
                         $req->execute();
                      }else header('location:blog.php');
                   } else

                    $req=$bd->prepare('SELECT A.id as idArt, A.titre, A.detail, A.datePub, A.img_one, B.nom, C.libelle FROM article AS A, users AS B, categorie AS C WHERE A.idUser = B.id AND A.idCat = C.id ORDER BY datePub DESC LIMIT '.$depart.','.$articleparPage);
                    $req->execute();

                     
                    while ($res = $req->fetch()) {  
                     ?>
                     <!--Blog Small Post Start-->
                     <div class="col-md-4 col-sm-6">
                        <div class="blog-post">
                           <div class="blog-thumb"> <a href="blogDetails.php?idPost=<?php echo $res['idArt'];?>"><i class="fas fa-link"></i></a> <img src="images/blog/<?php echo $res['img_one'] ?>" alt="" style="height: 200px;"> </div>
                           <div class="post-txt">
                              <h5><a href="blogDetails.php?idPost=<?php echo $res['idArt'];?>"><?php echo $res['titre'] ?></a></h5>
                              <p><?php echo substr($res['detail'], 0,215).' ...'; ?></p>
                           </div>
                           <ul class="post-meta">
                              <li> <a href="blogDetails.php?idPost=<?php echo $res['idArt'];?>"><i class="fas fa-calendar-alt"></i> <?php echo $res['datePub'] ?></a> </li>
                              <li> <a href="blogDetails.php?idPost=<?php echo $res['idArt'];?>"><i class="fas fa-comments"></i> 134 Comments</a> </li>
                           </ul>
                        </div>
                     </div>
                  <?php } ?>
                     <!--Blog Small Post End--> 
                  </div>
                  <?php if (isset($_GET['search'])) {

                  }else {?>
                  <div class="gt-pagination">
                     <nav>
                        <ul class="pagination">
                           

                           <?php 
                              $prec = $pageCourante - 1;
                              $suiv = $pageCourante + 1;
                              if ($suiv > $pagesTotales) {
                                 $suiv = $pageCourante;
                              }
                              echo '<li class="page-item"> <a class="page-link" href="blog.php?page='.$prec.'" aria-label="Previous"> <i class="fas fa-angle-left"></i> </a> </li>';

                                 for ($i=1; $i <= $pagesTotales; $i++) { 
                                    echo '<li class="page-item "><a class="page-link" href="blog.php?page='.$i.'">'.$i.'</a></li>';
                                 }
                                    echo '<li class="page-item"> <a class="page-link" href="blog.php?page='.$suiv.'" aria-label="Next"> <i class="fas fa-angle-right"></i> </a> </li>';
                           ?>

                        </ul>
                     </nav>
                  </div>
               <?php } ?>
               </div>
            </div>
         </section>
         <!--Blog End--> 
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