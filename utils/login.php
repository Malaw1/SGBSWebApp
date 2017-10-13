

    <?php

    // Include config file

    require_once 'config.php';

     

    // Define variables and initialize with empty values

    $email = $password = "";

    $email_err = $password_err = "";

     

    // Processing form data when form is submitted

    if($_SERVER["REQUEST_METHOD"] == "POST"){

     

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

                                header("location: welcome.php");

                            } else{

                                // Display an error message if password is not valid

                                $password_err = 'Le mot de passe n est pas valide.';

                            }

                        }

                    } else{

                        // Display an error message if username doesn't exist

                        $email_err = 'Aucun compte n est associe a cet email.';

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

    ?>

     

    <!DOCTYPE html>

    <html lang="en">

    <head>

        <meta charset="UTF-8">

        <title>Login</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

        <style type="text/css">

            body{ font: 14px sans-serif; }

            .wrapper{ width: 350px; padding: 20px; }

        </style>

    </head>

    <body>

        <div class="wrapper">

            <h2>Login</h2>

            <p>Please fill in your credentials to login.</p>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">

                    <label>Email:<sup>*</sup></label>

                    <input type="email" name="email"class="form-control" value="<?php echo $email; ?>">

                    <span class="help-block"><?php echo $email_err; ?></span>

                </div>    

                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">

                    <label>Password:<sup>*</sup></label>

                    <input type="password" name="password" class="form-control">

                    <span class="help-block"><?php echo $password_err; ?></span>

                </div>

                <div class="form-group">

                    <input type="submit" class="btn btn-primary" value="Submit">

                </div>

                <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>

            </form>

        </div>

    </body>

    </html>

