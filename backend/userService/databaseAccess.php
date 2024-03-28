<?php
include("./user.php");
include("admin/inc/bdd_connect.php");

class DatabaseAccess {
    private $bd_connect;

    private $insertStatement;

    function __construct() {
        $bd_connect = $bdd;

        $insertStatement = $bd_connect->prepare("INSERT INTO 
            compte('nom', 'prenom', 'identifiant', 'password', 'adresse', 'statut') 
            VALUES(?, ?, ?, ?, ?, ?);");
    }

    function insertUser(User $user)
    {
        try {
            $insertStatement->bind_param("sssssi", $user->lastname, $user->firstname, $user->password, $user->address, $user->role->value);
            $insertStatement->execute();
        }
        catch (Exception $ex){
            throw $ex;
        }
    }
}
?> 