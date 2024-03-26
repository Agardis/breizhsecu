<?php
session_start();
include("admin/config/bdd_config.inc");
include("admin/inc/bdd_connect.php");
include("inc/utils.php");
include("func/produit_inc.php");
include("func/panier_inc.php");

function isValid($cb, $validite, $crypto){
if($cb=="1234123412341234" && $validite=="01/24" && $crypto=="123" ){return True;}else {return False;}
}


if(!isset($_SESSION['iduser'])){
header("Location:connecter.php");
}else{



if(isValid($_GET['cb'],$_GET['validite'],$_GET['crypto'])){

header("Location:validation.php?direction=acquittement.php&commande=".$_GET['commande']);
}
else {
header("Location:cb.php?error&commande=".$_GET['commande']);
}



}







?>

    