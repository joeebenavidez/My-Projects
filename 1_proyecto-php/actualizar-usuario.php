<?php

if (isset($_POST)) {
    
    //Conexion a la DB
    require_once 'includes/conexion.php';


    //Recoger los valores del formulario de actualizacion
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $apellido = isset($_POST['apellidos']) ?  mysqli_real_escape_string($db, $_POST['apellidos']) : false;
    $email = isset($_POST['email']) ?  mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    
    //Array de errores
    $errores = array();
    
    //Validar datos antes de guardar en la DB
    //Validacion del nombre
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
        $nombre_validado = true;
    } else {
        $nombre_validado = false;
        $errores['nombre'] = "El nombre no es valido";
    }
    //Validacion del apellido
    if (!empty($apellido) && !is_numeric($apellido) && !preg_match("/[0-9]/", $apellido)) {
        $apellido_validado = true;
    } else {
        $apellido_validado = false;
        $errores['apellidos'] = "El apellido no es valido";
    }
    //Validacion del email
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_validado = true;
    } else {
        $email_validado = false;
        $errores['email'] = "Email invalidado";
    }
    
    
    $guardar_usuario = false;
    if(count($errores) == 0) {
        $guardar_usuario = true;
        
        //Comprobar si el email ya exite
        $sql = "SELECT id, email FROM usuarios WHERE email = '$email';";
        $isset_email = mysqli_query($db, $sql);
        $isset_user = mysqli_fetch_assoc($isset_email);
        
        if ($isset_user['id'] == $usuario['id'] || empty($isset_user)){
            //Actualizar usuario en la DB, en su tabla correspondiente
            $usuario = $_SESSION['usuario'];
            $sql = "UPDATE usuarios SET ".
                    "nombre = '$nombre', ".
                    "apellidos = '$apellido', ".
                    "email = '$email' ".
                    "WHERE id = ".$usuario['id']; 
            $guardar = mysqli_query($db, $sql);


            if ($guardar) {
                $_SESSION['usuario']['nombre'] = $nombre;
                $_SESSION['usuario']['apellidos'] = $apellido;
                $_SESSION['usuario']['email'] = $email;
                $_SESSION['completado'] = "Tus datos se actualizaron con éxito.";
            } else {
                $_SESSION['errores']['general'] = "Fallo al actualizar el usuario.";
            }
        } else {
            $_SESSION['errores']['general'] = "el usuario ya existe";
        }


        } else {
            //Creo la sesion para errores
            $_SESSION['errores'] = $errores;
        }
    
}


header('Location: mis-datos.php');