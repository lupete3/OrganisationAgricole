<!doctype html>
<html lang="en">

<?php 

require_once ('admin/access/connex.php');   

   $idAr = $_GET['idPost'];

  $req=$bd->prepare("SELECT A.id as idArt, A.titre, A.detail, A.datePub, A.img_one, A.img_two, A.img_tree, B.nom, C.id, C.libelle FROM article AS A, users AS B, categorie AS C WHERE A.idUser = B.id AND A.idCat = C.id AND A.id = ?");
  $req->execute(array($idAr));
  $res = $req->fetch();


  if (isset($_POST['save'])) {
     
     $name = $_POST['name'];
     $email = $_POST['email'];
     $comment = $_POST['comment'];
     $idArt = $_POST['id'];

     $req=$bd->prepare("INSERT INTO comment(nom,email,comment,idArticle) VALUES (?,?,?,?)");
     if ($req->execute(array($name,$email,$comment,$idArt))) {

         $idAr = $_GET['idPost'];

        header('location:blogDetails.php?idPost='.$idAr);
     }else header('location:blogDetail.php?sms=2');


  }
  
?>
   

<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" href="images/favicon.png">
      <title>ECO HTML</title>
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
               <h1>Détail Publication</h1>
               <ul>
                  <li><a href="index.php">Home</a></li>
                  <li><a href="blog.php"> Blogs </a></li>
                  <li><a href="#"><?php echo $res['titre'] ?></a></li>
               </ul>
            </div>
         </section>
         <!--Inner Header End--> 
         <!--Blog Start-->
         <section class="wf100 p80 blog">
            <div class="blog-details">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-9 col-md-8">
                        <!--Blog Single Content Start-->
                        <div class="blog-single-content">
                           <div class="blog-single-thumb"><img src="images/blog/<?php echo $res['img_one']; ?>" alt=""></div>
                           <h3><?php echo $res['titre']; ?></h3>
                           <ul class="post-meta">
                              <li><i class="fas fa-user-circle"></i> <?php echo $res['nom'] ?></li>
                              <li><i class="fas fa-calendar-alt"></i> <?php echo $res['datePub'] ?></li>
                              <li><i class="fas fa-comments"></i> 134 Comments</li>
                              <li class="tags"><i class="fas fa-tags"></i> <a href="#"><?php echo $res['libelle'] ?></a> </li>
                           </ul>
                           <p> <?php echo $res['detail'] ?></p>
                           
                           
                           <ul class="small-gallery">
                              <li> <img src="images/blog/<?php echo $res['img_one']; ?>" alt="" > </li>
                              <li> <img src="images/blog/<?php echo $res['img_two']; ?>" alt=""> </li>
                              <li> <img src="images/blog/<?php echo $res['img_tree']; ?>" alt=""> </li>
                           </ul>
                           <!--Post Tags Start-->
                           <hr>
                           <!--Author Box End--> 
                           <!--Author Comments Start-->
                           <div class="post-comments wf100">
                              <h4>Commentaire sur l'article</h4>
                              <ul class="comments">
                                 <?php 
                                       $reqCom=$bd->prepare("SELECT A.id as idCom, A.nom, A.email, A.datePub, A.comment FROM comment AS A, article AS B WHERE A.idArticle = B.id AND A.idArticle = ?");
                                         $reqCom->execute(array($idAr));
                                         
                                         while($resCom = $reqCom->fetch()){
                                    ?>
                                 <li class="comment">
                                    <div class="user-thumb"> <img src="images/auser.jpg" alt=""></div>
                                    <div class="comment-txt">
                                       <h6> <?php echo $resCom['nom']; ?></h6>
                                       <p> <?php echo $resCom['comment']; ?>. </p>
                                       <ul class="comment-time">
                                          <li>Publié le: <?php $date = date_create($resCom['datePub']); echo date_format($date, 'd-m-Y à H:m') ; ?></li>
                                       </ul>
                                    </div>
                                 </li>
                                    <?php } ?>
                                 <!--Comment End-->
                              </ul>
                           </div>
                           
                           <!--Related Posts End--> 
                           <!--Leave a Comment Start-->
                           <form action="" method="post" accept-charset="utf-8">
                          
                           <div class="wf100 comment-form">
                              <h4>Commenter l'article</h4>
                              <ul>
                                 
                                 <li class="w4">
                                    <input type="hidden" name="id" value="<?php echo $_GET['idPost']; ?>" class="form-control" placeholder="Nom Complet">
                                 </li>
                                 <li class="w4">
                                    <input type="text" name="name" class="form-control" placeholder="Nom Complet">
                                 </li>
                                 <li class="w4">
                                    <input type="text" name="email" class="form-control" placeholder="Adresse Mail">
                                 </li>
                                 <li class="full">
                                    <textarea name="comment" class="form-control" placeholder="Entrez votre commentaire"></textarea>
                                 </li>
                                 <li class="full">
                                    <button type="submit" name="save" class="post-btn">Envoyez votre commentaire</button>
                                 </li>
                              </ul>
                           </div>
                            </form>
                           <!--Leave a Comment End--> 
                        </div>
                        <!--Blog Single Content End--> 
                     </div>
                     <!--Sidebar Start-->
                     <div class="col-lg-3 col-md-4">
                        <div class="sidebar">
                           <!--Widget Start-->
                           <div class="side-widget">
                              <h5>Rechercher</h5>
                              <div class="side-search">
                                 <form action="blog.php" method="get">
                                    <input type="search" name="txt"  class="form-control" placeholder="Rechercher un article">
                                    <button type="submit" name="search"><i class="fas fa-search"></i></button>
                                 </form>
                              </div>
                           </div>
                           <!--Widget End--> 
                           <!--Widget Start-->
                           <div class="side-widget text-widget">
                              <h5>Bon à savoir</h5>
                              <p> Vous trouverez des articles qui parlent de nous, nous vous feront part
                              des nos nouvelles, nos produits, nos services offerts et plus encore.
                              Souscrivez à notre News pour ne rien rater lors des nouvelles publications </p>
                           </div>
                           <!--Widget End--> 
                           <!--Widget Start-->
                           <div class="side-widget">
                              <h5>Récement publiés</h5>
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
                           
                           <!--Widget End--> 
                           <!--Widget Start-->
                           <div class="side-widget">
                              <h5>Catégories</h5>
                              <div class="single-post-tags"> 
                                 <?php
                                    $req2=$bd->prepare('SELECT * FROM categorie');
                                   $req2->execute();
                                   while ($res2 = $req2->fetch()) { ?>
                                 <a href="#"><?php echo $res2['libelle'] ?></a> <?php } ?> </div>
                           </div>
                           <!--Widget End--> 
                           <!--Widget Start-->
                           <div class="side-widget">
                              <h5>Recent Work</h5>
                              <div id="side-slider" class="owl-carousel owl-theme">
                                 <!--Item Start-->
                                 <div class="item">
                                    <div class="pro-box">
                                       <img src="images/current-pro5.jpg" alt="">
                                       <h5>Forest &amp; Tree Planting</h5>
                                       <div class="pro-hover">
                                          <h6>Forest &amp; Tree Planting</h6>
                                          <p>We are working over 20 years on Waste Management &amp; Material Recycling Projects.</p>
                                          <a href="#">Read More</a> 
                                       </div>
                                    </div>
                                 </div>
                                 <!--Item End--> 
                                 <!--Item Start-->
                                 <?php
                                    $req1=$bd->prepare('SELECT * FROM projet ORDER BY datePub DESC LIMIT 0,3');
                                   $req1->execute();
                                   while ($res1 = $req1->fetch()) { ?>
                                 <div class="item">
                                    <div class="pro-box">
                                       <img src="images/<?php echo $res1['image'] ?>" alt="">
                                       <h5><?php echo $res1['titre'] ?></h5>
                                       <div class="pro-hover">
                                          <h6><?php echo $res1['titre'] ?></h6>
                                          <p><?php echo substr($res1['detail'], 0,200); ?></p>
                                          <a href="projetDetail.php?idP=<?php echo $res1['id']; ?>">En Savoir plus</a> 
                                       </div>
                                    </div>
                                 </div>
                              <?php } ?>
                                 <!--Item End--> 
                                 <!--Item Start-->
                                 <?php
                                    $req1=$bd->prepare('SELECT * FROM projet ORDER BY datePub DESC LIMIT 0,3');
                                   $req1->execute();
                                   while ($res1 = $req1->fetch()) { ?>
                                 <div class="item">
                                    <div class="pro-box">
                                       <img src="images/<?php echo $res1['image'] ?>" alt="">
                                       <h5><?php echo $res1['titre'] ?></h5>
                                       <div class="pro-hover">
                                          <h6><?php echo $res1['titre'] ?></h6>
                                          <p><?php echo substr($res1['detail'], 0,200); ?></p>
                                          <a href="projetDetail.php?idP=<?php echo $res1['id']; ?>">En Savoir plus</a> 
                                       </div>
                                    </div>
                                 </div>
                              <?php } ?>
                                 <!--Item End--> 
                              </div>
                           </div>
                           <!--Widget End--> 
                           
                        </div>
                     </div>
                     <!--Sidebar End--> 
                  </div>
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