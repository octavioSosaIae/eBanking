<?php

require_once "../models/User.php";
require_once "../core/validateData.php";
require_once "../core/Response.php";

$function = $_GET['function'];
$userController = new UserController;

switch ($function) {

    case "login":

        $userController->login();

        break;

    case "register":

        $userController->register();

        break;
        case "updatePassword":

            $userController->updatePassword();
    
            break;
};


class UserController
{

    function login()
    {


        $validateData = new ValidateData;
        $response = new Response;

        try {

            $user = [
                "email" => $_POST['email'],
                "password" => $_POST['password']
            ];

            $sanitizeData = $validateData->sanitizeData($user);

            $result = (new User())->login($sanitizeData['email'], $sanitizeData['password']);

            // Responder con el usuario logueado
            $response->setStatusCode(200);
            $response->setBody(['message' => 'Usuario logueado exitosamente']);
        } catch (Exception $e) {

            // Responder con un error
            $response->setStatusCode(400); // Código de estado para solicitud incorrecta
            $response->setBody(['error' => $e->getMessage()]);
        };
        $response->send();
    }


    function register()
    {
        try {
            $validateData = new ValidateData;
            $response = new Response;


            $user = [
                "username" => $_POST['username'],
                "email" => $_POST['email'],
                "password" => $_POST['password'],
                "full_name" => $_POST['full_name'],
                "phone" => $_POST['phone']
            ];

            $sanitizeData = $validateData->sanitizeData($user);

            $result = (new User())->register($sanitizeData['username'], $sanitizeData['email'], $sanitizeData['password'], $sanitizeData['full_name'], $sanitizeData['phone']);


            // Responder con el usuario creado
            $response->setStatusCode(201);
            $response->setBody(['message' => 'Usuario creado exitosamente']);
        } catch (Exception $e) {

            // Responder con un error
            $response->setStatusCode(400); // Código de estado para solicitud incorrecta
            $response->setBody(['error' => $e->getMessage()]);
        };
        $response->send();
    }

    function updatePassword()
    {

        try {
            $response = new Response;

            $user = [
                "user_id" => $_POST['user_id'],
                "new_password" => $_POST['new_password'],
                "current_password" => $_POST['current_password']
            ];

            $result = (new User())->updatePassword($user['current_password'], $user['new_password'], $user['user_id']);

            // Responder con el usuario creado
            $response->setStatusCode(201);
            $response->setBody(['message' => 'Usuario creado exitosamente']);
        } catch (Exception $e) {

            // Responder con un error
            $response->setStatusCode(400); // Código de estado para solicitud incorrecta
            $response->setBody(['error' => $e->getMessage()]);
        };
        $response->send();
    }
}
