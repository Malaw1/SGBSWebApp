<?php 
    $query1 = "select * from notifications where idDonneur='12345'";
    $query = "select * from notifications where idDonneur='12345' and entete='First Test'";
    $resultat = $pdo->query($query1);
    
    
echo "<div class='container'>";
echo "<div class='col-md-3'>";
        echo "<h2>Notifications</h2>";
        while ($line = $resultat->fetch(PDO::FETCH_OBJ)) {
            echo "<a class='btn btn-primary' href='welcome.php?notifications=header'>".$line->entete."</a> ";
        }
                      
    echo "</div>";
    echo "<div class='col-md-9'>";
        if(isset($_GET['notifications']) AND $_GET['notifications'] === 'header'){
            if($resultat = $pdo->query($query)){
                while($line = $resultat->fetch(PDO::FETCH_OBJ)){
                    echo "<h2>".$line->entete."</h2>";
                    echo $line->corps;
                }
                
            }
            
        }
    echo "</div>";
echo "</div>"
?>