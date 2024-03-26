<?php
session_start();
include("admin/config/bdd_config.inc");
include("admin/inc/bdd_connect.php");
include("inc/utils.php");

if(!isset($_SESSION['iduser'])){
header("Location:connecter.php");
}

include("func/categorie_inc.php");
include("func/produit_inc.php");
include("func/panier_inc.php");
include("func/compte_inc.php");
include("inc/top.php");
?>
	<div class="well well-small">
		  <h3>Mon compte
		  </h3>
		  <hr class="soften"/>
		 
		  
		 <div class="row-fluid">
		  <ul class="thumbnails">
			<li class="span4">
			  <div class="thumbnail">
				
                
				<a  href="mesinfos.php"><img src="http://localhost/breizhsecu/images/comptes/<?php echo $USER; ?>.jpg" alt=""  ></a>
				<div class="caption">
				 <a  href="mesinfos.php"><h5>Mes infos</h5></a>
				 
                 
				</div>
			  </div>
			</li>
			<li class="span4">
			  <div class="thumbnail">
				
                
				<a  href="mescommandes.php"><img src="images/divers/commandes.jpg" alt=""/></a>
				<div class="caption">
				  <a  href="mescommandes.php"><h5>Mes commandes</h5></a>
				 
                 
				</div>
			  </div>
			</li>
            <li class="span4">
			  <div class="thumbnail">
				
                
				<a  href="avis.php"><img src="images/divers/avis.jpg" alt=""/></a>
				<div class="caption">
				  <a  href="avis.php"><h5>Mes avis</h5></a>
				 
                 
				</div>
			  </div>
			</li></ul>	
	</div>
		  
	</div>
	
	
<?php
include("inc/bottom.php");
?>
	