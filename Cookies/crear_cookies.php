<?php

//Crea Cookie

//SETCOOKIE 

setcookie("micookie", "Valor de mi Cookie");

///SETCOOKIE CON EXPIRACION

setcookie("unyear", 'valor de mi cookie 365 dias', time() + (60 * 60 * 24 * 365));


?>


<a href="ver_cookies.php">Ver las galletas</a>


