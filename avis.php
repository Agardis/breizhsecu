<?php
session_start();
include("admin/config/bdd_config.inc");
include("admin/inc/bdd_connect.php");
include("inc/utils.php");
if(isset($_GET['delete'])){
  	$sql="delete from avis where idavis=".$_GET['delete'];
	$reponse = $bdd->query($sql);
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
		<h1>Mes avis</h1>
	<hr class="soften"/>	

	<table class="table table-bordered table-condensed">
              <thead>
                <tr>
                  <th width="80">Produit</th>
                  <th>Avis</th>
                 <th width="80">&nbsp;</th> 
                
                
				</tr>
              </thead>
              <tbody>
              <?php 
               $sql="select idavis,produit.idproduit, produit.titre, produit.description, produit.prix, avis.titre as titreavis, avis.texte  as texteavis from avis,produit where avis.idproduit=produit.idproduit and idcompte=".$_SESSION['iduser'];
               
               
	           $reponse = $bdd->query($sql);
	             
                 
                while ($donnees = $reponse->fetch()){
        
              ?>
                <tr>
                  <td><img width="100" src="images/<?php echo $donnees['idproduit']; ?>.jpg" alt=""><br/></td>
                  <td><b><?php echo $donnees['titreavis']; ?></b><br><?php echo $donnees['texteavis']; ?></td>
                   <th><a class="defaultBtn" href="avis.php?delete=<?php echo $donnees['idavis']; ?>" title="Cliquez pour supprimer"><span class="icon-delete-in">Supprimer</span></a> </th>
                
                
                
                 
                </tr>
                <?php } ?>
			    	
                    
				</tbody>
            </table><br/>
		
		
            
		
	<a href="mescommandes.php" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Retour &agrave; la liste de mes commandes </a>


</div>



<?php
include("inc/bottom.php");
?>
	