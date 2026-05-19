<?php
// Simulación de base de datos
function obtenerTareas() {
    return [
        ['id' => 1, 'titulo' => 'Aprender PHP básico'],
        ['id' => 2, 'titulo' => 'Entender MVC funcional'],
        ['id' => 3, 'titulo' => 'Hacer ejercicio']
    ];
}

function filtrarTareasPorLetra($tareas, $letra) {
    return array_filter($tareas, function($tarea) use ($letra) {
        return stripos($tarea['titulo'], $letra) === 0;
    });
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Tareas (MVC Funcional)</title>
</head>
<body>
    <h1>Mis Tareas Pendientes</h1>
    
    <ul>
        <?php foreach ($lista as $tarea): ?>
            <li><?php echo $tarea['titulo']; ?></li>
        <?php endforeach; ?>
    </ul>

    <p><em>Generado dinámicamente mediante el Controlador.</em></p>
</body>
</html>

<?php
require_once 'modelo.php';

function mostrarListado() {
    // 1. Pedir datos al modelo
    $lista = obtenerTareas();
    
    // 2. Cargar la vista (la vista usará la variable $lista)
    include 'vista.php';
}
?>