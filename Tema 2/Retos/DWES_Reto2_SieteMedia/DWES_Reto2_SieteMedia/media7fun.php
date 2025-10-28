<?php

//--- MAIN ----
/*
    En main creamos un array vacío llamado $jugadores,
    -Pasa por creaJugadores() para darle un nombre a la clave y dejar el valor en null.
    -En repartirCartas() asignamos un array de N cartas a los jugadores
*/


function crearJugadores(){


    $jugador1 = ($_POST["nombre1"]);
    $jugador2 = ($_POST["nombre2"]);
    $jugador3 = ($_POST["nombre3"]);
    $jugador4 = ($_POST["nombre4"]);


    //Creo los jugadores
    $jugadores = [$jugador1 => [],$jugador2 => [],$jugador3 => [],$jugador4 => []];


    return $jugadores;
} //end function crearJugadores




function repartirCartas($jugadores){


    $numCartas = $_POST["numcartas"]; // Cambiado a minúsculas para coincidir con el formulario
    //Creo las cartas

    $cartas = [
    //Corazones    
    '1C' => 1,'2C' => 2,'3C' => 3,'4C' => 4,'5C' => 5,'6C' => 6,'7C' => 7,'JC' => 0.5,'QC' => 0.5,'KC' => 0.5,
    //Diamantes
    '1D' => 1,'2D' => 2,'3D' => 3,'4D' => 4,'5D' => 5,'6D' => 6,'7D' => 7,'JD' => 0.5,'QD' => 0.5,'KD' => 0.5,
    //Tréboles
    '1H' => 1,'2H' => 2,'3H' => 3,'4H' => 4,'5H' => 5,'6H' => 6,'7H' => 7,'JH' => 0.5,'QH' => 0.5,'KH' => 0.5,
    //Picas
    '1S' => 1,'2S' => 2,'3S' => 3,'4S' => 4,'5S' => 5,'6S' => 6,'7S' => 7,'JS' => 0.5,'QS' => 0.5,'KS' => 0.5,
    ];

    //Hago una copia de las cartas
    $copiaCartas = $cartas;

    //Remuevo las cartas
    shuffle($copiaCartas);


    //Repatir cartas a los jugadores
    foreach ($jugadores as $x => $y) {
       
        $jugadores[$x] = []; // Inicilizando el array de cartas
        
        for ($i = 0; $i < $numCartas; $i++){
            $carta = key($copiaCartas); // Obtengo la clave de la carta actual (EJ: '1C')
            $valor =current($copiaCartas); // Obtengo el valor de la carta actual (EJ: 1)

            // Asigno la carta y su valor al jugador y lo guardo en $valor
            $jugadores[$x][$carta] = $valor; 

            // Muevo el puntero al siguiente elemento del array (EJ: '2C' => 2)
            next($copiaCartas); 

        }//end for anidado
    } //end foreach

    return $jugadores;

} //end function repartirCartas



function resultadoRonda($jugadores){

    $apuesta =intval($_POST["apuesta"]);
    $mejorPuntaje = 0;
    $ganadores = [];
    $cartasT = ""; //variable que almacena las cartas para luego colocarlas en la tabla
    
    // Variable booleaba que sirve para rastrear si hay un ganador que ha sacado 7.5
    $exacto = false; 

    echo "<table border='1'><tr><th>Jugador</th><th>Cartas</th><th>Puntos</th></tr>";

    foreach ($jugadores as $nombre => $cartas){
        echo "<h3>Jugador: $nombre</h3>";
        $suma = 0;
        
        foreach ($cartas as $carta => $valor) {
            $cartasT .= "$carta ($valor)"; // Almaceno las cartas en la variable
            echo "$carta ($valor) ";
            $suma += $valor;
        } //end foreach cartas

        echo "<tr><td>$nombre</td><td>$cartas</td><td>$suma</td></tr>";

        if ($suma == 7.5) {
                $exacto = true; // Hay un ganador con 7.5
                $ganadores[] = $nombre;
        } elseif ($suma < 7.5) {
             if($suma > $mejorPuntaje) {
                $mejorPuntaje = $suma;
                $ganadores = [$nombre]; //array solo con el nombre del jugador
             } elseif ($suma == $mejorPuntaje) { // Empate, se añade a los jugadores empatados a a lista
                $ganadores[] = $nombre;
             }
        } elseif ($suma > 7.5){
            echo "NO hay ganadores en esta ronda.";
            echo "el bote acumulaod es de $apuesta euros.";
        }
        
        echo "</table>";

        $apuesta = $apuesta * 0.8; 
        $apuesta = $apuesta * 0.5; // La bolsa se divide entre los jugadores empatados

    }//end foreach principal
    } //end function resultadoRonda


function generarFichero(){


}    

?>

