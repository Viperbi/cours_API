<?php

    include './env.php';
    include './utils/functions.php';
    include './model/modelUser.php';


    function newUser($host,$dbname,$login,$password){

        header("Access-Control-Allow-Origin: *");

        header("Content-Type: application/json; charset=UTF-8");

        header("Access-Control-Allow-Methods: POST");

        header("Access-Control-Max-Age: 3600");

        header("Access-Control-Allow-Headers: Content-Type, Access-Control-AllowHeaders, Authorization, X-Requested-With");

        if($_SERVER['REQUEST_METHOD'] != 'POST'){
            http_response_code(405);
            echo json_encode(['message' => "Methode non autorisée", 'code response' => 405]);
            return;
        }

        $data = file_get_contents('php://input');

        $data = json_decode($data);

        if(!empty($data->pseudo) && !empty($data->password) && !empty($data->email)){
            $data->pseudo = sanitize($data->pseudo);
            $data->password = sanitize($data->password);
            $data->email = sanitize($data->email);
        }

        $bdd = connect($host,$dbname,$login,$password);

        writeUser($bdd, $data);

        http_response_code(200);

        $response = json_encode(['message' => "Tout s'est bien passé", 'code response' => 200]);

        echo $response;
    }

    newUser($_ENV['dbhost'],$_ENV['dbname'],$_ENV['dblogin'],$_ENV['dbpassword']);