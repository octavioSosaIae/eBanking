<?php

require_once "../core/Database.php";

class User
{

    //  Función para registro de usuarios
    function register($username, $email, $password, $full_name, $phone)
    {
        $connection = new conn;
        $conn = $connection->connect();
        try {
            $sql = "INSERT INTO Users (username, password_hash, email, full_name, phone) VALUES('$username','$password', '$email','$full_name', '$phone');";

            $response = $conn->query($sql);
            return true;
        } catch (Exception){
            return false;
        }
    }

    //  Función para login de usuarios
    function login($email, $pass)
    {
        $connection = new conn;
        $conn = $connection->connect();
        try{
        $sql = "SELECT * FROM users WHERE email='$email' AND password='$pass';";
        $response = $conn->query($sql);
        $users = $response->fetch_all(MYSQLI_ASSOC);
        return $users;
        } catch (Exception){
            return "Error";
        }
    }

}
