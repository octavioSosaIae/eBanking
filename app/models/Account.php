<?php

require_once "../core/Database.php";


class Account
{

        //  Función para crear una cuenta
        function create($user_id,$balance)
        {
            $connection = new conn;
            $conn = $connection->connect();

            try {
                $sql = "INSERT INTO accounts (user_id, balance) VALUES('$user_id','$balance');";
    
                $response = $conn->query($sql);
                return $response;
            } catch (Exception $e) {
                throw new Exception("Error al crear la cuenta: " . $e->getMessage());
            }
        }



}
