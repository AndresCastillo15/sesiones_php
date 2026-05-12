<?php
/* 1. CONFIGURACIÓN Y SEGURIDAD: Siempre al principio del archivo [3, 4] */
ini_set('session.use_strict_mode', 1);
ini_set('session.cookie_httponly', 1);
session_start();

/* 2. LÓGICA DE CIERRE DE SESIÓN: Si el usuario pulsa un enlace "logout" [5, 6] */
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    $_SESSION = array(); // Limpia la matriz [5, 7]
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"]);
    }
    session_destroy(); // Destruye la sesión en el servidor [6, 7]
    header("Location: index.php"); // Recarga el archivo para mostrar el login
    exit();
}

/* 3. LÓGICA DE LOGIN: Si el usuario envía el formulario [5] */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['usuario'];
    session_regenerate_id(true); // Medida crucial contra robo de sesión [5, 8]
    
    if ($user === 'admin') {
        $_SESSION['usuario'] = 'Administrador';
        $_SESSION['rol'] = 'admin';
    } else {
        $_SESSION['usuario'] = $user;
        $_SESSION['rol'] = 'usuario';
    }
    // No redirigimos a otro archivo, solo dejamos que el script siga
}

/* 4. LÓGICA DE VISUALIZACIÓN: ¿Qué mostramos ahora? [9, 10] */
?>

<!DOCTYPE html>
<html>
<head><title>Sistema de Sesión Único</title></head>
<body>

    <?php if (!isset($_SESSION['usuario'])): ?>
        <!-- ESTADO: NO LOGUEADO - Mostramos el formulario de entrada -->
        <h2>Iniciar Sesión</h2>
        <form method="POST">
            <input type="text" name="usuario" placeholder="Escribe 'admin' o tu nombre" required>
            <button type="submit">Entrar</button>
        </form>

    <?php else: ?>
        <!-- ESTADO: LOGUEADO - Mostramos el panel según el rol [9, 11] -->
        <h2>Bienvenido, <?php echo $_SESSION['usuario']; ?></h2>
        <p>Tu rol actual es: <strong><?php echo $_SESSION['rol']; ?></strong></p>

        <?php if ($_SESSION['rol'] === 'admin'): ?>
            <div style="background: #eef; padding: 10px; border: 1px dashed blue;">
                <h3>Contenido Exclusivo para Admin</h3>
                <p>Aquí tienes herramientas que un usuario común no puede ver.</p>
            </div>
        <?php endif; ?>

        <p>Este es el contenido general para cualquier usuario registrado.</p>
        <a href="?action=logout">Cerrar Sesión</a>
    <?php endif; ?>

</body>
</html>