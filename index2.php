<?php

$nombre = $_POST['nombre'];

echo "ESTO ES SU NOMBRE :", $nombre; 
echo "<br>";

echo readfile("./recibe.php");

$newFileFocus = "./textos.txt";
$otroMuchos = 'This is the content of the "3-create-write-file.txt" file.';

$file = fopen($newFileFocus, "w");
fwrite($file,$otroMuchos);
fwrite($file, "\nNew content in a new line.");
?>