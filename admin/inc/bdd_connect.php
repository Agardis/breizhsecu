<?php
try
{
    // On se connecte Ã  MySQL
    $bdd = new PDO('mysql:host='.$CONFIG['HOST'].';dbname='.$CONFIG['BDD'].';charset=utf8', $CONFIG['LOGIN'], $CONFIG['MDP']);

    $bdd->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrÃªte tout
    die('Erreur : '.$e->getMessage());
//faire une rediction propre !!!!!!!!!!!!
}
?>