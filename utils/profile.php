<?php
if(isset($_POST['update'])){

    require_once 'config.php';

    $email = $_POST['email'];
    $adresse= $_POST['adresse'];
    $taille = $_POST['taille'];
    $poids = $_POST['poids'];
    $numTel = $_POST['numTel'];

    $req = "UPDATE `users` SET  `email` = '".$email."', `taille` = '".$taille."', `poids` = '".$poids."', `numTel` = '".$numtel."', `adresse` = '".$adresse."' WHERE `users`.`id` = ".$line->id." ";

    if($resultat = $pdo->query($req)){
        header('Location: welcome.php?profile=pro');
    }

    header('Location: welcome.php?profile=pro');    

}

?>
<div class="container">

<div class="col-md-4">

    <h2>Modification du profil </h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

        <div class="form-group">
            <label>Prenom:  </label>
            <input type="text" name="prenom"class="form-control" <?php echo "placeholder='".$line->prenom."'" ?> >

        </div>  

        <div class="form-group">
            <label>Nom:  </label>
            <input type="text" name="nom"class="form-control" <?php echo "placeholder='".$line->nom."'" ?> >

        </div> 

        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
            <label>Email:  </label>
            <input type="email" name="email" class="form-control" <?php echo "placeholder='".$line->email."'" ?> >

        </div>   

        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <label>Mot de passe: </label>
            <input type="password" name="password" class="form-control" placeholder="***********">

        </div>

        <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
            <label>Confirmer mot de passe:  </label>  
            <input type="password" name="confirm_password" class="form-control" placeholder="***************">


        </div>

        <div class="form-group">
            <label>Adresse:  </label>
            <input type="text" name="adresse"class="form-control" <?php echo "placeholder='".$line->adresse."'" ?> >

        </div>

        <div class="form-group">
            <label>Date de Naissance:  </label>
            <input type="date" name="prenom"class="form-control" <?php echo "placeholder='".$line->dateNaiss."'" ?> >

        </div>

        <div class="form-group">
            <label>Lieu de Naissance:  </label>
            <input type="text" name="lieuNaiss"class="form-control" <?php echo "placeholder='".$line->lieuNaiss."'" ?> >

        </div>

        <div class="form-group">
            <label>Sexe: </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label>H: </label> <input type="radio" name="genre" value="M" > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <label>F: </label> <input type="radio" name="genre"  value="F" >

        </div>

        <div class="form-group">
            <label>Taille:  </label>
            <input type="text" name="taille"class="form-control" <?php echo "placeholder='".$line->taille."'" ?> >

        </div>

        <div class="form-group">
            <label>Poids:  </label>
            <input type="text" name="poids" class="form-control" <?php echo "placeholder='".$line->poids."'" ?> >

        </div>

        <div class="form-group">
            <label>Telephone:  </label>
            <input type="text" name="numTel" class="form-control" <?php echo "placeholder='".$line->numTel."'" ?> >

        </div>

        <div class="form-group">

            <input type="submit" class="btn btn-primary" value="S'inscrire" name="update">

        </div>

    </form>

</div>


<div class="w3-third col-md-4">
    
    <div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-display-container">

          <div class="w3-display-bottomleft w3-container w3-text-black">
            <h2><?php echo $line->prenom." ". $line->nom; ?></h2>
          </div>
        </div>
        <div class="w3-container">
          <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i>Donneur <?php echo $line->groupe; ?></p>
          <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $line->adresse; ?></p>
          <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $line->email; ?></p>
          <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $line->numTel; ?></p>
          <hr>
        </div>
    </div>
</div>

    <div class="col-md-3">
    <div>
       <?php echo "<img class='img-rounded' src='../img/profile/".$line->profile."' width='100%' height='200' />" ;?>
    </div>
    <label>Changer le profil</label><input type="file">
</div>
<div>
</div>