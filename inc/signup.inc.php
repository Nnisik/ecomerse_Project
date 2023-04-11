<?php

function checkEmptyFields($login, $email, $password, $password_rpt)
{
    if (empty($login) or empty($email) or empty($password) or empty($password_rpt)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = false;
    } else {
        $result = true;
    }
    return $result;
}

function passwordsMatch($password, $password_rpt)
{
    if ($password != $password_rpt) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

if (isset($_POST["submit"])) {
    $login = $_POST["login"];
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    $password_rpt = $_POST['pwdPRT'];

    print_r($login);
    print_r($email);
    print_r($password);
    print_r($password_rpt);

    if (checkEmptyFields($login, $email, $password, $password_rpt)) {
        header("location: ../signin.html?error=emptyfieldsleft");
        echo "Empty fields";
    }

    //echo "Email correct";

    if (passwordsMatch($password, $password_rpt)) {
        header("location:../signin.html?error=passwordsdontmatch");
        echo "Passwords not match";
    }
    else {
        echo "Passwords match";
    }

    include "./db.inc.php";

    if (checkLoginTaken($login)) {
        header("location:../signin.html?error=logintaken");
        echo "login taken";
    }
    else {
        echo "Login free";
    }

    if (checkEmailTaken($email)) {
        header("location:../signin.html?error=emailtaken");
        echo "email taken";
    }
    else {
        echo "email free";
    }

    signupUser($login, $email, $password);
    echo "User created";
    header("../signin.html");

}
