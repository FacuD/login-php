<!-- Cerrar sesion -->
<?php
session_start();

// Destruir las variables de la sesión
$_SESSION = array();

// Borrando las cookies de la sesión
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Finalmente, destruir la sesión
session_destroy();
header('Location: login.php');
