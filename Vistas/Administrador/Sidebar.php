<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/sidebar.css">
  
    <title>Sidebar</title>
</head>
<body>
<div class="sidebar-container">
    <div class="sidebar">
        <div class="logo">
            <a href="/Visitas/Vistas\Administrador\Sidebar.php">
                <img src="/Visitas/Imagenes/logoSena1.png" alt="Logo">
            </a>
        </div>
        <div class="menu">
            <button class="menu-btn">
                <img src="/Visitas/Imagenes/iconos/icon_usuario.svg" alt="Usuario Icono">
                Usuarios
            </button>
            <div class="submenu">
                <a href="/Visitas/Vistas\Administrador\Usuarios\Ver_usuario.php">Ver</a>
                <a href="/Visitas/Vistas\Administrador\Usuarios\Crear_usuario.php">Crear</a>
            </div>

            <button class="menu-btn">
                <img src="/Visitas/Imagenes/iconos/icon_instructor.svg" alt="Opción 2 Icono">
            

            <button class="menu-btn">
                <img src="/Visitas/Imagenes/iconos/icon_empresas.svg" alt="Opción 5 Icono">
                Empresas
            </button>
            <div class="submenu">
            <a href="/Visitas/Vistas\Administrador\Empresas\Ver_empresa.php">Ver</a>
            <a href="/Visitas/Vistas\Administrador\Empresas\Crear_empresa.php">Crear</a>
            </div>

            <button class="menu-btn">
                <img src="/Visitas/Imagenes/iconos/icon_Fichas.svg" alt="Opción 6 Icono">
        

            <button class="menu-btn">
                <img src="/Visitas/Imagenes/iconos/icon_pqr.svg" alt="Opción 7 Icono">
                PQR
            </button>
            <div class="submenu">
                <a href="#">Ver</a>
                <a href="#">Crear</a>
            </div>
        </div>
    </div>
</div>

    <script src="../../Js/sidebar.js"></script>
</body>
</html>
