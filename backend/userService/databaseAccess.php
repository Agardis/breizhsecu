<?php
include("./user.php");
include("admin/inc/bdd_connect.php");

class DatabaseAccess {
    private mysqli $bd_connect;

    private mysqli_stmt $insertStatement;
    private mysqli_stmt $selectUserStatement;
    private mysqli_stmt $selectTokenStatement;
    private mysqli_stmt $insertTokenStatement;
    private mysqli_stmt $updateUserStatement;
    private mysqli_stmt $updatePasswordStatement;
    private mysqli_stmt $updateTokenStatement;

    function __construct() {
        global $bdd;
        $this->bd_connect = $bdd;

        $this->insertStatement = $this->bd_connect->prepare("INSERT INTO 
            compte('nom', 'prenom', 'identifiant', 'password', 'adresse', 'statut') 
            VALUES(?, ?, ?, ?, ?, ?);");
        
        $this->selectUserStatement = $this->bd_connect->prepare("SELECT 
            ('id', 'nom', 'prenom', 'identifiant', 'adresse', 'statut') FROM compte
            WHERE id = ?;");

        $this->selectTokenStatement = $this->bd_connect->prepare("SELECT ('user_id')
            FROM token WHERE token = ? AND end_date > ?;");

        $this->insertTokenStatement = $this->bd_connect->prepare("INSERT INTO 
            token('token', 'user_id', 'start_date', 'end_date')
            VALUES (?, ?, ?, ?);");

        $this->updateUserStatement = $this->bd_connect->prepare("UPDATE compte 
            SET nom = ?, prenom = ?, identifiant = ?, adresse = ?
            WHERE id = ?");

        $this->updatePasswordStatement = $this->bd_connect->prepare("UPDATE compte
            SET password = ? WHERE id = ?");
    }

    function insertUser(newUser $user)
    {
        try 
        {
            $this->insertStatement->bind_param("sssssi", 
                                                $user->lastname, 
                                                $user->firstname, 
                                                $user->email, 
                                                $user->password, 
                                                $user->address, 
                                                $user->role->value
                                            );
            
            if (!$this->insertStatement->execute())
            {
                throw new Exception("DATABASE_ERROR");
            }
        }
        catch (Exception $ex)
        {
            throw $ex;
        }
    }

    function selectUser(int $userId)
    {
        try 
        {
            $this->selectUserStatement->bind_param("i", $userId);

            $this->selectUserStatement->execute();

            $result = $this->selectUserStatement->get_result();

            $row = $result->fetch_assoc();

            $user = new User();
            $user->userId = $row["id"];
            $user->lastname = $row["nom"];
            $user->firstname = $row["prenom"];
            $user->email = $row["identifiant"];
            $user->address = $row["adresse"];
            $user->role = Role::from($row["statut"]);

            return $user;
        }
        catch (Exception $ex)
        {
            throw $ex;
        }
    }

    function selectToken(string $token)
    {
        try
        {
            $currentDate = time();
            $this->selectTokenStatement->bind_param("si", $token, $currentDate);

            $this->selectTokenStatement->execute();

            $result = $this->selectTokenStatement->get_result();

            $row = $result->fetch_assoc();

            if ($row == null)
            {
                throw new Exception("INVALID_TOKEN");
            }

            return true;
        }
        catch (Exception $ex)
        {
            throw $ex;
        }
    }

    function insertToken(Token $token)
    {
        try
        {
            $currentDate = time();
            $endDate = $currentDate + 10800;
            $this->insertTokenStatement->bind_param("siii", $token->token, $token->userId, $currentDate, $endDate);

            if (!$this->insertTokenStatement->execute())
            {
                throw new Exception("DATABASE_ERROR");
            }
            return true;
        }
        catch (Exception $ex)
        {
            throw $ex;
        }
    }

    function updateToken(string $token)
    {
        try
        {
            $currentDate = time();
            $this->updateTokenStatement->bind_param("is", $currentDate, $token);

            if (!$this->updateTokenStatement->execute())
            {
                throw new Exception("DATABASE_ERROR");
            }

            return true;
        }
        catch (Exception $ex)
        {
            throw $ex;
        }
    }

    function updateUser(User $user)
    {
        try
        {
            $this->updateUserStatement->bind_param("ssssi", $user->lastname, $user->firstname, $user->email, $user->address, $user->userId);
            
            if (!$this->updateUserStatement->execute())
            {
                throw new Exception("DATABASE_ERROR");
            }

            return true;
        }
        catch (Exception $ex)
        {
            throw $ex;
        }
    }

    function updatePassword(UpdatePassword $args)
    {
        try
        {
            $this->updatePasswordStatement->bind_param("si", $args->password, $args->userId);

            if (!$this->updatePasswordStatement->execute())
            {
                throw new Exception("DATABASE_ERROR");
            }

            return true;
        }
        catch (Exception $ex)
        {
            throw $ex;
        }
    }
}
?> 