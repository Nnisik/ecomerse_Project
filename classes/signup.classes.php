<?php

include "../inc/db.inc.php";

class Signup
{

    private $login;
    private $email;
    private $password;
    private $password_rpt;

    public function __construct($login, $email, $password, $password_rpt)
    {
        $this->login = $login;
        $this->email = $email;
        $this->password = $password;
        $this->password_rpt = $password_rpt;
    }

    public function signupUser()
    {
        if ($this->checkNoEmptyFields()) {
            header("location: ../signin.html&error=emptyfieldsleft");
            exit();
        }

        if ($this->invalidEmail()) {
            header("location:../sigin.html?error=invalidemail");
            exit();
        }

        if ($this->passwordsMatch()) {
            header("location:../signin.html?error=passwordsdontmatch");
            exit();
        }

        include "../inc/db.inc.php";

        if ($this->loginTaken()) {
            header("location:../signin.html?error=logintaken");
            exit();
        }

        if ($this->emailTaken()) {
            header("location:../signin.html?error=emailtaken");
            exit();
        }

        signupUser($this->login, $this->email, $this->password);
        header("location:../signin.html?error=none");
        exit();
    }

    private function checkNoEmptyFields()
    {
        if (empty($this->login) or empty($this->email) or empty($this->password) or empty($this->password_rpt)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    private function invalidEmail()
    {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function passwordsMatch()
    {
        if ($this->password == $this->password_rpt) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    private function loginTaken()
    {
        $result = checkLoginTaken($this->login);
        return $result;
    }

    private function emailTaken()
    {
        $result = checkEmailTaken($this->email);
        return $result;
    }
}
