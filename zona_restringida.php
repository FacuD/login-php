<?php
session_start();

// Controlar que hay una sesion abierta
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zona Restringida</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <!-- Mensaje de bienvenido a usuario -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1 class="text-center display-1">Bienvenido/a <?php echo $_SESSION['usuario']; ?></h1>
                <div class="text-center">
                    <a href="logout.php" class="btn btn-primary mt-2">Cerrar sesión</a>
                </div>
            </div>
        </div>
</body>

</html>