<?php
session_start();
include("admin/config/bdd_config.inc");
include("admin/inc/bdd_connect.php");
include("inc/utils.php");
include("inc/utils.php");
include("func/categorie_inc.php");
include("func/produit_inc.php");
include("func/panier_inc.php");
include("inc/top.php");
?>
<!--
New Products
-->
	<div class="well well-small">
	<h3>Nouveautés </h3>
	<hr class="soften"/>
		<div class="row-fluid">
		<div id="newProductCar" class="carousel slide">
            <div class="carousel-inner">
			<div class="item active">
			  <ul class="thumbnails">
				<?php getNouveautes($bdd, 0,4); ?>
			  </ul>
			  </div>
		   <div class="item">
		  <ul class="thumbnails">
		<?php getNouveautes($bdd, 5,9); ?>
		  </ul>
		  </div>
		   </div>
		  <a class="left carousel-control" href="#newProductCar" data-slide="prev">&lsaquo;</a>
            <a class="right carousel-control" href="#newProductCar" data-slide="next">&rsaquo;</a>
		  </div>
		  </div>
		<div class="row-fluid">
		  <ul class="thumbnails">
			
            
		
               <?php getSelection($bdd,3);  ?>
        
		  </ul>
		</div>
	</div>
	<!--
	Featured Products
	-->
		<div class="well well-small">
		  <h3><a class="btn btn-mini pull-right" href="catalogue.php" title="En savoir plus">En voir plus<span class="icon-plus"></span></a>Nos bijoux</h3>
		  <hr class="soften"/>
		  <div class="row-fluid">
		  <ul class="thumbnails">
		<?php getSelectiondetaillee($bdd, 3); ?>
		  </ul>	
	</div>
	</div>
	
<?php
include("inc/bottom.php");
?>