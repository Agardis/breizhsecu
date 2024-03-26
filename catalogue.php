<?php
session_start();
include("admin/config/bdd_config.inc");
include("admin/inc/bdd_connect.php");
include("inc/utils.php");
include("func/categorie_inc.php");
include("func/produit_inc.php");
include("func/panier_inc.php");

include("inc/top.php");
?>
		

	<!--
	Featured Products
	-->
		<div class="well well-small">
		  <h3><?php if(!isset($_GET['cat'])) $_GET['cat']=0; echo getCategorieTitre($bdd,$_GET['cat']); ?>
		  </h3>
		  <hr class="soften"/>
		 
		  <?php echo getProductFromCategorie($bdd,$_GET['cat']); ?>
			
            
	
	
<?php
include("inc/bottom.php");
?>
	