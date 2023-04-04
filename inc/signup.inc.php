<?php

if (isset($_POST['submit-signup']))
{
    // grabbing the data
    $login = $_POST['signup-login'];
    $pwd = $_POST['signup-pwd'];
    $pwdRPT = $_POST['signup-pwdRPT'];
    $email = $_POST['signup-email'];

    // instantiate SignupContr class
    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";
    $signup = new SignupContr($login, $pwd, $pwdRPT, $email);

    // running error handlers and user signup
    $signup->signupUser();

    // going back to front page
    header("location: ../index.html?error=none");
}
