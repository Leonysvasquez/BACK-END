<?php


$error = 'faltan_valores';

if(!empty($_POST['nombre']) && !empty($_POST['Apellido']) && 
!empty ($_POST['Edad']) && !empty($_POST['Email']) && !empty($_POST['password'])){
        $error = 'Ok';

        $nomnbre = $_POST['nombre'];
        $apellidos = $_POST['Apellido'];
        $edad =(int) $_POST['Edad'];
        $email = $_POST['Email'];
        $password = $_POST['password'];

        //Validar Nombre
        if(!is_string($nomnbre) || preg_match("/[0-9]/",$nomnbre)){
            $error= 'nombre';
     
        }
         //Validar Apellido
         if(!is_string($apellidos) || preg_match("/[0-9]/",$apellidos)){
            $error= 'Apellido';
     
        }
          //Validar Edad
          if(!is_int($edad) || !filter_var ($edad,FILTER_VALIDATE_INT)){
            $error= 'Edad';
     
        }
          //Validar Email
          if(!is_string($email) || !filter_var ($email,FILTER_VALIDATE_EMAIL)){
            $error= 'Email';
     
        }
          //Validar Edad
          if(empty($password) || strlen($password)<5){
            $error= 'password';
     
        }
        
    }
    else{
        $error='faltan_valores';
        header("Location:formvalidado.php?error=$error");
    }
    if($error != 'Ok'){
        header("Location:formvalidado.php?error=$error");
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Validado En php</title>
</head>
<body>
    <?php
    if($error == 'Ok'): ?>
    <h1>Datos Validados Correctamente</h1>
    <p><?=$nomnbre?></p>
    <p><?=$apellidos?></p>
    <p><?=$edad?></p>
    <p><?=$email?></p>
    <p><?=$password?></p>
    <?php endif;?>
</body>
</html>