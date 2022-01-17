<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/src/PHPMailer.php';/* Sacar mediante Try */
require 'PHPMailer/src/SMTP.php';
require 'PHPMAILER/src/Exception.php';


$mail = new PHPMailer();

//Luego tenemos que iniciar la validación por SMTP:
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = "smtp.jbit.com.ar"; // SMTP a utilizar. Por ej. smtp.elserver.com
$mail->Username = "info@jbit.com.ar"; // Correo completo a utilizar
$mail->Password = "Glock-123"; // Contraseña
$mail->SMTPSecure = "tls"; // Habilitar encriptación
$mail->Port = 587; // Puerto a utilizar

var_dump($mail);

//Con estas pocas líneas iniciamos una conexión con el SMTP. Lo que ahora deberíamos hacer, es configurar el mensaje a
$mail->From = "info@jbit.com.ar"; // Desde donde enviamos (Para mostrar)
$mail->FromName = "info@jbit.com.ar";

//Estas dos líneas, cumplirían la función de encabezado (En mail() usado de esta forma: "From: Nombre
$mail->AddAddress("info@jbit.com.ar"); // Esta es la dirección a donde enviamos
$mail->IsHTML(true); // El correo se envía como HTML
$mail->Subject = "Email enviado desde Web"; // Este es el titulo del email.
$body = "Correo de prueba<br />";
$mail->Body = $body; // Mensaje a enviar
$exito = $mail->Send(); // Envía el correo.

//También podríamos agregar simples verificaciones para saber si se envió:
if($exito){
echo 'El correo fue enviado correctamente.';
}else{
echo 'Hubo un inconveniente. Contacta a un administrador.';
}
?>