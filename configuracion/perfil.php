<?php
require 'config.php';

// Comprobar si el usuario está autenticado [14, 15]
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

echo "Bienvenido, " . $_SESSION['usuario']; // Acceso a la variable compartida [16, 17]
echo "<br><a href='logout.php'>Cerrar sesión</a>";