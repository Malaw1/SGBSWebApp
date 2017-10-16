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