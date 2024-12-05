<?php
session_start();
require("../../../Conexion/conexion.php"); // Importa la conexión correctamente
require '../../../Librerias/PHPMailer/src/PHPMailer.php';
require '../../../Librerias/PHPMailer/src/SMTP.php';
require '../../../Librerias/PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Verificar si el usuario está autenticado
if (!isset($_SESSION['documento'])) {
    echo "Error: Usuario no autenticado.";
    exit();
}

// Obtener los datos del archivo descargado
$archivo = $_GET['archivo'] ?? '';

if ($archivo && file_exists("../../../subidas/$archivo")) {
    $documento = $_SESSION['documento'];
    $fecha = date("Y-m-d H:i:s");

    // Obtener el nombre del usuario desde la base de datos
    $stmt = $conexion->prepare("SELECT nombre FROM usuarios WHERE documento = ?");
    $stmt->bind_param("s", $documento);
    $stmt->execute();
    $result = $stmt->get_result();
    $nombreUsuario = "Usuario desconocido";

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nombreUsuario = $row['nombre'];
    }
    $stmt->close();

    // Enviar el correo
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'victorjrodriguezp8@gmail.com'; // Cambia este correo
        $mail->Password = 'mkli ahmx dknj pram';          // Cambia la contraseña
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('victorjrodriguezp8@gmail.com', 'Notificaciones del Sistema');
        $mail->addAddress('william_saavedra@yahoo.com'); // Correo fijo para notificaciones

        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8'; // Soporte para tildes y caracteres especiales
        $mail->Subject = 'Archivo descargado - Notificación';

        // Cuerpo del correo
        $mail->Body = "
        <div style='font-family: Arial, sans-serif; line-height: 1.6;'>
            <h2 style='color: #4CAF50;'>Notificación de Descarga de Archivo</h2>
            <p><strong>Nombre del Usuario:</strong> $nombreUsuario</p>
            <p><strong>Documento:</strong> $documento</p>
            <p><strong>Nombre del Archivo:</strong> $archivo</p>
            <p><strong>Fecha de la Descarga:</strong> $fecha</p>
            <hr>
            <p style='color: #888;'>Este es un mensaje generado automáticamente por el sistema.</p>
        </div>";

        $mail->AltBody = "Nombre del Usuario: $nombreUsuario\nDocumento: $documento\nArchivo: $archivo\nFecha: $fecha";

        $mail->send();
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
        exit();
    }

    // Forzar la descarga del archivo
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($archivo) . '"');
    header('Content-Length: ' . filesize("../../../subidas/$archivo"));
    readfile("../../../subidas/$archivo");
    exit();
} else {
    echo "Archivo no encontrado.";
    exit();
}
?>
