<!doctype html>
<html lang="en">
   
<?php require_once ('admin/access/connex.php'); 

   $req=$bd->prepare('SELECT * FROM contact_company');
   $req->execute();
   $res = $req->fetch();

   if (isset($_POST['send'])) {
      $nom = $_POST['nom'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $objet = $_POST['objet'];
      $message = $_POST['message'];
      $statut = 'nouveau';

       $req=$bd->prepare('INSERT INTO email_box (nom,email,contact,objet,comment,statut) VALUES (?,?,?,?,?,?) ');
       if ($req->execute(array($nom,$email,$phone,$objet,$message,$statut))) {
          header('location:contacts.php?sms=2');
       }else header('location:contacts.php');



   }

?> 

<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" href="images/favicon.png">
      <title>Notre Adresse</title>
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
         <section class="wf100 p100 inner-header" style="height: 150px;">
            <div class="container" style="margin-top: -50px;">
               <h1>Nous contacter</h1>
               <ul>
                  <li><a href="index.php">Accueil</a></li>
                  <li><a href="contacts.php"> Contact </a></li>
                  <li><a href="#"> Info Contact</a></li>
               </ul>
            </div>
         </section>
         <!--Inner Header End--> 
         <!--Contact Start-->
         <section class="contact-page wf100 p80">
            <div class="container">
               <div class="row">
                  <div class="col-md-6">
                     <?php 
                   if (isset($_GET['sms']) AND $_GET['sms'] == 2){ ?>
                    <div class="alert alert-success alert-dismissible" id="msg" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h6>Merci de nous avoir contacté</h6>
                          </div>
                  <?php } ?>
                     <form action="" method="post" accept-charset="utf-8">
                                             
                     <div class="contact-form">
                        <h3>N'hésitez pas à nous contacter</h3>
                        <ul class="cform">
                           <li class="half pr-15">
                              <input type="text" name="nom" class="form-control" placeholder="Nom complet">
                           </li>
                           <li class="half pl-15">
                              <input type="text" name="email" class="form-control" placeholder="Email">
                           </li>
                           <li class="half pr-15">
                              <input type="text" name="phone" class="form-control" placeholder="Téléphone">
                           </li>
                           <li class="half pl-15">
                              <input type="text" name="objet" class="form-control" placeholder="Objet">
                           </li>
                           <li class="full">
                              <textarea name="message" class="textarea-control" placeholder="Message"></textarea>
                           </li>
                           <li class="full">
                              <input type="submit" name="send" value="Envoyer" class="fsubmit">
                           </li>
                        </ul>
                     </div>
                  </form>
                  </div>
                  <div class="col-md-6">
                     <div class="google-map">
                        
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3234.848801314784!2d27.373226281855093!3d-11.651672334101361!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19723b38ba3d4f05%3A0x87a5d751f48aab7a!2sPremidis!5e1!3m2!1sfr!2scd!4v1644060642682!5m2!1sfr!2scd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                     </div>
                  </div>
               </div>
            </div>
            <div class="container contact-info">
               <div class="row">
                  <div class="col-md-12">
                     <h3>Notre Adresse</h3>
                  </div>
                  <!--Contact Info Start-->
                  <div class="col-md-4">
                     <div class="c-info">
                        <h6>Addresse</h6>
                        <p> <?php echo $res['adresse'] ?> </p>
                     </div>
                  </div>
                  <!--Contact Info End--> 
                  <!--Contact Info Start-->
                  <div class="col-md-4">
                     <div class="c-info">
                        <h6>Contact</h6>
                        <p><strong>Phone: </strong> <?php echo $res['phone'] ?></p>
                     </div>
                  </div>
                  <!--Contact Info End--> 
                  <!--Contact Info Start-->
                  <div class="col-md-4">
                     <div class="c-info">
                        <h6>Pour plus d'informations</h6>
                        <p><strong>Email:</strong> <?php echo $res['email'] ?></p>
                     </div>
                  </div>
                  <!--Contact Info End--> 
               </div>
            </div>
         </section>
         <!--Contact End--> 
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