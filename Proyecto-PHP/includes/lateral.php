
<?php require_once 'includes/helpers.php'; ?>

<aside  id="sidebar">
    <?php if(isset($_SESSION['usuario'])):?>
    <div id="usuario-logueado" class="bloque">
        <h3>Bienvenido,<?=$_SESSION['usuario']['nombre'].''.$_SESSION['usuario']['apellidos'] ?></h3>
        <!--Botones-->
        <a href="" class="boton boton-verde">Crear entradas</a>
        <a href="" class="boton boton-azul">Crear categorias</a>
        <a href="" class="boton boton-naranja">Mis datos</a>
        <a href="cerrar.php" class="boton boton-rojo">Cerrar sesion</a>
        <!--?php var_dump($_SESSION['usuario']); ?-->
    </div>
    <?php endif; ?>
            <div id="login" class="bloque">
                <h3>Identificate*</h3>
            <?php if(isset($_SESSION['error_login'])):?>
            <div class="alerta alerta-error">
               <?= $_SESSION['error_login'];?>
            </div>
            <?php endif; ?>
                <form action="login.php" method="POST">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email">

                    <label for="password">Contrasena</label>
                    <input type="password" name="password" id="password"> 

                    <input type="submit" value="Entrar">
                </form>
            </div>


            <div id="register" class="bloque">

            <h3>Registrate</h3>
    <?php 
    if(isset($_SESSION['completado'])): ?>
    <div class="alerta alerta-exito">
        <?=$_SESSION['completado']?>
    </div>
    <?php elseif(isset($_SESSION['errores']['general'])): ?>
    <div class="alerta alerta-error">
        <?=$_SESSION['errores']['general']?>
    </div>
    <?php endif; ?>

    <form action="registro.php" method="post">
        <label for="nombres">Nombre</label>
        <input type="text" name="nombres">
        
        <?php echo isset($_SESSION['errores']) && is_array($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombres') : ''; ?>    
        
        <label for="apellidos">Apellido</label>
        <input type="text" name="apellidos">
        
        <?php echo isset($_SESSION['errores']) && is_array($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>
        
        <label for="email">Email</label>
        <input type="email" name="email">
        
        <?php echo isset($_SESSION['errores']) && is_array($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>
        
        <label for="password">Contraseña</label>
        <input type="password" name="password"> 
        
        <?php echo isset($_SESSION['errores']) && is_array($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : ''; ?>
        
        <input type="submit" name="submit" value="Registrarse">
    </form>
    <?php borrarErrores(); ?>

            </div> 
        </aside>
