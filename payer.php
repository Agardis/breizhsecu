<?php
session_start();
include("admin/config/bdd_config.inc");
include("admin/inc/bdd_connect.php");
include("inc/utils.php");
include("func/produit_inc.php");
include("func/panier_inc.php");

if(!isset($_SESSION['iduser'])){
header("Location:connecter.php");
}else{

$sql="insert into commande values ('','".$_SESSION['iduser']."','".date('Y-m-d')."','En attente de paiement')";
$reponse = $bdd->query($sql);
$idcde=$bdd->lastInsertId();
if($icde!==false){

foreach($panierrempli as $idprod=>$qte) {
$sql="insert into detailcommande values ('','".$idcde."','".$idprod."','".$qte."')";
$reponse = $bdd->query($sql);              
}

header("Location:cb.php?commande=".$idcde);
}




}


?>
	