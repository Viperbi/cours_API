<?php

function readUser($bdd) {
    $request = $bdd->prepare('SELECT pseudo,email,`password`,id FROM users');

    $request->execute();

    $data = $request->fetchAll(PDO::FETCH_ASSOC);

    return $data;
}

function writeUser($bdd,$data) {
    $request = $bdd->prepare('INSERT INTO users(pseudo,email,`password`) VALUES (?,?,?)');

    $request->bindValue(1, $data->pseudo, PDO::PARAM_STR);
    $request->bindValue(2, $data->email, PDO::PARAM_STR);
    $request->bindValue(3, $data->password, PDO::PARAM_STR);

    $request->execute();
}