<?php

//Conexion
$servidor = 'localhost';
$usuario = 'root';
$password = '';
$database = 'proyecto_blog';
$db = mysqli_connect($servidor, $usuario, $password,$database);

mysqli_query($db, "SET NAMES 'utf8'");

//Iniciar una sesion
if (!isset($_SESSION)) {
    session_start();
}
