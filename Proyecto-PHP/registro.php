<?php

if(isset($_POST)){


//Conexion a la base de datos
require_once 'includes/conexion.php' ;

//Iniciar seccion/
if (!isset($_SESSION)) {
    session_start();
}

if(isset($_POST['submit'])){
    
    $conexion = mysqli_connect("localhost",'root','root','PHP_MYSQL');

    $nombres = isset($_POST['nombres']) ? mysqli_escape_string($conexion, $_POST['nombres']) : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_escape_string($conexion, $_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? mysqli_escape_string($conexion, trim($_POST['email'])) : false;
    $password = isset($_POST['password']) ? mysqli_escape_string($conexion, $_POST['password']) : false;
    
   
    //
    $errores = array();

    if(!empty($nombres) && !is_numeric($nombres) && !preg_match("/[0-9]/",$nombres)){
        $nombre_validado = true;
    }
    else{
        $nombre_validado = false;
        $errores['nombres'] = "El nombre no es valido";
    }
    //Validar apellidos
    if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/",$apellidos)){
        $nombre_validado = true;
    }
    else{
        $apellidos_validado = false;
        $errores['apellidos'] = "El apellido no es valido";
    }

    //Validar email 
    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_validado = true;
    }
    else{
        $email_validado = false;
        $errores['email'] = "El email no es valido";
    }

    if(!empty($email)){
        $email_validado=true;
    }
    else{
        $email_validado = false;
        $errores['email']= "El email no es valido";
    }

    //Validar contrasena
    if(!empty($password)){
        $password_validado=true;
    }
    else{
        $password_validado = false;
        $errores['password']= "El password esta vacio";
    }

    $guardar_usuario= false;

    if(count($errores) == 0){
        $guardar_usuario= true;

        //Cifrar la contrasena
        $password_segura = password_hash($password, PASSWORD_BCRYPT , ['cost' =>4]);
        //var_dump($password);
        //var_dump($password_segura);
        //var_dump(password_verify($password, $password_segura));
        //die();
        //Crear Table
        //CREATE TABLE usuario (
            //id INT(250) NOT NULL AUTO_INCREMENT,
            //nombre VARCHAR(200) NOT NULL,
            //apellidos VARCHAR(100) NOT NULL,
            //email VARCHAR(200) NOT NULL,
            //password VARCHAR(200) NOT NULL,
            //fecha DATE NOT NULL,
            //PRIMARY KEY (id)
          //);
          
        //Insertar en la DB


        $sql = "INSERT INTO usuario VALUES(null,'$nombres','$apellidos','$email','$password_segura',CURDATE());";
        $guardar = mysqli_query($db,$sql);

        var_dump(mysqli_error($db));
        die();
        
        if($guardar){
            $_SESSION['completado']="El registro se ha completado con exito";
        }
        else{
            $_SESSION['errores']['general'] = "Fallo al guardar el usuario!!";
        }
        }

        else
        {
        $_SESSION['errores'] =$errores;
    
        }

        //var_dump($errores)
    }
}
header('Location: index.php');
?>