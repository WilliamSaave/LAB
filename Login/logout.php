<?php
session_start();

// Destruir todas las sesiones
session_unset();
session_destroy();

// Redirigir al usuario al formulario de inicio de sesión
header("Location: index.html");
exit();
