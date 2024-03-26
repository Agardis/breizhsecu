<?php
session_start();
include("admin/config/bdd_config.inc");
include("admin/inc/bdd_connect.php");
include("inc/utils.php");
include("func/categorie_inc.php");
include("func/produit_inc.php");
include("func/panier_inc.php");
include("func/commande_inc.php");


include("inc/top.php");
?>

       
       
        
	
	
    


     
     	<div class="well well-small">
		<h1>Mes commandes</h1>
	<hr class="soften"/>	

	<table class="table table-bordered table-condensed">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Num&eacute;ro commande</th>
                 
                 
				</tr>
              </thead>
              <tbody>
                   <?php displayCommandes($bdd, $_SESSION['iduser']); ?>
             
                
               
               
			    
                
				</tbody>
            </table><br/>
		
		
   

</div>


<?php
include("inc/bottom.php");
?>