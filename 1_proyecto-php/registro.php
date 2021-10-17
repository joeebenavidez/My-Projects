<?php

if (isset($_POST)) {
    
    //Conexion a la DB
    require_once 'includes/conexion.php';

    //Iniciar la sesion de arreglos
    if (!isset($_SESSION)) {
        session_start();
    }
    

    //Recoger los valores del registro
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $apellido = isset($_POST['apellido']) ?  mysqli_real_escape_string($db, $_POST['apellido']) : false;
    $email = isset($_POST['email']) ?  mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    $password = isset($_POST['password']) ?  mysqli_real_escape_string($db, $_POST['password']) : false;
    //var_dump($_POST);
    /*uso mysqli_real_escape_string para que cualquier caracter me lo tome como valido, 
    ya sean comillas o lo que sea, asi le damos seguridad al registro de mis datos.
    */
    
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
        $errores['apellido'] = "El apellido no es valido";
    }
    //Validacion del email
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_validado = true;
    } else {
        $email_validado = false;
        $errores['email'] = "Email invalidado";
    }
    //Validacion del password
    if (!empty($password)) {
        $password_valida = true;
    } else {
        $password_valida = false;
        $errores['password'] = "Debe ingresar una contraseña";
    }
    
    
    $guardar_usuario = false;
    if(count($errores) == 0) {
        $guardar_usuario = true;
        //Cifrar la contraseña
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]); //Encriptamos la contraseña
        
        //Insertar usuario en la DB, en su tabla correspondiente
        $sql = "INSERT INTO usuarios VALUES(null, '$nombre', '$apellido', '$email', '$password_segura', CURDATE());"; 
        $guardar = mysqli_query($db, $sql);
        
        if ($guardar) {
            $_SESSION['completado'] = "El registro se completo con éxito.";
        } else {
            $_SESSION['errores']['general'] = "Fallo al guardar el usuario.";
        }
        
        
        
    } else {
        //Creo la sesion para errores
        $_SESSION['errores'] = $errores;
    }
}


header('Location: index.php');


