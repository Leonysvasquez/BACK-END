<?php  

///Iniciar la sesion y la conexio a bd
require_once 'includes/conexion.php';


//Recoger datos del formulario 
if(isset($_POST)){
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    //Consulta para comprobar las credenciales del usuario
    $sql = "select * from usuario where email= '$email'";
    $login = mysqli_query($db,$sql);

    if($login && mysqli_num_rows($login)== 1 ){
     $usuario = mysqli_fetch_assoc($login);
     
    //Comprobar la contrasena //Cifrar 
    $verify=  password_verify($password , $usuario['password']);

     if($verify){
        $_SESSION['usuario'] = $usuario;
         //Utilizar una seccion para guardar los datos del usuario logueado
         if(isset($_SESSION['error_login'])){
            unset($_SESSION['error_login']);
         }
     }
     else{
        //Si algo falla enviar una sesion con el fallo
        $_SESSION['error_login']= "Login incorrecto";
    
     }
    }
    else{
        //Mensaje de error
        $_SESSION['error_login']= "Login incorrecto";
    }
}


//Utilizar una seccion para guardar los datos del usuario logueado

//Si algo falla enviar una sesion con el fallo

//Redigir al index.php
header('Location: index.php');
?>

