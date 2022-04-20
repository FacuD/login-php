<?php
include_once 'conexion.php';

// Iniciamos la sesión
session_start();

// Capturamos los datos del formulario
$usuario = $_POST['nombre'];
$password = $_POST['password'];

// Controlamos que el usuario exista en la base de datos
$sql_usuario = "SELECT * FROM usuarios WHERE usuario = ?";
$sentencia_usuario = $conexion->prepare($sql_usuario);
$sentencia_usuario->execute(array($usuario));
$usuarioExistente = $sentencia_usuario->fetch();
if (!$usuarioExistente) {
    echo '<script>alert("No existe ningun usuario llamado ' . $usuario . '");</script>';
    echo '<script>window.location="login.php";</script>';
    die();
}

// Controlamos que la contraseña sea correcta
if (password_verify($password, $usuarioExistente['pass'])) {
    $_SESSION['usuario'] = $usuario;
    header('Location: zona_restringida.php');
} else {
    echo '<script>alert("Contraseña incorrecta");</script>';
    echo '<script>window.location="login.php";</script>';
}
