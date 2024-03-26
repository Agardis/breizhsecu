<?php
session_start();
include("inc/utils.php");



   
   
       unset($_SESSION['nom']);
       unset($_SESSION['iduser']);
       unset($_SESSION['prenom']);      
       unset($_SESSION['identifiant']);
       unset($_SESSION['password']);
       header("Location:connecter.php");	

?>


