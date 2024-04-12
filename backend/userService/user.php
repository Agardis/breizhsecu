<?php
class User {
    public int $userId;
    public string $lastname;
    public string $firstname;
    public string $email;
    public string $address;
    public Role $role;

}

class NewUser {
    public string $lastname;
    public string $firstname;
    public string $email;
    public string $password;
    public string $address;
    public Role $role;
}

class updatePassword {
    public int $userId;
    public string $password;
}

class Token {
    public int $userId;
    public string $token;
}

enum Role: int {
    case USER = 0;
    case ADMIN = 1;
}
?>