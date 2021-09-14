<?php 
    
    $destino = 'artinfo@valecalabrese.com';
    $name = $_POST['nombre'];
    $email = $_POST['email'];
    $service = $_POST['asunto'];
    $message = $_POST['msje'];

    $contet = "Nombre: " . $name . "\nEmail: " . $email . "\nConsulta sobre una: " . $service . "\nMensaje: " . $message; 

    mail($destino,'Consulta de la WEB', $contet);
    header("Location:https://valecalabrese.com/index.html");

?>