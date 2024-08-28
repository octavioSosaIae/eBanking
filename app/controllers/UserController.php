<?php

require_once "../models/User.php";
require_once "../core/validateData.php";

$function = $_GET['function'];
$userController = new UserController;

switch ($function) {

    case "login":

        $userController->login();

        break;

    case "register":

        $userController->register();

        break;
};


class UserController{
function login()
{

    $username = $_POST['username'];
    $password = $_POST['password'];

    //Falta validar los datos!

    $result = (new User())->login($username, $password);
    echo json_encode($result);
}


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
}

}