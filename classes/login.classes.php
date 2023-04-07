<?php

include "../inc/db.inc.php";

class Login
{

    private $login;
    private $password;

    public function __construct($login, $password)
    {
        $this->login = $login;
        $this->password = $password;
    }

    public function loginUser()
    {
        if (userNotExist($this->login)) {
            header("location: ../signin.html?error=userdoesntexist");
            exit();
        }

        if (wrongPassword($this->login, $this->password)) {
            header("location: ../signin.html?error=wrongpassword");
            exit();
        }

        $uid = loginUser($this->login, $this->password);
        $header = "location:../index.html?error=none&id=" + $uid;
        header($header);
        exit();
    }
}
