<?php

require_once "../models/User.php";
require_once "../core/validateData.php";

$function = $_GET['function'];

switch ($function) {

    case "login":

        login();

        break;

    case "register":

        register();

        break;
};


function login()
{

    $user = $_POST['user'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];



    $result = (new user())->login($user, $email, $pass);
    echo json_encode($result);
};


function register()
{

    $validateData = new ValidateData;

    $user = [
    "username" => $_POST['username'],
    "email" => $_POST['email'],
    "password" => $_POST['password'],
    "full_name" => $_POST['full_name'],
    "phone" => $_POST['phone']
    ];

    $sanitizeData = $validateData->sanitizeData($user);

    $result = (new User())->register($sanitizeData['username'], $sanitizeData['email'], $sanitizeData['password'], $sanitizeData['full_name'], $sanitizeData['phone']);
      
    if($result == true){
        $msg = "exito";
    } else {
        $msg = "no exito";
    }

    echo json_encode($msg);
};
