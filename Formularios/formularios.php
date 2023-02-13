<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        Nombre: <input type="text" name="nombre" id="">
        Apellido: <input type="text" name="nombre" value="Apellido"  id="" pattern="[A-Z]+" required placeholder="Ingresa tu apellido">
        

        <input type="file" multiple>
        <button type="submit">Enviar</button>


    </form>
</body>
</html>