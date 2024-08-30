<?php

require_once "../core/Database.php";

class Transaction
{

    //  Función para registro de usuarios
    function register($fromAccountId, $toAccountId, $amount, $description)
    {
        $connection = new conn;
        $conn = $connection->connect();
        try {

            $sql = "SELECT amount FROM accounts WHERE account_id = '$fromAccountId';";
            $response = $conn->query($sql);
            $resultAmountOrigin = $response->fetch_assoc();

            if($resultAmountOrigin[0] < $amount){
                $status = "Rechazada";
            }

            $sql = "INSERT INTO transactions (from_account_id, to_account_id, amount, description, status) VALUES('$fromAccountId','$toAccountId', '$amount','$description', '$status');";

            $response = $conn->query($sql);
            
            if($status != "Rechazada"){
                $sql = "SELECT amount FROM accounts WHERE account_id = '$toAccountId';";
                $response = $conn->query($sql);
                $originalAmount = $response->fetch_assoc();

                $newAmount = $originalAmount[0] + $amount;

                $sql = "UPDATE accounts SET amount = '$newAmount' WHERE account_id = '$toAccountId'";
                $response = $conn->query($sql);


                $sql = "SELECT amount FROM accounts WHERE account_id = '$fromAccountId';";
                $response = $conn->query($sql);
                $originalAmount = $response->fetch_assoc();
                $newAmount = $originalAmount - $amount;
                $sql = "UPDATE accounts SET amount = '$newAmount' WHERE account_id = '$toAccountId'";
                $response = $conn->query($sql);               
            }
            return $response;
        } catch (Exception $e) {
            throw new Exception("Error al registrar la transacción: " . $e->getMessage());
        }
    }
}