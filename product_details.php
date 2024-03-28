<?php
session_start();
include("admin/config/bdd_config.inc");
include("admin/inc/bdd_connect.php");
include("inc/utils.php");
if(isset($_GET['poster'])){

$sql="insert into avis ( idcompte, idproduit, date, titre, texte) values ('".$_SESSION['iduser']."', '".$_GET['id']."', '".date('Y/m/d')."', '".addslashes($_GET['titreavis'])."', '".addslashes($_GET['texteavis'])."')";
echo $sql;

$reponse = $bdd->query($sql);

}


include("func/categorie_inc.php");
include("func/produit_inc.php");
include("func/panier_inc.php");
include("func/avis_inc.php");

include("inc/top.php");

$produit=getProduct($bdd,$_GET['id']);
?>
	<div class="row-fluid">
			<div class="span5">
			<div id="myCarousel" class="carousel slide cntr">
                <div class="carousel-inner">
                  <div class="item active">
                   <a href="#"> <img src="images/<?php echo $produit['idproduit']; ?>.jpg" alt="" style="width:100%"></a>
                  </div>
                
                
                </div>
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
            </div>
			</div>
			<div class="span7">
				<h3><?php echo $produit['titre']; ?></h3>
				<hr class="soft"/>
				
				<form class="form-horizontal qtyFrm" action="panier.php" method="get"><input type="hidden" name="add" /><input type="hidden" name="id" value="<?php echo $produit['idproduit']; ?>" />
				  <div class="control-group">
					<label class="control-label"><span><?php echo $produit['prix']; ?> &euro;</span></label>
					<div class="controls">
					
					</div>
				  </div>
				
				
               
               
				  
				  <p><?php echo $produit['description']; ?>
				  <p>
				  <button type="submit" class="shopBtn"><span class=" icon-shopping-cart"></span> Ajouter au panier</button>
				</form>
			</div>
			</div>
				<hr class="softn clr"/>


            <ul id="productDetail" class="nav nav-tabs">
              <li class=""><a href="#home" data-toggle="tab">Details</a></li>
              <li class="active"><a href="#profile" data-toggle="tab">Avis </a></li>
             
            </ul>
            <div id="myTabContent" class="tab-content tabWrapper">
            <div class="tab-pane fade" id="home">
			  <h4>Informations</h4>
                <table class="table table-striped">
				<tbody>
				<tr class="techSpecRow"><td class="techSpecTD1">Catégorie:</td><td class="techSpecTD2"><?php echo getCategorieTitre($bdd, $produit['idcat']); ?></td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Marque:</td><td class="techSpecTD2">Bijoo</td></tr>
				</tbody>
				</table>
				<p>Nos produits sont de haute qualité et nous vous garantissont un service et une livraison irréprochable.</p>
			
            
			</div>
			<div class="tab-pane fade active in" id="profile">
		
        
			
            
            
                <?php getAvis($bdd, $produit['idproduit']); ?>
           
         
         
		
        
			<form class="form-horizontal qtyFrm" action="product_details.php" method="get">	<div class="row-fluid">	  
					<div class="span2">
						&nbsp;<br/><img src="images/divers/anonyme.jpg" alt=""><input type="hidden" name="id" value="<?php echo $produit['idproduit']; ?>"/>
					</div>
					<div class="span6">
						<h5>Votre avis</h5><p> <input type="text" name="titreavis" placeholder="Titre de votre avis"/></p>
						<p>
						<textarea name="texteavis"></textarea>
						
					</div>
					<div class="span4 alignR">
				
				
                
					<div class="btn-group">
					  <button type="submit" class="defaultBtn" name="poster"><span class=" icon-shopping-cart"></span> Poster</button>
					 
                     
					 </div>
						
					</div>
			</div></form> 
			</div>



            </div>

</div>
<?php
include("inc/bottom.php");
?>
	