<?php 

    $destino = 'info@jbit.com.ar';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $contet = "Nombre: " . $name . "\nEmail: " . $email . "\nConsulta sobre una: " . $subject . "\nMensaje: " . $message; 

    mail($destino,'Consulta WEB', $contet);
    header("Location:https://jbit.com.ar/");

?>