<?php

function getProduct($bdd,$id){
	$sql="select * from produit where idproduit=".$id;
	$reponse = $bdd->query($sql);
    $produit=array();
    while ($donnees = $reponse->fetch()){
    $produit['idcat']=$donnees['idcat'];
      $produit['idproduit']=$donnees['idproduit'];
		   $produit['titre']=$donnees['titre'];
           $produit['description']=$donnees['description'];
           $produit['prix']=$donnees['prix'];
	
	}
    if(count($produit)==0) return null;
return $produit;
} 


function getNouveautes($bdd, $debut, $fin){
	$sql="select * from produit, nouveautes where idproduit=id limit $debut,$fin";
	$reponse = $bdd->query($sql);

    while ($donnees = $reponse->fetch()){
		   
	    echo "	<li class=\"span3\">
				<div class=\"thumbnail\">
					<a class=\"zoomTool\" href=\"product_details.php?id=".$donnees['idproduit']."\" title=\"ajouter au panier\"><span class=\"icon-search\"></span> APERCU</a>
					<a href=\"#\" class=\"tag\"></a>
					<a href=\"product_details.php?id=".$donnees['idproduit']."\"><img src=\"images/".$donnees['idproduit'].".jpg\" alt=\"bootstrap-ring\"></a>
				</div>
				</li>";
	}
    

} 


function getSelection($bdd, $limit){
	$sql="select * from produit order by rand() limit $limit";
	$reponse = $bdd->query($sql);

    while ($donnees = $reponse->fetch()){
		   
	    echo "	<li class=\"span4\">
			  <div class=\"thumbnail\">
				 
				<a class=\"zoomTool\" href=\"product_details.php?id=".$donnees['idproduit']."\" title=\"ajouter au panier\"><span class=\"icon-search\"></span> APERCU</a>
				<a href=\"product_details.php?id=".$donnees['idproduit']."\"><img src=\"images/".$donnees['idproduit'].".jpg\" alt=\"\"></a>
				<div class=\"caption cntr\">
					<p>".$donnees['titre']."</p>
					<p><strong> ".$donnees['prix']." &euro;</strong></p>
					<h4><a class=\"shopBtn\" href=\"panier.php?add&id=".$donnees['idproduit']."\" title=\"Ajouter au panier\">Ajouter au panier </a></h4>
					<div class=\"actionList\">
						
						
					</div> 
					<br class=\"clr\">
				</div>
			  </div>
			</li>";
	}
    

}



function getProductFromCategorie($bdd,$id){
 if ($id!=0){
	$sql="select * from produit where idcat=".$id;
    
    } else { 	$sql="select * from produit order by rand()";}
	$reponse = $bdd->query($sql);
	$res="";
	$compteur=1;
    while ($donnees = $reponse->fetch()){
		if($compteur%3==1){ $res.="<div class=\"row-fluid\"><ul class=\"thumbnails\">";} 
	$res.=	"<li class=\"span4\">
			  <div class=\"thumbnail\">
				<a class=\"zoomTool\" href=\"product_details.php?id=".$donnees['idproduit']."\" title=\"ajouter au panier\"><span class=\"icon-search\"></span> APERCU</a>
				<a  href=\"product_details.php?id=".$donnees['idproduit']."\"><img src=\"images/".$donnees['idproduit'].".jpg\" alt=\"\"></a>
				<div class=\"caption\">
				  <h5>".$donnees['titre']."</h5>
				  <h4>
					  <a class=\"defaultBtn\" href=\"product_details.php?id=".$donnees['idproduit']."\" title=\"Cliquez pour voir\"><span class=\"icon-zoom-in\"></span></a>
					  <a class=\"shopBtn\" href=\"panier.php?add=&id=".$donnees['idproduit']."\" title=\"ajouter au panier\"><span class=\"icon-plus\"></span></a>
					  <span class=\"pull-right\">".$donnees['prix']." &euro;</span>
				  </h4>
				</div>
			  </div>
			</li>";
		if($compteur%3==0){ $res.="</ul></div>";} 	
		$compteur++;
	
	}
	$compteur--;
	if($compteur%3!=0){ $res.="</ul></div>";} 	
return $res;
}


function getSelectiondetaillee($bdd, $limit){
	$sql="select * from produit order by rand() limit $limit";
	$reponse = $bdd->query($sql);

    while ($donnees = $reponse->fetch()){
		   
	    echo "<li class=\"span4\">
			  <div class=\"thumbnail\">
				<a class=\"zoomTool\" href=\"panier.php?add&id=".$donnees['idproduit']."\" title=\"ajouter au panier\"><span class=\"icon-search\"></span> APERCU</a>
				<a  href=\"product_details.php?id=".$donnees['idproduit']."\"><img src=\"images/".$donnees['idproduit'].".jpg\" alt=\"\"></a>
				<div class=\"caption\">
				  <h5>".$donnees['titre']."</h5>
				  <h4>
					  <a class=\"defaultBtn\" href=\"product_details.php?id=".$donnees['idproduit']."\" title=\"Click to view\"><span class=\"icon-zoom-in\"></span></a>
					  <a class=\"shopBtn\" href=\"panier.php?add&id=".$donnees['idproduit']."\" title=\"ajouter au panier\"><span class=\"icon-plus\"></span></a>
					  <span class=\"pull-right\">".$donnees['prix']." &euro;</span>
				  </h4>
				</div>
			  </div>
			</li>";
	}
    

} 


?>