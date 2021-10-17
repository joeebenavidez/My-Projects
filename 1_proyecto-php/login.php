<?php

//Iniciar la sesion y la conexion a db
require_once 'includes/conexion.php';

//Recoger datos del formularios
if (isset($_POST)) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    //Comprobar las credenciales del usuario
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $login = mysqli_query($db, $sql);
    
    if ($login && mysqli_num_rows($login) == 1) {
        $usuario = mysqli_fetch_assoc($login);
        
        // Comprobar la password / cifrarla
        $verify = password_verify($password, $usuario['password']);
        if ($verify) {
            //Utilizar sesion para guardar los datos del user logeado
            $_SESSION['usuario'] = $usuario;
            if (isset($_SESSION['error_login'])) {
                session_unset($_SESSION['error_login']);
            }
        } else {
            //Si algo fallo, enviar sesion con el fallo
            $_SESSION['error_login'] = "Login incorrecto";
        }
    } else {
       $_SESSION['error_login'] = "Login incorrecto"; 
    }
    
}

//Redireccion al index
header('Location: index.php');