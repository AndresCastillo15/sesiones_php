<?php
require 'config.php';

// 1. Limpiar todas las variables de la matriz $_SESSION [20, 21]
session_unset(); 

// 2. Si se desea destruir completamente la sesión, se borra la cookie del navegador [19, 22]
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

// 3. Destruir los datos asociados a la sesión en el servidor [13, 21]
session_destroy();

header("Location: index.php");
exit();
