<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Asegúrate de haber instalado PHPMailer con Composer antes: composer require phpmailer/phpmailer
require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    if (!empty($email) && !empty($subject) && !empty($message)) {
        $mail = new PHPMailer(true);

        try {
            // Configuración del servidor SMTP
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io'; // Cambia esto si usas otro proveedor SMTP
            $mail->SMTPAuth = true;
            $mail->Username = '7e6f3024d46189'; // Tu correo electrónico
            $mail->Password = 'fa95265037ee7c'; // Tu contraseña de correo
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 2525;

            // Configuración del remitente y destinatario
            $mail->setFrom('test@demomailtrap.com', 'Royer'); // Remitente
            $mail->addAddress($email); // Destinatario

            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = nl2br(htmlspecialchars($message));

            // Enviar correo
            $mail->send();
            $msg = "Correo enviado exitosamente a $email.";
        } catch (Exception $e) {
            $msg = "El correo no pudo ser enviado. Error: {$mail->ErrorInfo}";
        }
    } else {
        $msg = "Todos los campos son obligatorios.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar Correo</title>
</head>
<body>
    <h2>Enviar Correo</h2>
    <?php if (isset($msg)) echo "<p>$msg</p>"; ?>
    <form action="" method="POST">
        <label for="email">Correo del Destinatario:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="subject">Asunto:</label>
        <input type="text" id="subject" name="subject" required><br><br>
        
        <label for="message">Mensaje:</label><br>
        <textarea id="message" name="message" rows="5" required></textarea><br><br>
        
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
