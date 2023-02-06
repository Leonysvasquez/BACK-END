///

<?php

function  calculadora($numero1, $numero2 , $negrita = false){

    ///conjunto de instrucciones a jecutar 

    $sumar= $numero1 + $numero2;

    if ($negrita == true){
        echo "<h1>";
    }

    echo "Suma: $sumar <br/>";
}


calculadora(10, 20, true);