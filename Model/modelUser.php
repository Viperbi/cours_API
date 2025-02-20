<?php

function readUser($bdd) {
    $request = $bdd->prepare('SELECT pseudo,email,`password`,id FROM users');

    $request->execute();

    $data = $request->fetch(PDO::FETCH_OBJ);

    return $data;
}

function writeUser($bdd,$data) {
    $request = $bdd->prepare('INSERT INTO users(pseudo,email,`password`) VALUES ('.$data->pseudo.','.$data->email.','.$data->password.')');

    $request->execute();
}