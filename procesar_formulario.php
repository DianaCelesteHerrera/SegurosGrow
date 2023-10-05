<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["name"];
    $correo = $_POST["mail"];
    $celular = $_POST["mobile"];
    $mensaje = $_POST["message"];

    // Configura la dirección de correo a la que se enviará el formulario
    $destinatario = "dayanceles@gmail.com";

    // Asunto del correo electrónico
    $asunto = "Solicitud de capacitación para seguros";

    // Cuerpo del correo electrónico para el destinatario
    $cuerpoDestinatario = "Nombre: $nombre\n";
    $cuerpoDestinatario .= "Correo: $correo\n";
    $cuerpoDestinatario .= "Celular: $celular\n";
    $cuerpoDestinatario .= "Mensaje: $mensaje\n";

    // Encabezados del correo para el destinatario
    $encabezadosDestinatario = "From: $correo\r\n";
    $encabezadosDestinatario .= "Reply-To: $correo\r\n";

    // Envía el correo al destinatario
    mail($destinatario, $asunto, $cuerpoDestinatario, $encabezadosDestinatario);

    // Configura el correo de confirmación para el usuario
    $asuntoConfirmacion = "Gracias por tu solicitud de capacitación para seguros";
    $cuerpoConfirmacion = "Hola $nombre,\n\n";
    $cuerpoConfirmacion .= "Gracias por tu interés en nuestra capacitación para seguros. Hemos recibido tu solicitud y nos pondremos en contacto contigo pronto.\n\n";
    $cuerpoConfirmacion .= "Atentamente,Seguros Grow";

    // Envía el correo de confirmación al usuario
    mail($correo, $asuntoConfirmacion, $cuerpoConfirmacion);

    // Redirige al usuario a una página de confirmación
    header("Location: confirmacion.html");
} else {
    // Si no se ha enviado el formulario, muestra un mensaje de error o redirige a una página de error.
    echo "Ha ocurrido un error al procesar el formulario.";
}
?>

