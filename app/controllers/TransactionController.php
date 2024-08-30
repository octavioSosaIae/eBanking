<?php

require_once "../models/Transaction.php";
require_once "../core/validateData.php";
require_once "../core/Response.php";

$function = $_GET['function'];
$transactionController = new TransactionController;

switch ($function) {

    case "register":

        $transactionController->register();

        break;
};


class TransactionController
{
    function register()
    {
        try {
            $validateData = new ValidateData;
            $response = new Response;


            $transaction = [
                "from_account_id" => $_POST['from_account_id'],
                "to_account_id" => $_POST['to_account_id'],
                "amount" => $_POST['amount'],
                "description" => $_POST['description']
            ];

            $sanitizeData = $validateData->sanitizeData($transaction);

            $result = (new Transaction())->register($transaction['from_account_id'], $transaction['to_account_id'], $transaction['amount'], $transaction['description']);


            // Responder con la transaccion registrada
            $response->setStatusCode(201);
            $response->setBody(['message' => 'Transaccion registrada correctamente']);
        } catch (Exception $e) {

            // Responder con un error
            $response->setStatusCode(400); // Código de estado para solicitud incorrecta
            $response->setBody(['error' => $e->getMessage()]);
        };
        $response->send();
    }
}
