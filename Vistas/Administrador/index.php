<?php
session_start();
require("../../Conexion/conexion.php");

// Verifica si el usuario ha iniciado sesión
if (isset($_SESSION['documento'])) { // Cambia a 'documento'
    $documento = $_SESSION['documento'];

    // Consulta para obtener datos del usuario
    $sql = "SELECT documento, nombre, correo, rol, activo FROM usuarios WHERE documento = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $documento);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();
    } else {
        $user_data = null;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../../css/sidebar.css">
    <link rel="stylesheet" href="../../../css/login.css">
    <script src="../../../Js/sidebar.js" defer></script>
    <title>Perfil del Usuario</title>
</head>
<body>
<?php include("../sidebar.php"); ?>
<div class="login-box">
    <h2>Perfil del Usuario</h2>

    <?php if ($user_data): ?>
        <p><strong>Documento:</strong> <?php echo htmlspecialchars($user_data['documento']); ?></p>
        <p><strong>Nombre:</strong> <?php echo htmlspecialchars($user_data['nombre']); ?></p>
        <p><strong>Correo:</strong> <?php echo htmlspecialchars($user_data['correo']); ?></p>
        <p><strong>Rol:</strong> <?php echo htmlspecialchars($user_data['rol']); ?></p>
        <p><strong>Estado Activo:</strong> <?php echo $user_data['activo'] ? 'Sí' : 'No'; ?></p>
    <?php else: ?>
        <p>No se encontraron datos del usuario.</p>
    <?php endif; ?>

    <a href="../../Login/logout.php" class="olvido">Cerrar sesión</a>
</div>

</body>
</html>
