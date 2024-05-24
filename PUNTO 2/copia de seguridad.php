<?php

$servername = "localhost";
$username = "root";
$database = "usuariosalcaldia";


$nombre_archivo = 'respaldo_usuarios_alcaldia' . date('2024-05-25_12-00-00') . '.sql';

// Ruta donde se almacenará el respaldo a consideracion de la persona que lo ejecute
$ruta_respaldo = 'C:/Users/the-e/Downloads/respaldo_usuarios_alcaldia/' . $nombre_archivo;


$comando = "mysqldump -u$username $database > $ruta_respaldo";


system($comando);

echo "Copia de seguridad creada en $ruta_respaldo";
?>