<?php

require_once "../core/Response.php";
require_once "../core/validateData.php";
require_once "../models/Account.php";

$function = $_GET['function'];

$accountController = new AccountController;

switch ($function) {

    case "create":

        $accountController->create();

        break;

};


class AccountController
{
    function create()
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




}