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
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);       
            $sql = "INSERT INTO users (username, password_hash, email, full_name, phone) VALUES('$username','$hashedPassword', '$email','$full_name', '$phone');";

            $response = $conn->query($sql);
            return $response;
        } catch (Exception $e) {
            throw new Exception("Error al crear el usuario: " . $e->getMessage());
        }
    }

    //  Función para login de usuarios
    function login($email, $pass)
    {
        $connection = new conn;
        $conn = $connection->connect();
        try {
            $sql = "SELECT * FROM users WHERE email='$email' AND password_hash='$pass';";
            $response = $conn->query($sql);
            $users = $response->fetch_assoc();
            if ($users == NULL) {
                throw new Exception("Error al loguear el usuario: Usuario o contraseña incorrecto");
            }
            return $users;
        } catch (Exception $e) {
            throw new Exception("Error al loguear el usuario: " . $e->getMessage());
        }
    }

    //  Función para actualizar los usuarios sin la contraseña

    public function updateWithoutPassword($username, $email, $full_name, $phone, $userId)
    {
        $connection = new conn;
        $conn = $connection->connect();

        try {
            $sql = "UPDATE users SET username = '$username', email = '$email', full_name = '$full_name', phone = '$phone' WHERE user_id = '$userId';";
            $response = $conn->query($sql);
            $users = $response->fetch_all(MYSQLI_ASSOC);
            return $users;
        } catch (Exception) {
            return "Error";
        }
    }

    // Método para actualizar solo la contraseña del usuario
    public function updatePassword($currentPassword, $newPassword, $userId)
    {

        try {
            // Verificar la contraseña actual
  
            
            $connection = new conn;
            $conn = $connection->connect();

            $sql = "SELECT password_hash FROM users WHERE user_id = '$userId'";
            $response = $conn->query($sql);
            $result = $response->fetch_assoc();
            if ($result == NULL){

                throw new Exception("No se encontro la contraseña del usuario");

            }else{
                if(!password_verify($currentPassword,$result['password_hash'])){
                    throw new Exception("La contraseña actual no coincide");
                    
                }
            }
            
            $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);                      // para hashear la contraseña 
            $sql = "UPDATE users SET password_hash = '$hashedPassword' WHERE user_id = '$userId'";
            $response = $conn->query($sql);
            return $response;
        } catch (Exception $e) {

            throw new Exception("Error al actualizar la contraseña: " . $e->getMessage());
        }
    }

       

}
