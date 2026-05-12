# Sesiones_php

## ¿Qué son las sesiones en php?
Las sesiones en PHP son una forma de almacenar información del usuario en el servidor para que esté disponible en múltiples páginas de un sitio web.

A diferencia de las variables normales, que se "borran" en cuanto la página termina de cargarse, las sesiones permiten que el servidor "recuerde" quién eres mientras navegas.

## Las sesiones se usan principalmente para:
- Sistemas de Login: Mantener al usuario identificado sin pedirle la contraseña en cada clic.
- Carritos de compra: Guardar los productos seleccionados.
- Preferencias: Recordar el idioma o el tema (oscuro/claro) elegido por el usuario.
- Seguridad: Pasar datos sensibles entre páginas sin exponerlos en la URL.

## ¿Cómo funcionan técnicamente?
Cuando inicias una sesión, PHP genera un ID único (un código largo y aleatorio).
1. El servidor guarda ese ID en una cookie en el navegador del usuario.
2. Los datos reales (nombre, carrito, etc.) se quedan guardados de forma segura en el servidor.
3. Cada vez que el usuario pide una página nueva, envía su ID, y PHP recupera sus datos.

## Dato importante: 
Las sesiones son mucho más seguras que las Cookies tradicionales porque la información importante nunca viaja por internet; solo viaja el "ID" de la sesión. El contenido real está bajo llave en tu servidor.