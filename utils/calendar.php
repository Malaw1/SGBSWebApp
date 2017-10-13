<?php
require_once 'config.php';

if(isset($_POST['rv'])){
    $query = "INSERT INTO RV (dateRv, idDonneur) VALUES ('".$_POST['date']."', '1')";
    $resultat = $pdo->query($query);
}

if(isset($_POST['cancel'])){
    $query = "DELETE FROM rv where dateRv='".$_POST['del']."'";
    $resultat = $pdo->query($query);
}

echo "<div class='container-fluid'>
        <div class='col-md-3' border='1px solid black'>";
        
        $query = "select * from RV where idDonneur='1'";
        if($resultat = $pdo->query($query)){
            echo "<h2>Prochain RV</h2>";
            if ($line = $resultat->fetch(PDO::FETCH_OBJ)) {
                echo "<button class='btn btn-primary'>".$line->dateRv."</button> ";
                echo "<form method='POST'><br />
                <div class='form-group'>
                <input type='hidden'  value='".$line->dateRv."' name='del' />
                </div>
                <div class='form-group'>
                <input type='submit' class='btn btn-primary' value='Annuler' name='cancel' />
                </div>
            </form>";
            }
            else{
                echo "<h3>Vous n'avez pas de Rendez-vous</h3> <br />";
            }
        }                
        echo "<form method='POST'><br />
        <div class='form-group'>
            <input type='date' placeholder='aaaa/mm/jj' name='date' class='form-control' />
        </div>

        <div class='form-group'>
        <input type='submit' class='btn btn-primary' value='Prendre RV' name='rv' />
        </div>
    </form>";
    
echo "</div>";
echo "<div class='col-md-9'>";
echo "<h2>Historique des dons</h2>";
$query = "select * from don, serologie s where don.idDonneur = '12345' AND s.numDon=don.numDon";
if($resultat = $pdo->query($query)){
        echo "<table class='table'>";
        echo "<thead>";
        echo "<th>Date</th>";
        echo "<th>RPR</th>";
        echo "<th>Ag HBs</th>";
        echo "<th>HCV</th>";
        echo "<th>HIV</th>";
        echo "<th>Lieu</th>";
        echo "<th>Agent</th>";
        echo "</thead>";
      while ($line = $resultat->fetch(PDO::FETCH_OBJ)) {
        echo "<tr>";
        echo "<td>".$line->dateDon."</td>";
        echo "<td>".$line->rpr."</td>";
        echo "<td>".$line->aghbs."</td>";
        echo "<td>".$line->hcv."</td>";
        echo "<td>".$line->hiv."</td>";
        
        echo "</tr>";
      }
  
      echo "</table>";
}
echo "</div>";
?>