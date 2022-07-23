<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Premidis</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!--        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">-->


        <!--For Plugins external css-->
        <link rel="stylesheet" href="assets/css/plugins.css" />
        <link rel="stylesheet" href="assets/css/roboto-webfont.css" />

        <!--Theme custom css -->
        <link rel="stylesheet" href="assets/css/style.css">

        <!--Theme Responsive css-->
        <link rel="stylesheet" href="assets/css/responsive.css" />

        <script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		<div class='preloader'><div class='loaded'>&nbsp;</div></div>
        <!-- Sections -->
        

        

        <!--Home page style-->
        

        <section style="margin-top: 100px;">
            <div class="container">
                
                <div class="row">
                     <div class="" id="connexion" tabindex="-1" role="dialog" aria-labelledby="Modregister" aria-hidden="false">
                        <div class="modal-dialog">
                             <div class="modal-content panel-primary">
                                <div class="modal-header">
                                    <button type="button" class="close btn " data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="AddSectionLabel">Connexion</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="access/connect_users.php" method="POST" class="was-validated">
                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <label for="inputEmail">Login</label>
                                              <input type="text" name="login" id="inputEmail" class="form-control" placeholder="Login" required="required" autofocus="autofocus">
                                              
                                            </div>
                                        </div>
                                          <div class="form-group">
                                            <div class="form-label-group">
                                                <label for="inputPassword">Password</label>
                                              <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
                                              
                                            </div>
                                          </div>          
                                          <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block" name="log_in"><i class="fa fa-lock"></i> Connnexion </button><br>
                                         
                                          </div> 
          
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="assets/js/vendor/bootstrap.min.js"></script>

        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/modernizr.js"></script>
        <script src="assets/js/main.js"></script>
    </body>

	
</html>
