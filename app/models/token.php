<?php




    //  Funcion para creacion de tokens


    function createToken($username)
    {

        $secretKey = 'secretToken666';

         global $secretKey;


        $token = base64_encode(json_encode(['username' => $username, 'exp' => time() + 60]));


        $signature = hash_hmac('sha256', $token, $secretKey);

        return $token . '.' . $signature;
    }

    function verifyToken($token) 
    {
        global $secretKey;

        list($encodedPayload, $signature) = explode('.', $token);

        //Para verificar la firma

        if (hash_hmac('sha256',$encodedPayload,$secretKey) !==$signature)
        {

            return null; //token invalido
        }

        $payload = json_decode(base64_decode($encodedPayload), true);


        // Verifica si el token expiro

        if ($payload['exp'] < time()){

            return null; //Token expiro
        }
        
    }