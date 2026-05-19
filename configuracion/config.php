<?php
// Configuraciones de seguridad recomendadas antes de iniciar la sesión [3, 4]
ini_set('session.use_strict_mode', 1);      // Solo acepta IDs de sesión generados por el servidor
ini_set('session.cookie_httponly', 1);     // Evita que JavaScript acceda a la cookie de sesión
ini_set('session.cookie_samesite', 'Lax');  // Mitiga ataques CSRF
ini_set('session.cache_limiter', 'nocache'); // Evita que páginas privadas se guarden en el caché [5]

if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    ini_set('session.cookie_secure', 1);    // Solo envía cookies a través de HTTPS [3]
}

// Iniciar o reanudar la sesión. Debe ir antes de cualquier salida HTML [6, 7]
session_start();
