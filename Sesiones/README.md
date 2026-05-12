# Sistema de Gestión de Sesiones en PHP (Single File)

Este proyecto es un ejemplo práctico de cómo gestionar sesiones en PHP de forma segura utilizando un único punto de entrada. Permite diferenciar entre usuarios con rol de Administrador y Usuario común, aplicando las mejores prácticas de seguridad para proteger la integridad de los datos.

## Características
- **Arquitectura de un solo archivo:** Gestiona el inicio de sesión, el panel de control y el cierre de sesión en un mismo script.
- **Control de Acceso (RBAC):** Implementa lógica condicional para mostrar contenido exclusivo según el rol almacenado en la sesión.
- **Seguridad Optimizada:** Configuración de directivas INI para mitigar ataques comunes.
- **Persistencia de Datos:** Uso de la superglobal `$_SESSION` para mantener información entre peticiones sin que los datos salgan del servidor.

## Medidas de Seguridad Implementadas
Para garantizar que las sesiones sean robustas, el código incluye:

1. **Protección contra Session Fixation:** Se utiliza `session_regenerate_id(true)` al momento del login para invalidar el identificador anterior y asignar uno nuevo.
2. **Configuración de Cookies Seguras:**
   - `session.use_strict_mode`: Evita que el servidor acepte identificadores de sesión no generados por él mismo.
   - `cookie_httponly`: Impide que scripts maliciosos (JavaScript) accedan a la cookie de sesión.
   - `cookie_samesite`: Configurado en `Lax` para mitigar ataques de falsificación de peticiones en sitios cruzados (CSRF).
3. **Cierre de Sesión Completo:** No solo se llama a `session_destroy()`, sino que se limpia la matriz `$_SESSION` y se elimina físicamente la cookie del navegador.
4. **Prevención de Caché:** Se asegura que el contenido privado no sea almacenado en proxies intermedios o en el navegador tras cerrar sesión.

## Requisitos
- Servidor web (Apache/Nginx) con PHP 7.4 o superior.
- Entorno local como XAMPP, WAMP o Laragon.

## Instalación y Uso
1. Copia el código del archivo en un documento llamado `index.php`.
2. Coloca el archivo en tu carpeta de servidor local (ej. `htdocs` en XAMPP o `www` en WAMP).
3. Accede desde tu navegador a: `http://localhost/nombre_de_tu_carpeta/index.php`.
4. **Prueba de Roles:**
   - Escribe "admin" para acceder a las funciones de administrador.
   - Escribe tu nombre para entrar como un usuario estándar.

## Conceptos Clave
- **`$_SESSION`**: Array asociativo superglobal disponible en todos los contextos del script.
- **`session_start()`**: Función obligatoria para iniciar la sesión; debe llamarse antes de cualquier salida de texto al navegador.
- **Almacenamiento**: Por defecto, PHP guarda los datos en el servidor (usualmente en archivos de texto plano), mientras que el cliente solo guarda un "ticket" o ID.