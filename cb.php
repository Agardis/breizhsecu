<?php
session_start();
include("admin/config/bdd_config.inc");
include("admin/inc/bdd_connect.php");
include("inc/utils.php");

include("func/categorie_inc.php");
include("func/produit_inc.php");
include("func/panier_inc.php");
include("func/compte_inc.php");


include("inc/top.php");

?>
	<form class="form-horizontal" action="acquitter.php" method="get">
		<h3>&nbsp; Payer votre commande</h3> <input type="hidden" name="commande" value="<?php echo $_GET['commande'];?>">
		
        	<h4>&nbsp; Montant : <?php echo $montanttotal; ?> &euro;</h4>    
            <?php if(isset($_GET['error'])){ echo"	<br/><h4>Mauvais code de CB"; } ?>     
		<div class="control-group">
			<label class="control-label" for="inputFname">Num&eacute;ro de CB<sup>*</sup></label>
			<div class="controls">
			  <input type="text" name="cb" placeholder="votre num&eacute;ro de CB">
			</div>
		 </div>
		 <div class="control-group">
			<label class="control-label" for="inputLname">Date de validit&eacute;<sup>*</sup></label>
			<div class="controls">
			  <input type="text" name="validite" placeholder="00/00">
			</div>
		 </div>
		<div class="control-group">
		<label class="control-label" for="inputEmail">Cryptogramme <sup>*</sup></label>
		<div class="controls">
		  <input type="text" name="crypto" placeholder="000">
		</div>
	  </div>	  
	<div class="control-group">
		<div class="controls">
		 <input type="submit" name="register" value="Payer ma commande" class="exclusive shopBtn">
		</div>
	</div>
	</form>
</div>




<?php
include("inc/bottom.php");
?>