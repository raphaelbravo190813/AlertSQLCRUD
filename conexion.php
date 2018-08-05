<?php
//mysql://b8caa550b64755:f960ea56@us-cdbr-iron-east-01.cleardb.net/heroku_a8d7a1f48b1e0d7?reconnect=true
$link = "mysql:host=us-cdbr-iron-east-01.cleardb.net;dbname=heroku_a8d7a1f48b1e0d7";
$usuario="b8caa550b64755";
$pass="f960ea56";
try{
    $pdo = new PDO($link,$usuario,$pass);
    echo "Estado: Conectado </br>";
}catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}