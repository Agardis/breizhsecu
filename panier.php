<?php
session_start();
include("admin/config/bdd_config.inc");
include("admin/inc/bdd_connect.php");
include("inc/utils.php");

if(isset($_GET['add']) && isset($_GET['id'])){
$_SESSION['PANIER'].=$_GET['id'].";";
}

if(isset($_GET['ajj']) ){
$_SESSION['PANIER'].=$_GET['ajj'].";";
}

if(isset($_GET['sub']) ){
$panier=$_SESSION['PANIER'];
$tabpanier=explode(";", $panier);
$truepanier=array_count_values($tabpanier);
unset($truepanier[""]);
$_SESSION['PANIER']=""; 
if(isset($truepanier[$_GET['sub']])){$truepanier[$_GET['sub']]--; }
foreach($truepanier as $id=>$nb){
for($i=0;$i<$nb;$i++){$_SESSION['PANIER'].=$id.";";
}
}

}
 
if(isset($_GET['remove'])){
$tabpanier=explode(";", $_SESSION['PANIER']);
$truepanier=array_count_values($tabpanier);
unset($truepanier[""]);
$_SESSION['PANIER']="";
foreach($truepanier as $id=>$nb){
if($_GET['remove']!=$id){ 
for($i=0;$i<$nb;$i++){$_SESSION['PANIER'].=$id.";";
}}
}
}
 
include("func/categorie_inc.php");
include("func/produit_inc.php");
include("func/panier_inc.php");


include("inc/top.php");
?>
	
<!-- 
Body Section 
-->
	<!--<div class="row">
	<div class="span12">   -->

	<div class="well well-small">
		<h1>Panier <small class="pull-right"> <?php echo nbArticlesFromPanier($_SESSION['PANIER']); ?> Article(s) dans votre panier </small></h1>
	<hr class="soften"/>	

	<table class="table table-bordered table-condensed">
              <thead>
                <tr>
                  <th>Produit</th>
                  <th>Description</th>
                   <th>Ref.</th>
                  <th>Prix Unitaire</th>
                  <th>Qt&eacute; </th>
                  <th>Total</th>
				</tr>
              </thead>
              <tbody>
              <?php 
              $montanttotal=0;
              foreach($panierrempli as $idprod=>$qte) {
              
              $produit=getProduct($bdd,$idprod);
              $montanttotal+=$produit['prix']*$qte;
              ?>
                <tr>
                  <td><img width="100" src="images/<?php echo $idprod; ?>.jpg" alt=""></td>
                  <td><b><?php echo $produit['titre']; ?></b><br><?php echo $produit['description']; ?></td>
                  <td>000<?php echo $idprod; ?></td>
                  <td><?php echo $produit['prix']; ?> &euro;</td>
                  <td>
					<input class="span1" style="max-width:34px" placeholder="1" id="appendedInputButtons" size="16" type="text" value="<?php echo $qte; ?>" disabled>
				  <div class="input-append">
					<form action="panier.php?id=" method="get"><button class="btn btn-mini" type="submit" name="sub" value="<?php echo $idprod; ?>" >-</button><button class="btn btn-mini" type="submit" name="ajj"  value="<?php echo $idprod; ?>"  > + </button><button class="btn btn-mini btn-danger" type="submit" name="remove"  value="<?php echo $idprod; ?>" ><span class="icon-remove"></span></button></form>
				</div>
				</td>
                  <td><?php echo $produit['prix']*$qte; ?> &euro;</td>
                </tr>
                <?php } ?>
			    	 <tr>
                  <td colspan="5" class="alignR">Total:	</td>
                  <td class="label label-primary"> <?php echo $montanttotal; ?> &euro;</td>
                </tr>
				</tbody>
            </table><br/>
		
		
            
		
	<a href="index.php" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Continuez &agrave; visiter </a>
	<?php if(nbArticlesFromPanier($_SESSION['PANIER'])>0) { ?><a href="payer.php" class="shopBtn btn-large pull-right">Payer<span class="icon-arrow-right"></span></a><?php } ?>

</div>



<?php
include("inc/bottom.php");
?>
	