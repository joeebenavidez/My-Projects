<?php 
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['msje'];
    $para = 'info@ahsi.com.ar';
    $titulo = $_POS['asunto'];
    $header = 'From: ' . $email;


    $msjCorreo = "Nombre: $nombre\n E-Mail: $email\n Mensaje:\n $mensaje";
  
    if ($_POST['submit']) {
        if (mail($para, $titulo, $msjCorreo, $header)) {
            echo "<script language='javascript'> 
                    alert('Mensaje enviado, muchas gracias.');
                    window.location.href = 'https://ahsi.com.ar';
                </script>";
        } else {
            echo 'Falló el envio';
        }
    }
?>
