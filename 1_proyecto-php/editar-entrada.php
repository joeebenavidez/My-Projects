<?php require_once 'includes/redireccion.php';
//unicamente si estas logueado se puede ver esta seccion?>
<?php require_once 'includes/conexion.php'; ?>
<?php require_once 'includes/helpers.php'; ?>
<?php
    $entrada_actual = conseguirEntrada($db, $_GET['id']);
    if(!isset($entrada_actual['id'])){
        header('Location: index.php');
    }
?>

<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?> 
<!--CAJA PRINCIPAL -->
<div id="principal">
    <h1>Editar la Reseña</h1>
    <p>
        Edita la reseña: <strong><?=$entrada_actual['titulo']?></strong>
    </p>
    <br/>
    <form action="guardar-entrada.php?editar=<?=$entrada_actual['id']?>" method="POST" enctype="multipart/form-data">
        <label for="titulo">Titulo: </label>
        <input type="text" name="titulo" value="<?=$entrada_actual['titulo']?>" />
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : ''; ?>
        <label for="descripcion">Descripción: </label>
        <textarea name="descripcion"><?=$entrada_actual['descripcion']?></textarea>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : ''; ?>
        <label for="categoria">Categoria</label>
        <select name="categoria">
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'categoria') : ''; ?>    
            <?php 
                $categorias = conseguirCategorias($db);
                if(!empty($categorias)):
                while ($categoria = mysqli_fetch_assoc($categorias)):
            ?>
                <option value="<?=$categoria['id']?>" <?=($categoria['id'] == $entrada_actual['categoria_id']) ? 'selected = selected' : ''?>>
                    <?=$categoria['nombre']?>
                </option>
            <?php endwhile; endif; ?>
        </select>
        
        <input type="submit" value="Guardar cambios">
    </form>
    <?php borrarErrores(); ?> 

</div><!-- Fin principal -->              
<?php require_once 'includes/pie.php'; ?>