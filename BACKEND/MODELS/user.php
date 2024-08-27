<?php

require_once "../CONECTION/connection.php";

class user
{

    function register($username, $email, $pass)                //  funcion para registrar usuarios
    {
        $connection = new conn;
        $conn = $connection->connect();
        $sql = "INSERT INTO users VALUES(NULL,'$username','$email','$pass');";
        $response = $conn->query($sql);
        return $response;
    }


    function login($username,$email, $pass)                //  funcion para logear usuarios
    {
        $connection = new conn;
        $conn = $connection->connect();
        $sql = "SELECT * FROM users WHERE username='$username' OR email='$email' AND password='$pass';";
        $response = $conn->query($sql);
        $users = $response->fetch_all(MYSQLI_ASSOC);
        return $users;
    }

}
