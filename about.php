<?php require_once ('admin/access/connex.php'); 

   $req=$bd->prepare('SELECT * FROM apropos');
   $req->execute();
   $res = $req->fetch();

?>

<!doctype html>
<html lang="en">

   
<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" href="images/favicon.png">
      <title>A propos de Premidis</title>
      <!-- CSS FILES START -->
      <link href="css/custom.css" rel="stylesheet">
      <link href="css/color.css" rel="stylesheet">
      <link href="css/responsive.css" rel="stylesheet">
      <link href="css/owl.carousel.min.css" rel="stylesheet">
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/prettyPhoto.css" rel="stylesheet">
      <link href="css/all.min.css" rel="stylesheet">
      <link href="css/slick.css" rel="stylesheet">
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
         <section class="wf100 p100 inner-header" style="height: 200px;">
            <div class="container" style="margin-top: -50px;">
               <h1>A propos de nous</h1>
               <ul>
                  <li><a href="index.html">Accueil</a></li>
                  <li><a href="#">A propos</a></li>
               </ul>
            </div>
         </section>
         <!--Inner Header End--> 
         <!--About Start-->
         <section class="wf100 about">
            <!--About Txt Video Start-->
            <div class="about-video-section wf100">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-6">
                        <div class="about-text">
                           <h5>Qui sommes-nous ?</h5>
                           <h2><?php echo $res['titre']; ?></h2>
                           <p><strong><?php echo $res['slogan']; ?>.  </strong></p>
                           <p><?php echo $res['detail']; ?></a> 
                              <a href="">Nous contacter</a> 
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="about-video-img"> <a href="#"><i class="fas fa-play"></i></a> <img src="images/<?php echo $res['image']; ?>" alt=""> </div>
                     </div>
                  </div>
               </div>
            </div>
            <!--About Txt Video End--> 
            <!--Our Success Story Start-->
            <section class="wf100 team" style="margin-top: -50px;">
            <div class="team-grid team-small-grid p80">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <h1>Notre Equipe</h1>
                     </div>
                     <!--Team Box Start-->
                     <?php $req=$bd->prepare('SELECT * FROM equipe');
                        $req->execute();
                        while($res = $req->fetch()){ ?>
                     <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="team-box">
                           <img src="images/<?php echo $res['image'] ?>" alt="">
                           <div class="team-info">
                              <h5><?php echo $res['nom'] ?></h5>
                              <p><?php echo $res['fonction'] ?></p>
                              <ul>
                                 <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                 <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                 <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  <?php } ?>
                     <!--Team Box Start--> 
                  </div>
               </div>
            </div>
         </section>
            <!--Our Success Story End--> 
            <!--Why you Need to Choose Ecova Start-->
            <div class="choose-ecova wf100 p80" style="margin-top: -50px; padding-bottom: -60px;">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="section-title-2">
                           <h5>Baic</h5>
                           <h2>Notre Engagement</h2>
                        </div>
                        <div class="row">
                            <?php
                              $i = 01; 
                              $req=$bd->prepare('SELECT * FROM engagement');
                              $req->execute();
                              while($res = $req->fetch()){ ?>
                           <div class="col-4">
                              <div class="eco-box">
                                 <span class="econ-icon"><i class="far fa-handshake"></i></span>
                                 <h5> <?php echo (($i < 10)?'0'.$i : $i) ?> </h5>
                                 <p> <?php echo $res['detail'] ?> </p>
                              </div>
                           </div>
                           <?php $i++; } ?>
                           
                        </div>
                     </div>
                     
                  </div>
               </div>
            </div>
            <!--Why you Need to Choose Ecova End--> 
            <!--Testimonials Start-->
            <section class="testimonials-section bg-white wf100 p80">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="section-title-2 text-center">
                           <h5>Découvrez</h5>
                           <h2>Ce que nos partenaires disent</h2>
                        </div>
                        <div id="testimonials" class="owl-carousel owl-theme">
                           <!--testimonials box start-->
                           <?php
                              $req=$bd->prepare('SELECT * FROM temoignage');
                              $req->execute();
                              while($res = $req->fetch()){ ?>
                           <div class="item">
                              <p><?php echo $res['detail'] ?> </p>
                              <div class="tuser"> <img src="images/<?php echo $res['avatar'] ?> " alt=""> <strong><?php echo $res['nom'] ?> </strong> <?php echo $res['fonction'] ?>  </div>
                           </div>
                        <?php } ?>
                           <!--testimonials box End--> 
                           
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!--Testimonials End--> 
            <!--Partner Logos Section Start-->
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
            <!--Partner Logos Section End--> 
         </section>
         <!--About End--> 
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
      <script src="js/slick.min.js"></script> 
      <script src="js/custom.js"></script>
   </body>

</html>