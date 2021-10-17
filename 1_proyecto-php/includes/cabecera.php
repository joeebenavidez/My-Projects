<?php require_once 'conexion.php'; ?>
<?php require_once 'includes/helpers.php'; ?>
<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>Blog de Videojuegos</title>
        <link rel="stylesheet" href="recursos/assets/css/style.css"/>
    </head>
    <body>
        <!--CABECERA -->
        <header id="cabecera">
            <!<!-- LOGO -->
            <div id="logo">
                <a href="index.php">
                    Blog de videojuegos
                </a>
            </div>
            
            <!-- MENU -->
            <nav id="menu">
                <ul>
                    <li>
                        <a href="index.php">Inicio</a>
                    </li>
                    <?php 
                        $categorias = conseguirCategorias($db);
                        if(!empty($categorias)): ?>
                            
                    <?php    
                        while($categoria = mysqli_fetch_assoc($categorias)):
                    ?>
                        <li>
                            <a href="categoria.php?id=<?=$categoria['id']?>">
                            <?=$categoria['nombre'];?></a>
                        </li>
                    <?php endwhile; ?>
                        <li></li>
                    <?php endif;?>    
                    <li>
                        <a href="index.php">Sobre Mi</a>
                    </li>
                    <li>
                        <a href="index.php">Contacto</a>
                    </li>
                </ul>

            </nav>
        </header>
        <div id="contenedor">