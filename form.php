<?php
// Configuración del correo
$destinatario = "tucorreo@tudominio.com"; // <-- Reemplazá esto por tu email real
$asunto = "Nuevo mensaje desde la landing page";

// Capturar los datos del formulario
$nombre = htmlspecialchars($_POST["nombre"] ?? '');
$email = filter_var($_POST["email"] ?? '', FILTER_SANITIZE_EMAIL);
$mensaje = htmlspecialchars($_POST["mensaje"] ?? '');

// Validar campos obligatorios
if (empty($nombre) || empty($email) || empty($mensaje)) {
  die("Por favor completá todos los campos obligatorios.");
}

// Componer el cuerpo del mensaje
$contenido = "Nombre: $nombre\n";
$contenido .= "Email: $email\n";
$contenido .= "Mensaje:\n$mensaje\n";

// Cabeceras del correo
$headers = "From: $nombre <$email>\r\n";
$headers .= "Reply-To: $email\r\n";

// Enviar el correo
$enviado = mail($destinatario, $asunto, $contenido, $headers);

// Respuesta al usuario
if ($enviado) {
  echo "¡Gracias! Tu mensaje fue enviado con éxito.";
} else {
  echo "Hubo un error al enviar tu mensaje. Intentá nuevamente más tarde.";
}
?>
