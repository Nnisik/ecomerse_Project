<?php

class SignupContr extends Signup
{
    private $login;
    private $pwd;
    private $pwdRPT;
    private $email;

    public function __construct($login, $pwd, $pwdRPT, $email)
    {
        $this->$login = $login;
        $this->$pwd = $pwd;
        $this->$pwdRPT = $pwdRPT;
        $this->$email = $email;
    }

    public function signupUser()
    {
        if($this->emptyInput() == false)
        {
            header("location: ../signin.html?error=emptyinput");
            exit();
        }
        if($this->invalidUid() == false)
        {
            header("location: ../signin.html?error=invalidlogin");
            exit();
        }
        if($this->invalidEmail() == false)
        {
            header("location: ../signin.html?error=invalidemail");
            exit();
        }
        if($this->pwdMatch() == false)
        {
            header("location: ../signin.html?error=passwordsdontmatch");
            exit();
        }
        if($this->checkUserExist() == false)
        {
            header("location: ../signin.html?error=loginoremailtaken");
            exit();
        }

        $this->setUser($this->login, $this->email, $this->pwd);
    }

    private function emptyInput()
    {
        if(empty($this->login) || empty($this->pwd) || empty($this->pwdRPT) || empty($this->email)) 
        {
            $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }

    private function invalidUid()
    {
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->login)) 
        {
            $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }

    private function invalidEmail()
    {
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) 
        {
            $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }

    private function pwdMatch()
    {
        if($this->pwd !== $this->pwdRPT) 
        {
            $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }

    private function checkUserExist()
    {
        if($this->checkUser($this->login, $this->email)) 
        {
            $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }
}
