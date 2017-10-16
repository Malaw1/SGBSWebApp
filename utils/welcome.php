<?php

// Initialize the session

session_start();

require_once 'config.php';

// If session variable is not set it will redirect to login page

if(!isset($_SESSION['email']) || empty($_SESSION['email'])){

  header("location: login.php");

  exit;

}
else{
  $request = "SELECT* FROM users WHERE email = '".$_SESSION['email']."'";
  if ($result = $pdo->query($request)) {
    $line = $result->fetch(PDO::FETCH_OBJ);
      
    }
    else{
      echo "Requete non executee..!";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Espace Donneur | Profil</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../styles/file.css">
	<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initaile-scale=1">
	<style>
	body{
		background-color: red;
	}
	button{
		width: 90%;
	}
.footer {
    position: ;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: ;
    color: white;
	text-align: center;
	height: 100px;
	border: 1px solid white;
	
}
.glyphicon-home:hover{
	
}

#plugin{
	height: 400px;
	border: 1px solid white;
	margin-bottom: 5px;
}
</style>

</head>
<body>
	<div class="wrapper">
        <div class="container">
        	<div class="row">
                <div class="col-md-12">
                	<header id="header">
					 	<div class="slider">
					  		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					  		<!-- Wrapper for slides -->
					  			<div class="carousel-inner" role="listbox">
					    			<div class="item active">
					      				<img src="../img/don.JPG" class="img-responsive">
					    			</div>
					    			<div class="item">
					      				<img src="../img/don.JPG">
					    			</div>
					  			</div>

					  			<!-- Controls -->
					  			<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
					    			<span class="fa fa-angle-left" aria-hidden="true"></span>
					    			<span class="sr-only">Previous</span>
					  			</a>
								<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
								    <span class="fa fa-angle-right" aria-hidden="true"></span>
								    <span class="sr-only">Next</span>
								</a>
							</div>
                		</div><!--slider-->
                		<nav class="navbar navbar-default">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                          	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mainNav">
                            	<span class="sr-only">Toggle navigation</span>
                            	<span class="icon-bar"></span>
                            	<span class="icon-bar"></span>
                            	<span class="icon-bar"></span>
                          	</button>
                          	<a class="navbar-brand" href="#"><?php echo "<img class='img-responsive' src='../img/profile/".$line->profile."' />" ; ?></a>
                          	<span class="site-name"><b><?php echo $line->prenom ."</b> ". $line->nom; ?></span>
                          	<span class="site-description">Groupe Sanguin: <?php echo $line->groupe; ?></span>
                        </div>
                    
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="mainNav" >
                          	<ul class="nav main-menu navbar-nav">
                            	<li><a href="welcome.php" class="glyphicon glyphicon-home"></a></li>
                            	<li><a href="welcome.php?calendar" class="glyphicon glyphicon-calendar"></a></li>
                            	<li><a href="welcome.php?notifs" class="glyphicon glyphicon-envelope"></a></li>
                          	</ul>
                          
                           	<ul class="nav  navbar-nav navbar-right">
                           		<li><a href="welcome.php?profile=pro"><i class="glyphicon glyphicon-user"></i></a></li>
                            	<li><a href="logout.php"><i class="glyphicon glyphicon-off"></i></a></li>
                          	</ul>
                        </div><!-- /.navbar-collapse -->
					</nav>    
                </header><!--/#HEADER-->

                <div class="container">
					<!-- Facebook Page plugin appears here
					<div class="col-md-6" id="plugin">
						<p>Hello here is where the <strong><em>Facebook</em></strong> pluhin appears</p>
					</div>
					<!-- Facebook Page plugin ends here-->

					<!-- Twitter Page plugin appears here
					<div class="col-md-6" id="plugin">
					<p>Hello here is where the <strong><em>Twitter</em></strong> pluhin appears</p>
					</div>
					<!-- Twitter Page plugin ends here-->

                	<?php

                	if(isset($_GET['profile'])){
                      require 'profile.php';
                    }

                    if(isset($_GET['calendar'])){
                      require 'calendar.php';
					}
					
                    if(isset($_GET['notifs'])){
				
					$query1 = "select * from notifications where idDonneur='12345'";
					$query = "select * from notifications where idDonneur='12345' and entete='First Test'";
					$resultat = $pdo->query($query1);
					echo "<div class='container'>";
					echo "<div class='tabs'>";	
					echo "<nav>";

							while ($line = $resultat->fetch(PDO::FETCH_OBJ)) {
								echo "<a>".$line->entete."</a> ";
							}

					echo "</nav>";
					$query1 = "select * from notifications where idDonneur='12345'";
					$query = "select * from notifications where idDonneur='12345' and entete='First Test'";
					$resultat = $pdo->query($query1);
					
						while ($line = $resultat->fetch(PDO::FETCH_OBJ)) {
							echo "<div class='content'>";
								echo "<h2>".$line->entete."</h2> ";
								echo "<a>".$line->corps."</a> ";
							echo "</div>";
						}
					  
					}
					
                	?>
                </div>	
            </div>
        </div>
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