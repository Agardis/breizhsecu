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

enum Role: int {
    case USER = 0;
    case ADMIN = 1;
}
?>