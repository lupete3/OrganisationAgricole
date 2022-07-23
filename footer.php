<?php require_once ('admin/access/connex.php');   ?>
<footer class="footer-style-2">
            <div class="footer-top wf100">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-3 col-sm-6">
                        <!--Footer Widget Start-->
                        <div class="footer-widget about-ecova">
                           <div class="f2logo"> <img src="images/f2logo.png" alt="" style="height: 120px; width:260px; margin-top: -16px; margin-bottom: -10px;"> </div>
                           <?php 

                                 $req=$bd->prepare('SELECT * FROM vision ');
                                 $req->execute();
                                 $res = $req->fetch();
                           ?>
                           <span class="text-danger"><p ><?php echo substr($res['detail'], 0,500); ?></p></span>
                           <a href="about.php" class="more">En savoir plus sur Premidis</a> 
                        </div>
                        <!--Footer Widget End--> 
                     </div>
                     <div class="col-lg-3 col-sm-6">
                        <!--Footer Widget Start-->
                        <div class="footer-widget">
                           <h5>Récents Projects</h5>
                           <ul class="quick-links">
                              <?php 
                               
                                 $req=$bd->prepare('SELECT * FROM projet ORDER BY datePub DESC ');
                                 $req->execute();
                                 while ($res = $req->fetch()) {   ?>

                                 <li><a href="projetDetail.php?idP=<?php echo $res['id'] ?>"><?php echo $res['titre'] ?></a></li>
                              <?php } ?>
                              
                           </ul>
                        </div>
                        <!--Footer Widget End--> 
                     </div>
                     <div class="col-lg-3 col-sm-6">
                        <!--Footer Widget Start-->
                        <div class="footer-widget">
                           <h5>Mots clés</h5>
                           <ul class="ftags">
                              <?php 
                               require_once ('admin/access/connex.php');  
                                 $req=$bd->prepare('SELECT * FROM categorie ');
                                 $req->execute();
                                 while ($res = $req->fetch()) {   ?>

                                 <li><a href="blog.php"><?php echo $res['libelle'] ?></a></li>
                              <?php } ?>
                              
                           </ul>
                        </div>
                        <!--Footer Widget End--> 
                     </div>
                     <div class="col-lg-3 col-sm-6">
                        <!--Footer Widget Start-->
                        <div class="footer-widget">
                           <h5>Dernières Publications</h5>
                           <ul class="lastest-products">
                               <?php 
                                    $req=$bd->prepare('SELECT A.id as idArt, A.titre, A.detail, A.datePub, A.img_one, B.nom, C.libelle FROM article AS A, users AS B, categorie AS C WHERE A.idUser = B.id AND A.idCat = C.id ORDER BY datePub DESC LIMIT 0,3');
                                   $req->execute();

                                    
                                   while($res = $req->fetch()){  ?>
                              <li> <img src="images/blog/<?php echo $res['img_one'] ?>" alt="" height="60" width="80"> <strong><a href="#"><?php echo $res['titre']; ?> ...</a></strong> <span class="pdate"><i>Publié:</i> <?php echo $res['datePub'] ?></span> </li>
                              <?php } ?>
                           </ul>
                        </div>
                        <!--Footer Widget End--> 
                     </div>
                  </div>
               </div>
            </div>
            <div class="footer-newsletter wf100">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-8">
                        <form action="index.php" method="post" accept-charset="utf-8">
                        <div class="newsletter">
                           <strong>Recevez nos nouvelles</strong>
                           <ul>
                              <li>
                                 <input class="input-group-sm"  name="name" type="text" placeholder="Votre Nom">
                              </li>
                              <li>
                                 <input  type="text" name="email" placeholder="Votre Adresse Email">
                              </li>
                              <li>
                                 <input  type="submit" name="save1" value="S'abonner">
                              </li>
                           </ul>
                        </div>
                         </form>
                     </div>
                     <div class="col-lg-4">
                        <div class="footer-social"> <strong>Nous joindre</strong> <a href="https://m.facebook.com/JEF-asbl-112084287917518/"><i class="fab fa-facebook-f"></i></a> <a href="#"><i class="fab fa-twitter"></i></a> <a href="#"><i class="fab fa-linkedin-in"></i></a> <a href="#"><i class="fab fa-instagram"></i></a> <a href="#"><i class="fab fa-youtube"></i></a> </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="footer-copyr wf100">
               <div class="container">
                  <div class="row">
                     <div class="col-md-8 col-sm-8">
                        <p><a target="_blank" href="https://www.templateshub.net"><?php echo date('Y')  ?> JEF ASBL © Tout droit réservé</a></p>
                     </div>
                  </div>
               </div>
            </div>
         </footer>