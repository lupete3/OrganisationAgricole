<?php require_once ('admin/access/connex.php');

if (isset($_POST['save'])) {
     
     $name = $_POST['name'];
     $email = $_POST['email'];
     $tel = $_POST['tel'];

     $req=$bd->prepare("INSERT INTO subscribe(nom,email,contact) VALUES (?,?,?)");
     if ($req->execute(array($name,$email,$tel))) {

        header('location:index.php?sms=1');
     }else header('location:index.php?sms=2');


  }

  if (isset($_POST['save1'])) {

       $name = $_POST['name'];
       $email = $_POST['email'];

       $req=$bd->prepare("INSERT INTO subscribe(nom,email) VALUES (?,?)");
        if ($req->execute(array($name,$email))) {

           header('location:index.php?sms=1');
        }else header('location:index.php?sms=2');

  }

  ?>

<!doctype html>
<html lang="en">
   
<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" href="images/favicon.png">
      <title>JEF asb</title>
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
      <div class="wrapper home2">
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
         <!--Slider Start-->
         <section id="home-slider" class="owl-carousel owl-theme wf100">
            <div class="item">
               <div class="slider-caption h2slider">
                  <div class="container">
                     <br><br>
                     <h1 class="text-success">Faim Zéro</h1>
                     <br><br>
                  </div>
               </div>
               <img src="images/h2-slide1.jpg" alt=""> 
            </div>
            <div class="item">
               <div class="slider-caption h2slider">
                  <div class="container">
                     <br>                     
                     <h1>Egalité entre les sexes</h1>
                     <p></p>                     
                  </div>
               </div>
               <img src="images/h2-slide2.jpg" alt=""> 
            </div>
            <div class="item">
               <div class="slider-caption h2slider">
                  <div class="container">
                     <br><br>
                     <h1>Jeunes, Paix et Sécurité</h1>
                     <br>
                  </div>
               </div>
               <img src="images/h2-slide4.jpg" alt=""> 
            </div>
            <div class="item">
               <div class="slider-caption h2slider"> 
 
                  <div class="container">
                     
                     <h1>Lutte contre le chagement climatique</h1>
                  </div>
               </div>
               <img src="images/h2-slide3.jpg" alt=""> 
            </div>
         </section>
         <!--Slider End--> 
         <!--Service Area Start-->
         
         <!--Service Area End--> 
         <!--About Section Start-->
         <section class="home2-about wf100 p100 gallery">
            <div class="container">
               <?php 
                        $req=$bd->prepare('SELECT * FROM apropos');
                        $req->execute();
                        $res = $req->fetch();
                     ?>
               <div class="row">
                  <div class="col-md-5">
                     <div class="video-img">
                        <video src="video/Jeff.mp4" height="400"  autobuffer loop controls poster="images/h2-slide2.jpg" width="450"></video>
                     </div>
                  </div>
                  <div class="col-md-7">
                     
                     <div class="h2-about-txt">
                        <h3><?php echo $res['titre'] ?></h3>
                        <h2><?php echo $res['slogan'] ?></h2>
                        <p> <?php echo substr($res['detail'], 0,350).'...'; ?> </p>
                        <a class="aboutus" href="about.php">En savoir plus à propos de nous</a> 
                     </div>
                  </div>
               </div>
            </div>
         </section>

         <section class="promises wf100 p80">
            <div class="container">
               <div class="row">
                  <?php 
                        $req1=$bd->prepare('SELECT * FROM vision');
                        $req1->execute();
                        $res1 = $req1->fetch();
                     ?>
                  <div class="col-md-7">
                     <div class="pro-title">
                        <h2><?php echo $res1['titre']; ?></h2>
                        <h3><?php echo $res1['detail']; ?>
                        </h3>
                     </div>
                     <ul class="counter">
                         <?php 
                           $req2=$bd->prepare('SELECT * FROM compteur_succes');
                           $req2->execute();
                           $res2 = $req2->fetch();
                        ?>
                        <li>
                           <p class="counter-count"><?php echo $res2['nbVille'] ?></p>
                           <p class="ctxt"><?php echo $res2['ville'] ?></p>
                        </li>
                        <li>
                           <p class="counter-count"><?php echo $res2['nbProjet'] ?></p>
                           <p class="ctxt"><?php echo $res2['projet'] ?></p>
                        </li>
                        <li>
                           <p class="counter-count"><?php echo $res2['nbPopulation'] ?></p>
                           <p class="ctxt"><?php echo $res2['population'] ?></p>
                        </li>
                     </ul>
                  </div>
                  <div class="col-md-5">
                     <form action="" method="post" accept-charset="utf-8">
                     <div class="volunteer-form">
                        <div class="section-title">
                           <strong>Ne ratez rien</strong>
                           <h2>Abonnez-vous</h2>
                        </div>
                        <ul>
                           <li>
                              <input type="text" name="name" class="form-control" placeholder="Votre nom" aria-label="Votre nom">
                           </li>
                           <li>
                              <input type="text" name="email" class="form-control" placeholder="Adresse mail" aria-label="Adresse mail">
                           </li>
                           <li>
                              <input type="text" name="tel" class="form-control" placeholder="Votre contact" aria-label="Contact">
                           </li>
                           <?php 
                              if (isset($_GET['sms']) AND $_GET['sms'] == 1) { ?>
                                <div class="alert alert-success alert-dismissible" id="msg" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h6>Vous Recevez toutes nos publications</h6>
                                      </div>
                              <?php }else if (isset($_GET['sms']) AND $_GET['sms'] == 2){ ?>
                                <div class="alert alert-danger alert-dismissible" id="msg" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h6>Une erreur s'est produite</h6>
                                      </div>
                              <?php } ?>
                           <li>
                              <input type="submit" name="save" class="fsubmit" value="S'abonner">
                           </li>
                        </ul>
                     </div>
                     </form>

                  </div>
               </div>
            </div>
         </section>
         <!--About Section End--> 
         
        
         <!--News & Articles Start-->
         <section class="h2-news wf100 p80">
            <div class="container" >
               <div class="row">
                  <div class="col-md-6">
                     <div class="section-title-2">
                        <h5>Découvrez aussi</h5>
                        <h2>Nos Publications et News</h2>
                     </div>
                  </div>
                  <div class="col-md-6"> <a href="blog.php" class="view-more">Voir autres publications</a> </div>
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <?php 
                        $req=$bd->prepare('SELECT A.id as idArt, A.titre, A.detail, A.datePub, A.img_one, B.nom, C.libelle FROM article AS A, users AS B, categorie AS C WHERE A.idUser = B.id AND A.idCat = C.id ORDER BY datePub DESC LIMIT 0,1');
                       $req->execute();

                        
                       $res = $req->fetch();  ?>
                     <div class="blog-post-large">
                        <div class="post-thumb"> <a href="blogDetails.php?idPost=<?php echo $res['idArt'];?>"><i class="fas fa-link"></i></a> <img src="images/blog/<?php echo $res['img_one'] ?>" alt="" style="height: 470px;"></div>
                        <div class="post-txt">
                           <ul class="post-meta">
                              <li><i class="fas fa-calendar-alt"></i> <?php echo $res['datePub']; ?></li>
                              <li><i class="fas fa-comments"></i> 200 Comments</li>
                           </ul>
                           <h5><a href="blogDetails.php?idPost=<?php echo $res['idArt'];?>"><?php echo $res['titre']; ?></a></h5>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <!--Blog Small Post Start-->
                     <?php 
                        $req=$bd->prepare('SELECT A.id as idArt, A.titre, A.detail, A.datePub, A.img_one, B.nom, C.libelle FROM article AS A, users AS B, categorie AS C WHERE A.idUser = B.id AND A.idCat = C.id ORDER BY datePub DESC LIMIT 0,2');
                       $req->execute();

                        
                       while($res = $req->fetch()){  ?>
                     <div class="blog-small-post">
                        <div class="post-thumb"> <a href="blogDetails.php?idPost=<?php echo $res['idArt'];?>"><i class="fas fa-link"></i></a> <img src="images/blog/<?php echo $res['img_one'] ?>" alt=""> </div>
                        <div class="post-txt">
                           <span class="pdate"> <i class="fas fa-calendar-alt"></i> <?php echo $res['datePub']; ?></span>
                           <h5><a href="blogDetails.php?idPost=<?php echo $res['idArt'];?>"><?php echo $res['titre']; ?> </a></h5>
                           <p><?php echo substr($res['detail'], 0,100).' '; ?></p>
                           <a href="blogDetails.php?idPost=<?php echo $res['idArt'];?>" class="rm">En Savoir plus</a> 
                        </div>
                     </div>
                     <?php } ?>
                     <!--Blog Small Post End--> 
                     <!--Blog Small Post Start-->
                     
                     <!--Blog Small Post End--> 
                  </div>
               </div>
            </div>
         </section>
         <!--News & Articles End--> 

         <!--Why Ecova + Facts Start-->
         <!--<section class="why-ecova wf100">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <h1> Pourquoi BAIC !</h1>
                     <p>Rendre disponible les produits bio et frais à toute la communauté locale, nationale et internationale (Ex : fruits, légumes, viande, riz, farine, …) 
                     </p>
                     <a href="#" class="cus">Signup to Join us</a> 
                  </div>
               </div>
            </div>
         </section> -->
         <!--Why Ecova + Facts End--> 
         <!--Online Products Start-->
         <section class="online-shop wf100 p80" style="margin-top: -50px; margin-bottom: -30px;">
            <div class="">
               <div class="row">
                  <div class="col-md-12">
                     <div class="section-title-2 text-center">
                        <h5>Découvrez</h5>
                        <h2>Nos partenaires</h2>
                     </div>
                  </div>
                  <div class="partner-logos wf100">
                     <div class="container">
                        <div id="partner-logos" class="owl-carousel owl-theme">
                           <?php
                        $req=$bd->prepare('SELECT * FROM partenaire');
                        $req->execute();
                        while($res = $req->fetch()){ ?>

                     <div class="item"><img src="images/sponsors/<?php echo $res['image'] ?>" alt=""></div>
                     <?php } ?>
                        </div>
                     </div>
                  </div>
               </div>
               
            </div>
         </section>
         
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