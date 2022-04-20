<?php
include_once 'conexion.php';

// Capturamos los datos del formulario
$usuario = $_POST['nombre'];

// Controlamos que el usuario no exista previamente en la base de datos
$sql_usuario = "SELECT * FROM usuarios WHERE usuario = ?";
$sentencia_usuario = $conexion->prepare($sql_usuario);
$sentencia_usuario->execute(array($usuario));
$usuarioExistente = $sentencia_usuario->fetch();
if ($usuarioExistente) {
    echo '<script>alert("El nombre de usuario que intenta registrar ya existe");</script>';
    echo '<script>window.location="registro.php";</script>';
    die();
}

// Encriptación de la contraseña
$hashedPass = password_hash($_POST['password'], PASSWORD_DEFAULT);
$pass2 = $_POST['password2'];

// Verificamos que las contraseñas sean iguales
if (password_verify($pass2, $hashedPass)) {
    $sql = "INSERT INTO usuarios (usuario, pass) VALUES (?, ?)";
    $sentencia = $conexion->prepare($sql);
    $sentencia->execute(array($usuario, $hashedPass));
    if ($sentencia) {
        header('Location: registro_exitoso.php');
    } else {
        echo 'Error al registrar usuario';
        die();
    }
    // Liberar recursos
    $sentencia = null;
    $conexion = null;
} else {
    echo '<script>alert("Las contraseñas no coinciden");</script>';
    echo '<script>window.location="registro.php";</script>';
}
