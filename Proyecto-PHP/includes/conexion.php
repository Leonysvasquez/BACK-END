<?php
//Conexion

$servidor= 'localhost';
$usuario= 'root';
$password='root';
$basededatos='PHP_MYSQL';
$db = mysqli_connect($servidor,$usuario,$password,$basededatos);

mysqli_query($db, "SET NAMES 'UTF8' ");

//Iniciar la seccion 

    session_start();
?>