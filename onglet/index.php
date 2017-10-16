<?php
require '../utils/config.php';
?>
<?php
define('DB_SERVER', 'localhost');

  define('DB_USERNAME', 'root');

  define('DB_PASSWORD', '');

  define('DB_NAME', 'demo');

   

  /* Attempt to connect to MySQL database */

  try{

      $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);

      // Set the PDO error mode to exception

      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  } catch(PDOException $e){

      die("ERROR: Could not connect. " . $e->getMessage());

  }


?>

<!DOCTYPE html>
<html>
<head>
<title>test jquery Tab</title>
<link type="text/css" rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<script src="//code.jquery.com/jquery-2.1.4.min.js"></script> 
</head>
<body>
<div class="container">
<div class="tabs">
  <nav>
    <?php
      $query1 = "select * from notifications where idDonneur='12345'";
      $query = "select * from notifications where idDonneur='12345' and entete='First Test'";
      $resultat = $pdo->query($query1);

        while ($line = $resultat->fetch(PDO::FETCH_OBJ)) {
            echo "<a>".$line->entete."</a> ";
        }
    ?>
  </nav>
    <?php
      $query1 = "select * from notifications where idDonneur='12345'";
      $query = "select * from notifications where idDonneur='12345' and entete='First Test'";
      $resultat = $pdo->query($query1);

        while ($line = $resultat->fetch(PDO::FETCH_OBJ)) {
          echo "<div class='content'>";
              echo "<h2>".$line->entete."</h2> ";
              echo "<a>".$line->corps."</a> ";
            echo "</div>";
        }
    ?>

</div>
</div>
<script type="text/javascript">
$(function() {
$('.tabs nav a').on('click', function() {
  show_content($(this).index());
});

show_content(0);

function show_content(index) {
  // Make the content visible
  $('.tabs .content.visible').removeClass('visible');
  $('.tabs .content:nth-of-type(' + (index + 1) + ')').addClass('visible');

  // Set the tab to selected
  $('.tabs nav a.selected').removeClass('selected');
  $('.tabs nav a:nth-of-type(' + (index + 1) + ')').addClass('selected');
}
});

</script>
</body>
</html>