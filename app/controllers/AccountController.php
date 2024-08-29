<?php

require_once "../core/Response.php";
require_once "../models/Account.php";

$function = $_GET['function'];

$accountController = new AccountController;

switch ($function) {

    case "create":

        $accountController->create();

        break;

        case "recharge":

            $accountController->recharge();
    
            break;

};


class AccountController
{
    function create()
    {
        try {
            $response = new Response;
            
  

            $result = (new Account())->create();


            // Responder con el usuario creado
            $response->setStatusCode(201);
            $response->setBody(['message' => 'Cuenta creada exitosamente']);
        } catch (Exception $e) {

            // Responder con un error
            $response->setStatusCode(400); // Código de estado para solicitud incorrecta
            $response->setBody(['error' => $e->getMessage()]);
        };
        $response->send();
    }

    function recharge()
    {
        try {
            $response = new Response;
            
            $user_id = $_POST ['user_id'];
            $amount = $_POST['balance'];


            $result = (new Account())->rechargeBalance($amount, $user_id);

            // Responder con el usuario creado
            $response->setStatusCode(201);
            $response->setBody(['message' => 'Cuenta creada exitosamente']);
        } catch (Exception $e) {

            // Responder con un error
            $response->setStatusCode(400); // Código de estado para solicitud incorrecta
            $response->setBody(['error' => $e->getMessage()]);
        };
        $response->send();



    }




}