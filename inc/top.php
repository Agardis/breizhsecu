<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bijoo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- Customize styles -->
    <link href="assets/css/style.css" rel="stylesheet"/>
    <!-- font awesome styles -->
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
		<!--[if IE 7]>
			<link href="css/font-awesome-ie7.min.css" rel="stylesheet">
		<![endif]-->

		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

	<!-- Favicons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
  </head>
<body>
<!-- 
	Upper Header Section 
-->
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="topNav">
		<div class="container">
			<div class="alignR">
				
				<a class="active" href="index.php"> <span class="icon-home"></span> Accueil</a> 
				<a href="accueil.php"><span class="icon-user"></span> Mon compte</a> 
				<a href="register.php"><span class="icon-edit"></span> S'enregistrer</a> 
				<a href="contact.php"><span class="icon-envelope"></span> Contactez nous</a>
				<a href="panier.php"><span class="icon-shopping-cart"></span> <?php echo nbArticlesFromPanier($_SESSION['PANIER']); ?> article(s) - <span class="badge badge-warning"> <?php echo $montanttotal; ?> &euro;</span></a>
			</div>
		</div>
	</div>
</div>

<!--
Lower Header Section 
-->
<div class="container">
<div id="gototop"> </div>
<header id="header">
<div class="row">
	<div class="span4">
	<h1>
	<a class="logo" href="index.php"> 
		<img src="assets/img/logo-bootstrap-shoping-cart.png" alt="Panier">
	</a>
	</h1>
	</div>
	<div class="span4">
	
	</div>
	
</div>
</header>

<!--
Navigation Bar Section 
-->
<div class="navbar">
	  <div class="navbar-inner">
		<div class="container">
		  <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </a>
		  <div class="nav-collapse">
			<ul class="nav">
			  <li class="active"><a href="index.php">Accueil	</a></li>
			  <?php
			  foreach($tabcat as $numerocat=>$nomcat){
				  echo "<li class=\"\"><a href=\"catalogue.php?cat=$numerocat\">$nomcat</a></li>";
			  }
			  ?>
			 
			</ul>
			
			<ul class="nav pull-right">
			<li class="dropdown">
            <?php if(!isset($_SESSION['iduser'])){ ?>
				<a  href="connecter.php"><span class="icon-lock"></span> Se connecter <b class="caret"></b></a>
		    <?php }else{ ?>	
            
                <a  href="deconnecter.php"><span class="icon-lock"></span> Se déconnecter <b class="caret"></b></a>
             <?php } ?>
			</li>
			</ul>
		  </div>
		</div>
	  </div>
	</div>
<!-- 
Body Section 
-->
	<div class="row">
<div id="sidebar" class="span3">
<div class="well well-small">
	<ul class="nav nav-list">
	 <?php
			  foreach($tabcat as $numerocat=>$nomcat){
				  echo "<li><a href=\"catalogue.php?cat=$numerocat\"><span class=\"icon-chevron-right\"></span>$nomcat</a></li>";
			  }
			  ?>
		
		<li style="border:0"> &nbsp;</li>
</ul>
</div>

		
			  <div class="well well-small" ><a href="#"><img src="assets/img/paypal.jpg" alt="payment method paypal"></a></div>
			
			
			<br>
			<br>
			
	</div>
	<div class="span9">
	<div class="well np">