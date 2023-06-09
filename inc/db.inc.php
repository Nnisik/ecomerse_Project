<?php

include "json.inc.php";

function checkLoginTaken($login)
{
    global $db;
    $sql = $db->prepare("SELECT * FROM users WHERE ulogin = ?;");
    $sql->execute([$login]);
    $result = $sql->fetchAll();

    if (count($result) != 0) {
        return true;
    } else {
        return false;
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
    global $users;
    $result = false;
    foreach ($users as $user) {
        if ($user["ulogin"] == $login) {
            $result = true;
        }
    }
    return $result;
}

function wrongPassword($login, $password)
{
    global $users;
    foreach ($users as $user) {
        if ($user["ulogin"] == $login or $user["umail"] ==  $login) {
            if ($user["upassword"] != $password) {
                return true;
            } else {
                return false;
            }
        }
    }
    header("location:../signin.html&error=userdoesntexist");
    exit();
}

function loginUser($login, $password)
{
    global $users;
    foreach ($users as $user) {
        if ($user["ulogin"] == $login and $user["upassword"] == $password) {
            return $user["uid"];
        }
    }
}

function getUserEmail($id)
{
    global $users;
    foreach ($users as $user) {
        if ($user["uid"] == $id) {
            return $user["umail"];
        }
    }
}

function addnewProduct($name, $s_id, $desc, $price, $cat)
{
    global $db;
    $sql = $db->prepare("INSERT INTO goods (name, seller_id, descrip, price, cat) VALUES (?,?,?,?,?);");
    $sql->execute([$name, $s_id, $desc, $price, $cat]);
}

$db = new PDO('sqlite:../db.db');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$sql = $db->prepare("SELECT * FROM users");
$sql->execute();
$users = $sql->fetchAll();

// addnewProduct("Клавиатура", 1, "Механическая клавиатура, 100 клавиш", 2610, "electronics");

$sql = $db->prepare("SELECT * FROM goods");
$sql->execute();
$goods = $sql->fetchAll();
print("---");
print_r($goods);
// foreach ($goods as $product) {print_r($product);}
