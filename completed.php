<?php
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendEmail($to, $subject, $body) {
    //Crear una instancia y pasar true para permitir las excepciones
    $mail = new PHPMailer(true);

    try {
        //Configuración del servidor
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;             //Habilitar los mensajes de depuración
        $mail->isSMTP();                                   //Enviar usando SMTP
        $mail->Host       = 'smtp.zoho.com';       //Configurar el servidor SMTP
        $mail->SMTPAuth   = true;                          //Habilitar autenticación SMTP
        $mail->Username   = 'angel@sounangel.site';            //Nombre de usuario SMTP
        $mail->Password   = '123456789.Asd';                      //Contraseña SMTP
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;   //Habilitar el cifrado TLS
        $mail->Port       = 465;                           //Puerto TCP al que conectarse; use 587 si configuró `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Emisor
        $mail->setFrom('angel@sounangel.site', 'Pago en Linea');

        //Destinatarios
        $mail->addAddress($to);     //Añadir un destinatario, el nombre es opcional

        //Nombre opcional
        $mail->isHTML(true);                         //Establecer el formato de correo electrónico en HTMl
        $mail->Subject = $subject;             
        $mail->Body    = $body;
        $mail->AltBody = strip_tags($body); //Cuerpo en texto sin formato para clientes de correo que no son HTML

        $mail->send();    //Enviar correo eletrónico
        return true; //Correo electrónico enviado con éxito
    } catch (Exception $e) {
        return false; //Error al enviar correo electrónico
    }
}

// Comprobar si se han recibido los parámetros POST
if(isset($_POST['to']) && isset($_POST['subject']) && isset($_POST['body'])) {
    $to = $_POST['to'];
    $subject = $_POST['subject'];
    $body = $_POST['body'];

    // Llamar a la función sendEmail
    if(sendEmail($to, $subject, $body)) {
        echo 'success';
    } else {
        echo 'error';
    }
}
?>
