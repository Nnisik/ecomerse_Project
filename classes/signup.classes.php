<?php

class Signup extends Dbh {

    protected function checkUser($uid, $email) 
    {
        $stmt = $this->connect()->prepare('SELECT uid FROM users WHERE uid = ? OR umail = ?;');

        if(!$stmt->execute(array($uid, $email))) 
        {
            $stmt = null;
            header("location: ../signin.html?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() > 0) 
        {
            $resultCheck = false;
        }
        else
        {
            $resultCheck = true;
        }
        return $resultCheck;
    }

    protected function setUser($login, $email, $pwd) 
    {
        $stmt = $this->connect()->prepare('INSERT INTO users (ulogin, umail, upassword) VALUES (?,?,?);');

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($login, $email, $hashedPwd))) 
        {
            $stmt = null;
            header("location: ../signin.html?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }
}