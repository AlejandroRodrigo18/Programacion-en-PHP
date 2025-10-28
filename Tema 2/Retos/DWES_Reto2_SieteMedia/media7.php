<?php

include("media7fun.php");

// Ejecutar solo cuando se envía el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// Crear jugadores y repartir cartas
	$jugadores = crearJugadores();
	$jugadores = repartirCartas($jugadores);

	// Mostrar resultado de la ronda
	resultadoRonda($jugadores);

} else {
	// Evitar ejecución accidental en GET
	echo "Accede desde el formulario (media7.html) y envía los datos.";
}

?>