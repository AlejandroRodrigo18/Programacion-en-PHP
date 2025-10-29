<?php
include("media7fun.php");

// Crear jugadores y jugar
$jugadores = crearJugadores();
$jugadores = repartirCartas($jugadores);
$ganadores = resultadoRonda($jugadores);

// Generar archivo con resultados si hay apuesta
if (isset($_POST['apuesta'])) {
    $apuesta = intval($_POST['apuesta']);
    $nombreArchivo = generarFichero($jugadores, $ganadores, $apuesta);
}
?>