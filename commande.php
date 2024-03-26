<?php
session_start();
include("admin/config/bdd_config.inc");
include("admin/inc/bdd_connect.php");
include("inc/utils.php");


include("func/categorie_inc.php");
include("func/produit_inc.php");
include("func/panier_inc.php");
include("func/compte_inc.php");
include("func/commande_inc.php");
include("inc/top.php");
?>

               
	
<!-- 
Body Section 
-->
	<!--<div class="row">
	<div class="span12">   -->

	<div class="well well-small">
		<h1>Commande <small class="pull-right"> num&eacute;ro <?php echo $_GET['commande']; ?> (<?php echo statutCommande($bdd, $_GET['commande']); ?>)</small></h1>
	<hr class="soften"/>	
    
        <h3><b>Client : </b><?php echo getIdentite($bdd, $_GET['commande']); ?></h3>
    <hr class="soften"/>	
     <?php if(isset($_GET['payee'])) {echo "<h3>Votre commande a bien &eacute;t&eacute pay&eacutee !</h3><hr class=\"soften\"/>"; }?>
   

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
               $sql="select * from detailcommande,produit where detailcommande.idproduit=produit.idproduit and idcde=".$_GET['commande'];
	           $reponse = $bdd->query($sql);
	                 $montanttotal=0;
                while ($donnees = $reponse->fetch()){
             
              $montanttotal+=$donnees['prix']*$donnees['qte'];
              ?>
                <tr>
                  <td><img width="100" src="images/<?php echo $donnees['idproduit']; ?>.jpg" alt=""></td>
                  <td><b><?php echo $donnees['titre']; ?></b><br><?php echo $donnees['description']; ?></td>
                  <td>000<?php echo $donnees['idproduit']; ?></td>
                  <td><?php echo $donnees['prix']; ?> &euro;</td>
                  <td>
					<?php echo $donnees['qte']; ?>
				 
                 
				</td>
                  <td><?php echo $donnees['prix']*$donnees['qte']; ?> &euro;</td>
                </tr>
                <?php } ?>
			    	 <tr>
                  <td colspan="5" class="alignR">Total:	</td>
                  <td class="label label-primary"> <?php echo $montanttotal; ?> &euro;</td>
                </tr>
				</tbody>
            </table><br/>
		
		
            
		
	<a href="mescommandes.php" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Retour &agrave; la liste de mes commandes </a>


</div>



<?php
include("inc/bottom.php");
?>
	