<?php require_once 'includes/redireccion.php';?>
<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?> 


<!--CAJA PRINCIPAL -->
<div id="principal">
    <h1>Modificar Mis Datos</h1>
    <br/>
    <!<!-- Mostrar errores -->
        <?php if(isset($_SESSION['completado'])): ?>
            <div class="alerta alerta-exito"> 
                <?= $_SESSION['completado']; ?>
            </div>    
        <?php elseif(isset($_SESSION['errores']['general'])): ?>
            <div class="alerta alerta-error"> 
                <?= $_SESSION['errores']['general']; ?>
            </div>
        <?php endif; ?>
    <form action="actualizar-usuario.php" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" value="<?=$_SESSION['usuario']['nombre'];?>"/>
        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>
        <label for="apellidos">Descripción: </label>
        <input type="text" name="apellidos" value="<?=$_SESSION['usuario']['apellidos'];?>"/>
        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>
        <label for="email">Correo Electronico: </label>
        <input type="email" name="email" value="<?=$_SESSION['usuario']['email'];?>"/>
        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?> 
        
        
        <input type="submit" name="submit" value="Actualizar Datos">
    </form>
    <?php borrarErrores(); ?> 
</div><!-- Fin principal -->
<?php require_once 'includes/pie.php'; ?>  