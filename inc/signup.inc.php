<?php

if (isset($_POST["submit"])) {
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    $password_rpt = $_POST['pwdRPT'];

    include "../classes/signup.classes.php";

    $signup = new Signup($login, $email, $password, $password_rpt);
    $signup->signupUser();
}