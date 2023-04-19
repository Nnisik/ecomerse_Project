<?php

include "db.inc.php";

if (isset($_POST["submit"])) {
    $login = $_POST["login"];
    $password = $_POST["pwd"];

    if (userNotExist($login)) {
        print($login);
        print(userNotExist($login));
        // header("location:../signin.html?error=userdoesntexist");
    }

    if (wrongPassword($login, $password)) {
        header("location:../signin.html?error=wrongpassword");
    }

    $uid = loginUser($login, $password);
    $header = "location:../index.html?error=none&id=";

    $email = getUserEmail($uid);
    header($header .= (string)$uid);
}