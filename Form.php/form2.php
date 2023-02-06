<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario EN PHP</title>
</head>
<body>
    <h1>Formualario en PHP</h1>

    <form action="recibir-post.php" method="POST">
        <p>
            <label for="Nombre">Nombre</label>
            <input type="text" name="nombre" value="Leonys">
        </p>

        <p>
            <label for="Apellido">Apellido</label>
            <input type="text" name="apellidos" value="Vasquez">
       </p>
       <input type="submit" value="Enviar Datos">
    </form>
</body>
</html>