<?php require_once 'includes/redireccion.php';?>
<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?> 


<!--CAJA PRINCIPAL -->
<div id="principal">
    <h1>Crear Reseñas</h1>
    <p>Añade nuevas reseñas al blog, para que los usuarios puedan leerlas
    </p>
    <br/>
    <form action="guardar-entrada.php" method="POST" enctype="multipart/form-data">
        <label for="titulo">Titulo: </label>
        <input type="text" name="titulo" />
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : ''; ?>
        <label for="descripcion">Descripción: </label>
        <textarea name="descripcion"></textarea>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : ''; ?>
        <label for="categoria">Categoria</label>
        <select name="categoria">
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'categoria') : ''; ?>    
            <?php 
                $categorias = conseguirCategorias($db);
                if(!empty($categorias)):
                while ($categoria = mysqli_fetch_assoc($categorias)):
            ?>
                <option value="<?=$categoria['id']?>">
                    <?=$categoria['nombre']?>
                </option>
            <?php endwhile; endif; ?>
        </select>
        
        <input type="submit" value="Crear Reseña">
    </form>
    <?php borrarErrores(); ?> 
    
    
    
</div><!-- Fin principal -->
<?php require_once 'includes/pie.php'; ?>    