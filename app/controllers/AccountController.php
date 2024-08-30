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

    case "getAccounts":

        $accountController->getAccounts();

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

            $account_id = $_POST['account_id'];
            $amount = $_POST['balance'];



            $result = (new Account())->rechargeBalance($account_id, $amount);

            // Responder con el usuario creado
            $response->setStatusCode(200);
            $response->setBody(['message' => 'Cuenta cargada exitosamente']);
        } catch (Exception $e) {

            // Responder con un error
            $response->setStatusCode(400); // Código de estado para solicitud incorrecta
            $response->setBody(['error' => $e->getMessage()]);
        };
        $response->send();
    }

    function getAccounts()
    {
        try {
            $response = new Response;

            $result = (new Account())->getAccountsList();


            // Responder con el usuario creado
            $response->setStatusCode(200);
            $response->setBody(['message' => 'Cuentas encontradas exitosamente', 'data:' => $result]);
        } catch (Exception $e) {

            // Responder con un error
            $response->setStatusCode(400); // Código de estado para solicitud incorrecta
            $response->setBody(['error' => $e->getMessage()]);
        };
        $response->send();
    }
}
