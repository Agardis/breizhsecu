<?php
// On se connecte Ã  MySQL
$bdd = new mysqli($CONFIG['HOST'], $CONFIG['LOGIN'], $CONFIG['MDP']);

if($bdd->connect_error) {
    die('Erreur : '. $conn->connect_error);
}
?>