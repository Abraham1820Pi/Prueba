<?php
phpinfo();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST["message"]);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Correo inválido.";
        exit;
    }

    $to = "abrahamcamilo2018@gmail.com";  // Cambia esto por tu correo
    $subject = "Mensaje de Contacto de $name";
    $body = "Nombre: $name\nCorreo: $email\n\nMensaje:\n$message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "Mensaje enviado con éxito.";
    } else {
        echo "Error al enviar el mensaje.";
    }
} else {
    echo "Acceso no permitido.";
}
?>
