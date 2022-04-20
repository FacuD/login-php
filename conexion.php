<?php
require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$link = $_ENV['LINK'];
$usuario = $_ENV['USER'];
$pass = $_ENV['PASS'];

try {
    $conexion = new PDO($link, $usuario, $pass);
    // echo 'Conexion exitosa a la BDD! <br>';
} catch (PDOException $e) {
    print 'Error: ' . $e->getMessage() . '<br/>';
    die();
}
