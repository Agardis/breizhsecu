<?php
session_start();
include("admin/config/bdd_config.inc");
include("admin/inc/bdd_connect.php");
include("inc/utils.php");
include("func/produit_inc.php");
include("func/panier_inc.php");

$statut="Payee";
$sql="update commande set statut='".$statut."' where idcde=".$_GET['commande'];

$reponse = $bdd->query($sql);
$_SESSION['PANIER']="";
header("Location:commande.php?payee&commande=".$_GET['commande']);



?>
