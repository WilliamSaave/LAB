<?php
session_start();
require("../../../Conexion/conexion.php"); // Usar la conexión mysqli

if (!isset($_SESSION['documento'])) {
    echo "No se ha establecido el documento en la sesión.";
    exit;
}

$documento = $_SESSION['documento'];

// Verificar si se ha subido un archivo
if (!isset($_FILES['file']) || $_FILES['file']['error'] != UPLOAD_ERR_OK) {
    echo "Error al subir el archivo.";
    exit;
}

$fichero = $_FILES['file'];
$nombre_temporal = $fichero['tmp_name'];

try {
    // Consulta para obtener el documento correspondiente
    $sql = "SELECT documento FROM usuarios WHERE documento = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $documento);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_data = $result->fetch_assoc();

    if ($user_data) {
        // Usar el valor de `documento` como nombre del archivo
        $nombre_archivo = $user_data['documento'] . '.' . pathinfo($fichero['name'], PATHINFO_EXTENSION);
        $ruta_destino = "../../../subidas/" . $nombre_archivo;

        // Mueve el archivo a la carpeta "subidas" y reemplaza si ya existe
        if (move_uploaded_file($nombre_temporal, $ruta_destino)) {
            echo "El archivo se ha subido y renombrado correctamente.";
        } else {
            echo "Error al mover el archivo.";
        }
    } else {
        echo "No se encontró el documento en la base de datos.";
    }

    $stmt->close();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

$conexion->close();

// Redirigir hacia la página anterior
header("Location: " . $_SERVER["HTTP_REFERER"]);
exit;
?>
