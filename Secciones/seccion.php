<?php

session_start();


$variable_normal ="Soy una cadena de texto" . "<br/>";


$_SESSION['variable_persistente'] ='Hola programador Soy una seccion activa';

echo $variable_normal;"<br/>";
echo $_SESSION['variable_persistente']

?>