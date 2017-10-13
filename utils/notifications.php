<style>
.tabs {
  margin: 0px 20px;
  position: relative;
  background: #EFF1E4;
  box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.2);
  width: 100%;
}

.tabs nav {
  display: flex;
  flex-wrap: wrap;
  align-items: stretch;
  background: #AD9897;
  color: #6C5D5D;
  text-shadow: 1px 1px 1px rgba(255, 255, 255, 0.2);
  width: 150px;
}

.tabs nav a {
  padding: 20px 0px;
  text-align: center;
  width: 100%;
  cursor: pointer;
}

.tabs nav a:hover,
.tabs nav a.selected {
  background: #6C5D5D;
  color: #AD9897;
  text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.2);
}

.tabs .content {
  padding: 20px 0px;
  position: absolute;
  top: 0px;
  left: 150px;
  color: #6C5D5D;
  width: 6px;
  height: 100%;
  opacity: 0;
  transition: opacity 0.1s linear 0s;
}

.tabs .content.visible {
  padding: 20px;
  width: calc(100% - 150px);
  overflow: ;
  opacity: 1;
}

.tabs .content p { padding-bottom: 2px; }

.tabs .content p:last-of-type { padding-bottom: 0px; }


</style>
<script src="//code.jquery.com/jquery-2.1.4.min.js"></script> 

<?php 

$query1 = "select * from notifications where idDonneur='12345'";
$query = "select * from notifications where idDonneur='12345' and entete='First Test'";
$resultat = $pdo->query($query1);

echo "<div class='tabs'> ";
    echo "<nav>";
        while ($line = $resultat->fetch(PDO::FETCH_OBJ)) {
            echo "<a>".$line->entete."</a>";
        }
    echo "</nav>";

    
    echo " <div class='content'>";
        if($resultat = $pdo->query($query)){
            while($line = $resultat->fetch(PDO::FETCH_OBJ)){
                echo "<h2>".$line->entete."</h2>";
                echo "<p>".$line->corps."</p>";
            }
        }
        
    echo "</div>";
echo "</div>";
?>
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