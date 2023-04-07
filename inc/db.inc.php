<?php

function checkLoginTaken($login)
{
    global $db;
    $sql = $db->prepare("SELECT * FROM users WHERE ulogin = ?;");
    $sql->execute([$login]);
    $result = $sql->fetchAll();

    if (count($result) == 0) {
        return false;
    } else {
        return true;
    }
}

function checkEmailTaken($email)
{
    global $db;
    $sql = $db->prepare("SELECT * FROM users WHERE umail = ?;");
    $sql->execute([$email]);
    $result = $sql->fetchAll();

    if (count($result) == 0) {
        return false;
    } else {
        return true;
    }
}

function signupUser($login, $email, $password)
{
    global $db;
    $sql = $db->prepare("INSERT INTO users (ulogin, umail, upassword) VALUES (?,?,?);");
    $sql->execute([$login, $email, $password]);
}

function userNotExist($login)
{
    global $db;
    $sql = $db->prepare("SELECT * FROM users WHERE ulogin = ?;");
    $sql->execute([$login]);
    $result = $sql->fetchAll();

    if (count($result) == 0) {
        return false;
    } else {
        return true;
    }
}

function wrongPassword($login, $password)
{
    global $db;
    $sql = $db->prepare("SELECT * FROM users WHERE ulogin = ? AND upassword = ?;");
    $sql->execute([$login, $password]);
    $result = $sql->fetchAll();

    if (count($result) == 0) {
        return true;
    } else {
        return false;
    }
}

function loginUser($login, $password)
{
    global $db;
    $sql = $db->prepare("SELECT uid FROM users WHERE ulogin = ? AND upassword = ?;");
    $sql->execute([$login, $password]);
    return $sql->fetch();
}

$db = new PDO('sqlite:../db.db');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// $users = $db->query("SELECT * FROM users");
// $goods = $db->query("SELECT * FROM goods");