<?php
/*
    List of the number of donnations in the left side by dates;
    if you click on one onglet the content of the donnation will appear in the right side: 
        -Date, cm3, Serologie, Lieu de prelevement, Responsable
*/ 
    echo 
    "<div class='col-md-4' > ";
        $query = "SELECT * FROM donneur d, don, serologie s WHERE d.idDoneur = don.idDonneur AND don.numDon = s.numDon  ";
    echo "</div>";

    echo "<div class='col-md-6' ></div>";
?>

