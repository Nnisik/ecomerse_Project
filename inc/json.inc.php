<?php
function addUserDataJSONlist($id, $login, $email) {
    global $userJsonArray;
    $jsonArray = [
        "id" => (string)$id,
        "login" => $login,
        "email" => $email
    ];
    array_push($userJsonArray, $jsonArray);
}

function addProductsData() {
    // TODO: to global varuable $prodJsonArray adding array with information about new product 
    // the information is transfered with function calling
}

function writeUsersToJSON() {
    // TODO: connect to user Json file and write all information from $userJsonArray to it
    global $userJsonArray;
}

function writeProductDataToJSON() {
    // TODO: connect to products Json file and write all information from $prodJsonArray to it
}

function clearUserJSONfile() {
    // creating user file handler
    $userJsonFile = @fopen("../json/user-data.json","r+");
    // truncrating the user file to zero
    @ftruncate($userJsonFile, 0);
}

$userJsonArray = [];
$userJsonArray = [];
// print_r($userJsonArray);
