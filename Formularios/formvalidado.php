<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Validar Formularios en PHP</h1>
    <?php
    if(isset($_GET['error'])){
        $error = $_GET['error'];
        if($error =='faltan_valores'){
            echo '<strong style="color:red">Introduce todos los datos en todos los campos del formulario </strong>';
        }
        if($error =='nombre'){
            echo '<strong style="color:red">Introduce el nobmre correctamente  </strong>';
        }
        if($error =='Apellido'){
            echo '<strong style="color:red">Introduce el Apellido correctamente </strong>';
        }
        if($error =='Edad'){
            echo '<strong style="color:red">Introduce la Edad correctamente </strong>';
        }
        if($error =='Email'){
            echo '<strong style="color:red">Introduce el email correctamente </strong>';
        }
        if($error =='password'){
            echo '<strong style="color:red">Introduce un Password con mas de 5 caracteres </strong>';
        }
    }
    ?>
    <form action="procesar_form.php" method="POST">
        <label for="nombre">Nombre</label> <br>
        <input type="text" name="nombre"  required  pattern="[A-Za-z]">
        <br>
        <label for="nombre">Apellido</label> <br>
        <input type="text" name="Apellido"  required  pattern="[A-Za-z]">
        <br>
        <label for="nombre">Edad</label> <br>
        <input type="number" name="Edad" required pattern="[0-9]">
        <br>
        <label for="nombre">Email</label>  <br>
        <input type="email" name="Email" required >
        <br>
        <label for="nombre">Contrasena</label>  <br>
        <input type="password" name="password" required> <br>
        <br> 
        <input type="submit" value="Enviar">
    </form>
    
</body>
</html>

<!--required="required" pattern="[A-Za-z"
----required="required" pattern="[0-9]+"-->

