<?php

function nbArticlesFromPanier($panier){
$tabpanier=explode(";", $panier);
unset($tabpanier[""]);
return count($tabpanier)-1;
}

function reconstruitPanierQte($panier){
$tabpanier=explode(";", $panier);
$truepanier=array_count_values($tabpanier);
unset($truepanier[""]);
return $truepanier;
}

$panierrempli=reconstruitPanierQte($_SESSION['PANIER']);
    $montanttotal=0;
 foreach($panierrempli as $idprod=>$qte) {
 $produit=getProduct($bdd,$idprod);
 $montanttotal+=$produit['prix']*$qte;
  }
?>