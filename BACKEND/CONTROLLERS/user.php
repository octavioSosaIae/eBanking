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
    $pass = $_POST['pass'];

    $result = (new user())->login($user, $pass);
    echo json_encode($result);
};


function register()
{

    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $result = (new user())->register($user, $pass);
    echo json_encode($result);
};

