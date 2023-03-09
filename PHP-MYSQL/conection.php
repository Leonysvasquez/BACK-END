<?php

//Connection SQL Conectar a la base de datos
$conexion = mysqli_connect("localhost",'root','root','PHP_MYSQL');

//Comprobar si la conexión es correcta
if(mysqli_connect_error()){
    echo "La conexión a la base de datos MYSQL ha fallado:".mysqli_connect_error();
} else {
    echo "La conexión realizada correctamente!!";
}

//Consulta para configurar la codificación de caracteres
mysqli_set_charset($conexion, "utf8");

//Consulta en PHP
$query = mysqli_query($conexion,"SELECT * FROM Notas");
//$notas = mysql_fethc_assoc($query);
//var_dump($notas);

while($nota = mysqli_fetch_assoc($query)){
    //var_dump($nota);
    echo "<h2>".$nota['titulo']."</h2>".'<br/>';
    echo "<h2>".$nota['descripcion']."</h2>".'<br/>';
    echo "<h2>".$nota['color']."</h2>".'<br/>';
}

//Insertar en la base de datos desde PHP

$sql = "INSERT INTO `Notas`(`id`, `titulo`, `descripcion`, `color`) VALUES (NULL,'Notas de PY','Esto es una nota de PYTHON', 'AZUL')";
$insert = mysqli_query($conexion,$sql);

echo "<hr>";

if($insert){
    echo "DATOS INSERTADOS CORRECTAMENTE";
}
else{
    echo "Error: " .mysqli_error($conexion);
}
?>
