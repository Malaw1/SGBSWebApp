<?php

    // Include config file

    require_once 'utils/config.php';

     

    // Define variables and initialize with empty values

    $email = $password = $confirm_password = "";

    $email_err = $password_err = $confirm_password_err = "";

    $emailLog = $passwordLog = "";
    
    $emailLog_err = $passwordLog_err = "";
    

    if(isset($_POST['login'])){

                // Check if username is empty
        
                if(empty(trim($_POST["email"]))){
        
                    $email_err = 'Entrer votre mail svp.';
        
                } else{
        
                    $email = trim($_POST["email"]);
        
                }
        
                
        
                // Check if password is empty
        
                if(empty(trim($_POST['password']))){
        
                    $password_err = 'Veuillez entrer votre mot de passe svp.';
        
                } else{
        
                    $password = trim($_POST['password']);
        
                }
        
                
        
                // Validate credentials
        
                if(empty($email_err) && empty($password_err)){
        
                    // Prepare a select statement
        
                    $sql = "SELECT email, password FROM users WHERE email = :email";
        
                    
        
                    if($stmt = $pdo->prepare($sql)){
        
                        // Bind variables to the prepared statement as parameters
        
                        $stmt->bindParam(':email', $param_email, PDO::PARAM_STR);
        
                        
        
                        // Set parameters
        
                        $param_email = trim($_POST["email"]);
        
                        
        
                        // Attempt to execute the prepared statement
        
                        if($stmt->execute()){
        
                            // Check if username exists, if yes then verify password
        
                            if($stmt->rowCount() == 1){
        
                                if($row = $stmt->fetch()){
        
                                    $hashed_password = $row['password'];
        
                                    if(password_verify($password, $hashed_password)){
        
                                        /* Password is correct, so start a new session and
        
                                        save the username to the session */
        
                                        session_start();
        
                                        $_SESSION['email'] = $email;      
        
                                        header("location: utils/welcome.php?email=".password_hash($_SESSION['email'], PASSWORD_DEFAULT));
        
                                    } else{
        
                                        // Display an error message if password is not valid
        
                                        $passwordLog_err = 'Le mot de passe n est pas valide.';
        
                                    }
        
                                }
        
                            } else{
        
                                // Display an error message if username doesn't exist
        
                                $emailLog_err = 'Aucun compte n est associe a cet email.';
        
                            }
        
                        } else{
        
                            echo "Oops! Something went wrong. Please try again later.";
        
                        }
        
                    }
        
                    
        
                    // Close statement
        
                    unset($stmt);
        
                }
        
                
        
                // Close connection
        
                unset($pdo);
        
            }

    // Processing form data when form is submitted

    if(isset($_POST["signup"])){

     

        // Validate username

        if(empty(trim($_POST["email"]))){

            $email_err = "Entrer une adresse email svp.";

        } else{

            // Prepare a select statement

            $sql = "SELECT id FROM users WHERE email = :email";

            

            if($stmt = $pdo->prepare($sql)){

                // Bind variables to the prepared statement as parameters

                $stmt->bindParam(':email', $param_email, PDO::PARAM_STR);

                

                // Set parameters

                $param_email = trim($_POST["email"]);

                

                // Attempt to execute the prepared statement

                if($stmt->execute()){

                    if($stmt->rowCount() == 1){

                        $email_err = "Adresse email existant.";

                    } else{

                        $email = trim($_POST["email"]);

                    }

                } else{

                    echo "Oops! Something went wrong. Please try again later.";

                }

            }

             

            // Close statement

            unset($stmt);

        }

        

        // Validate password

        if(empty(trim($_POST['password']))){

            $password_err = "Please enter a password.";     

        } elseif(strlen(trim($_POST['password'])) < 6){

            $password_err = "Password must have atleast 6 characters.";

        } else{

            $password = trim($_POST['password']);

        }

        

        // Validate confirm password

        if(empty(trim($_POST["confirm_password"]))){

            $confirm_password_err = 'Confirmer le mot de passe svp.';     

        } else{

            $confirm_password = trim($_POST['confirm_password']);

            if($password != $confirm_password){

                $confirm_password_err = 'Les mots de passes ne sont pas identiques.';

            }

        }

        if(empty(trim($_POST['prenom']))){

            $password_err = "Entrer votre prenom svp.";     

        } else{

            $prenom = trim($_POST['prenom']);

        }

        if(empty(trim($_POST['nom']))){

            $password_err = "Entrer votre nom svp.";     

        } else{

            $nom = trim($_POST['nom']);

        }
        

        // Check input errors before inserting in database

        if(empty($email_err) && empty($password_err) && empty($confirm_password_err) ){

            

            // Prepare an insert statement

            $sql = "INSERT INTO users (prenom, nom, email, password) VALUES (:prenom, :nom, :email, :password)";

             

            if($stmt = $pdo->prepare($sql)){

                // Bind variables to the prepared statement as parameters
                $stmt->bindParam(':prenom', $param_prenom, PDO::PARAM_STR);

                $stmt->bindParam(':nom', $param_nom, PDO::PARAM_STR);

                $stmt->bindParam(':email', $param_email, PDO::PARAM_STR);

                $stmt->bindParam(':password', $param_password, PDO::PARAM_STR);

                

                // Set parameters
                $param_prenom = $prenom;

                $param_nom = $nom;

                $param_email = $email;

                $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

                

                // Attempt to execute the prepared statement

                if($stmt->execute()){

                    // Redirect to login page

                    header("location: index.php#first");

                } else{

                    echo "Something went wrong. Please try again later.";

                }

            }

             

            // Close statement

            unset($stmt);

        }

        

        // Close connection

        unset($pdo);

    }

?>

   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">

    <title>Don de sang - Acceuil</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="styles/showhide.css" rel="stylesheet">
    <link href="styles/cover.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="jquery/showhide.js"></script>
    <style type="text/css">
    /*

* Based on Cover by https://twitter.com/mdo"  @mdo
* added cover image and background color to match (green)
*
* Globals

*/

/* Links */
a,
a:focus,
a:hover {
  color: #fff;
}

/* Custom default button */
.btn-default,
.btn-default:hover,
.btn-default:focus {
  color: #333;
  text-shadow: none; /* Prevent inheritence from `body` */
  background-color: #fff;
  border: 1px solid #fff;
}


/*
 * Base structure
 */

html,
body {
/*css for full size background image*/
  background: url("img/blood2.jpg") no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  
  height: 100%;
  background-color: #060;
  color: #fff;
  text-align: center;
  text-shadow: 0 1px 3px rgba(0,0,0,.5);
 
}

/* Extra markup and styles for table-esque vertical and horizontal centering */
.site-wrapper {
  display: table;
  width: 100%;
  height: 100%; /* For at least Firefox */
  min-height: 100%;
  -webkit-box-shadow: inset 0 0 100px rgba(0,0,0,.5);
          box-shadow: inset 0 0 100px rgba(0,0,0,.5);
}
.site-wrapper-inner {
  display: table-cell;
  vertical-align: top;
}
.cover-container {
  margin-right: auto;
  margin-left: auto;
}

/* Padding for spacing */
.inner {
  padding: 30px;
}


/*
 * Header
 */
.masthead-brand {
  margin-top: 10px;
  margin-bottom: 10px;
}

.masthead-nav > li {
  display: inline-block;
}
.masthead-nav > li + li {
  margin-left: 20px;
}
.masthead-nav > li > a {
  padding-right: 0;
  padding-left: 0;
  font-size: 16px;
  font-weight: bold;
  color: #fff; /* IE8 proofing */
  color: rgba(255,255,255,.95);
  border-bottom: 2px solid transparent;
}
.masthead-nav > li > a:hover,
.masthead-nav > li > a:focus {
  background-color: transparent;
  border-bottom-color: #a9a9a9;
  border-bottom-color: rgba(255,255,255,.25);
}
.masthead-nav > .active > a,
.masthead-nav > .active > a:hover,
.masthead-nav > .active > a:focus {
  color: #fff;
  border-bottom-color: #fff;
}

@media (min-width: 768px) {
  .masthead-brand {
    float: left;
  }
  .masthead-nav {
    float: right;
  }
}


/*
 * Cover
 */

.cover {
  padding: 0 20px;
}
.cover .btn-lg {
  padding: 10px 20px;
  font-weight: bold;
}


/*
 * Footer
 */

.mastfoot {
  color: #999; /* IE8 proofing */
  color: rgba(255,255,255,.5);
}


/*
 * Affix and center
 */

@media (min-width: 768px) {
  /* Pull out the header and footer */
  .masthead {
    position: fixed;
    top: 0;
  }
  .mastfoot {
    position: fixed;
    bottom: 0;
  }
  /* Start the vertical centering */
  .site-wrapper-inner {
    vertical-align: middle;
  }
  /* Handle the widths */
  .masthead,
  .mastfoot,
  .cover-container {
    width: 100%; /* Must be percentage or pixels for horizontal alignment */
  }
}

@media (min-width: 992px) {
  .masthead,
  .mastfoot,
  .cover-container {
    width: 700px;
  }
}

    </style>
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        window.alert = function(){};
        var defaultCSS = document.getElementById('bootstrap-css');
        function changeCSS(css){
            if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />'); 
            else $('head > link').filter(':first').replaceWith(defaultCSS); 
        }
        $( document ).ready(function() {
          var iframe_height = parseInt($('html').height()); 
          window.parent.postMessage( iframe_height, 'https://bootsnipp.com');
        });
    </script>
</head>
<body>



          
	<div class="site-wrapper">
        <div class="site-wrapper-inner">
            <div class="cover-container">
            <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">BANQUE DE SANG DE HRT</h3>
              <nav>
                <ul class="nav masthead-nav">
                  <li class="active"><a href="#">Termes</a></li>
                  <li><a href="#">Confidentialites</a></li>
                  <li><a href="#">Contact</a></li>
                </ul>
              </nav>
            </div>
          </div>
            <!--<h1>SYSTEME DE GESTION DES DONNEURS DE LA BANQUE DE SANG DE L'HOPITAL REGIONALE AHMAD SAKHIR NDIEGUENE DE THIES</h1>-->
            <div id="second">

            <h2>Inscription </h2>

            <p>Remplir cette formulaire svp.</p>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                <div class="form-group">

                    <input type="text" name="prenom"class="form-control" placeholder="Prenom*">

                </div>  

                <div class="form-group">

                    <input type="text" name="nom"class="form-control" placeholder="Nom*">

                </div> 

                <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">

                    <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" placeholder="Email*">

                    <span class="help-block"><?php echo $email_err; ?></span>

                </div>   

                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">

                    <input type="password" name="password" class="form-control" value="<?php echo $password; ?>" placeholder="Mot de passe**">

                    <span class="help-block"><?php echo $password_err; ?></span>

                </div>

                <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">

                    <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>" placeholder="Confirmer mot de passe*">

                    <span class="help-block"><?php echo $confirm_password_err; ?></span>

                </div>

                <div class="form-group">

                    <input type="submit" class="btn btn-primary" value="S'inscrire" name="signup">

                </div>
                <p id="two">Deja inscrit? <a class="signin" href="#" id="signin">Se connecter</a></p>

            </form>

        </div>

        <div id="first">
        <h2>Connexion</h2>

            <p>Entrer vos identifiants svp..!</p>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">

                    <input type="email" name="email"class="form-control" value="<?php echo $email;?>" placeholder="Email*">

                    <span class="help-block"><?php echo $email_err; ?></span>

                </div>    

                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">

                    <input type="password" name="password" class="form-control" placeholder="Mot de passe*">

                    <span class="help-block"><?php echo $password_err; ?></span>

                </div>

                <div class="form-group">

                    <input type="submit" class="btn btn-primary" value="Se connecter" name="login">

                </div>

                <p id="two">Pas encore inscrit? <a class="signup" href="#" id="signup">S'inscrire ici!</a></p>
                                
            </form>

        </div> 
            </div>
        </div>
    </div>
	<script type="text/javascript">
	
    </script>
    <div class="mastfoot">
            <div class="inner">
              <p>Plateforme des donneurs Realised by <a href="http://linkedin.com"><strong><em>Djibril NDIAYE</em></strong></a>.</p>
            </div>
          </div>
</body>
</html>
