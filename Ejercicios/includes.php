
<?php



$tabla = array(
    "ACCION" => array("GTA5", "NEED FOR SPEED", "FORNITE"),
    "AVENTURAS" => array("GTA 5", "PUBG", "FORNITE"),
    "DEPORTES" => array("MLB 21", "NBA 2K21", "FIFA 2023"),
);



$categorias = array_keys($tabla);
?>


<table border="1">
    <?php require_once('Ejercicio/encabezado.php')?>
    <tr>
        <td><?=$tabla['ACCION'][1]?></td>
        <td><?=$tabla['AVENTURAS'][0]?></td>
        <td><?=$tabla['DEPORTES'][0]?></td>
    </tr>
</table>