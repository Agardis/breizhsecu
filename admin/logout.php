<?php
session_start();

 unset($_SESSION['nom']);
       unset($_SESSION['iduser']);
       unset($_SESSION['prenom']);      
       unset($_SESSION['identifiant']);
       unset($_SESSION['password']);
       
header("Location:index.php?erreur3");
?>