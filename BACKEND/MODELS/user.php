<?php

require_once "../CONECTION/connection.php";

class user
{

    function register($user, $pass)                //  funcion para registrar usuarios
    {
        $connection = new conn;
        $conn = $connection->connect();
        $sql = "INSERT INTO usuarios VALUES(0,'$user','$pass');";
        $response = $conn->query($sql);
        return $response;
    }


    function login($user, $pass)                //  funcion para logear usuarios
    {
        $connection = new conn;
        $conn = $connection->connect();
        $sql = "SELECT * FROM usuarios WHERE user='$user' AND pass='$pass';";
        $response = $conn->query($sql);
        $users = $response->fetch_all(MYSQLI_ASSOC);
        return $users;
    }

}
