<?php

require_once "../core/Database.php";


class Account
{

    //  Función para crear una cuenta
    function create()
    {
        $connection = new conn;
        $conn = $connection->connect();


        try {

            
         session_start();
         $user_id = $_SESSION['user_id'];


        
            $sql = "INSERT INTO accounts (user_id) VALUES('$user_id');";

            $response = $conn->query($sql);
            return $response;
        } catch (Exception $e) {
            throw new Exception("Error al crear la cuenta: " . $e->getMessage());
        }
    }




    function rechargeBalance($user_id, $amount)
    {
        $connection = new conn;
        $conn = $connection->connect();


        try {

            session_start();
            $user_id = $_SESSION['user_id'];

            $currentBalance = $this->getBalance($user_id);
            $newBalance = $currentBalance['balance'] + $amount;
            $sql = "UPDATE accounts SET balance = '$newBalance' WHERE user_id = '$user_id';";
            $response = $conn->query($sql);
            $result = $response->fetch_assoc();
            return $result;
        } catch (Exception $e) {
            throw new Exception("Error al recargar la cuenta: " . $e->getMessage());
        }
    }


    function getBalance($user_id)
    {

        $connection = new conn;
        $conn = $connection->connect();


        try {
            $sql = "SELECT AMOUNT FROM accounts WHERE user_id = '$user_id';";
            $response = $conn->query($sql);
            $result = $response->fetch_assoc();
            return $result;
        } catch (Exception $e) {
            throw new Exception("Error al obtener saldo: " . $e->getMessage());
        }

    }

   
}
