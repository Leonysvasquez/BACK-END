<?php

//Abrir Archivo


$archivo = fopen("fichero_texto.txt","a+");

//Leer contenido
while (!feof($archivo)){
$contenido = fgets($archivo);
echo $contenido."<br>";
}


//Escribir 

fwrite($archivo,"****Soy un texto metido desde PHP");

//Cerrar contenido

fclose($archivo);


//Copiar
copy('fichero_texto.txt', 'fichero_copiado.txt') or die("Error al copiar");

//Renombrar

rename('fichero_copiado.txt', 'archivito_recopiadito.txt');


//ELIMINAR

unlink('archivito_recopiadito.txt') or die('Error al borarr');



if (file_exists("fichero_texto.txt")){
    echo 'El archivo existe';
}

else{
    echo "NO EXISTE!!";
}