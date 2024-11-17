<?php
// Verifica si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Recolecta los datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];

    // Limpiar los datos para evitar inyecciones (esto es una medida básica de seguridad)
    $nombre = htmlspecialchars($nombre);
    $email = htmlspecialchars($email);
    $asunto = htmlspecialchars($asunto);
    $mensaje = htmlspecialchars($mensaje);

    // Dirección de tu correo electrónico
    $to = "saulcartel12@gmail.com"; // Sustituye esto por tu correo

    // Asunto del correo
    $subject = "Nuevo mensaje desde tu sitio web: $asunto";

    // El cuerpo del mensaje
    $body = "Tienes un nuevo mensaje de tu formulario de contacto.\n\n";
    $body .= "Nombre: $nombre\n";
    $body .= "Correo electrónico: $email\n";
    $body .= "Asunto: $asunto\n\n";
    $body .= "Mensaje:\n$mensaje";

    // Encabezados del correo
    $headers = "From: $email"; // El correo que envió el mensaje

    // Usar la función mail() para enviar el correo
    if (mail($to, $subject, $body, $headers)) {
        echo "Gracias por tu mensaje, nos pondremos en contacto contigo pronto.";
    } else {
        echo "Hubo un problema al enviar tu mensaje. Intenta nuevamente más tarde.";
    }
} else {
    echo "No se recibió el formulario.";
}
?>
