<?php 
function leerFichero() {
$fichero =  "C:/wamp64/www/clase/PHP/Bolsa/ibex35.txt";   
$lectura = fopen($fichero, "r") or die ("No se puede abrir el fichero");
echo "<pre>"; 
echo fread($lectura, filesize($fichero));
fclose ($lectura);
echo "<pre>"; 
}

leerFichero();

?>