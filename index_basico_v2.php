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

            // Configuración del remitente y destinatario
            $mail->setFrom('tu_correo@gmail.com', 'Tu Nombre'); // Remitente
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
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar Correo</title>
    <!-- Agregar Tailwind CSS desde CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="w-full max-w-lg bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-4">Enviar Correo</h2>
        
        <?php if (isset($msg)): ?>
            <p class="text-center text-sm text-red-500 mb-4"><?php echo $msg; ?></p>
        <?php endif; ?>
        
        <form action="" method="POST" class="space-y-4">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Correo del Destinatario:</label>
                <input type="email" id="email" name="email" required 
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label for="subject" class="block text-sm font-medium text-gray-700">Asunto:</label>
                <input type="text" id="subject" name="subject" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label for="message" class="block text-sm font-medium text-gray-700">Mensaje:</label>
                <textarea id="message" name="message" rows="4" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"></textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Enviar Correo
                </button>
            </div>
        </form>
    </div>
</body>
</html>
