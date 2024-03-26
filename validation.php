<?php
session_start();
include("admin/config/bdd_config.inc");
include("admin/inc/bdd_connect.php");
include("inc/utils.php");
include("func/produit_inc.php");
include("func/panier_inc.php");



header("Location:".$_GET['direction']."?commande=".$_GET['commande']);



?>
