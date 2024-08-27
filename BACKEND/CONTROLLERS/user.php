<?php

require_once "../MODELS/user.php";

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

    $user = $_POST['user'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $result = (new user())->register($user, $pass, $email);
    echo json_encode($result);
};
