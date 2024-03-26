<?php
include("config/bdd_config.inc");
include("inc/bdd_connect.php");
function existe($bdd,$login,$mdp){
$reponse = $bdd->query("select * from compte where identifiant='".addslashes($login)."' and password='".addslashes($mdp)."' limit 1");
$identite=array();

if ($donnees = $reponse->fetch())
{
$identite['id']=$donnees['id'];
 $identite['nom']=$donnees['nom'];
 $identite['prenom']=$donnees['prenom'];
 $identite['password']=$donnees['password'];
$identite['identifiant']=$donnees['identifiant'];
 return $identite;
  
  

} else {
return false;
}
}


//echo $_POST['identifiant']." ".$_POST['password'];
if(!isset($_POST['identifiant']) || !isset($_POST['password']) || ( $_POST['identifiant']=="" || $_POST['password']=="")) {
 header("Location:index.php?erreur1");
}  else {

$identite=existe($bdd,$_POST['identifiant'],$_POST['password']);
if($identite!=false){
session_start();
 $_SESSION['nom']=$identite['nom'];
       $_SESSION['iduser']=$identite['id'];
       $_SESSION['prenom']=$identite['prenom'];       
       $_SESSION['identifiant']=$identite['identifiant'] ;
       $_SESSION['password']=$identite['password'];
header("Location:accueil.php");
}

else{
header("Location:index.php?erreur2");
}


}


?>