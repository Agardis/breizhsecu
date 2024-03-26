<?php


function getCategorie($bdd){
	$sql="select idcat,titre from categorie order by idcat";
	$reponse = $bdd->query($sql);
	$res=array();
    while ($donnees = $reponse->fetch()){
	$res[$donnees['idcat']]=$donnees['titre'];
	}
return $res;
}



function getCategorieTitre($bdd,$id){
	$sql="select titre from categorie where idcat=".$id;
	$reponse = $bdd->query($sql);
	$res="Nos produits";
    while ($donnees = $reponse->fetch()){
	$res=$donnees['titre'];
	}
return $res;
}



$tabcat=getCategorie($bdd);
?>