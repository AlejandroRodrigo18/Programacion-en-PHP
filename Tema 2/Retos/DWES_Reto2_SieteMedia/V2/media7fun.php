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
    $numCartas = intval($_POST["numcartas"]); // Convertir a entero
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

    // Crear un mazo de claves y mezclarlo
    $mazoClaves = array_keys($cartas);
    shuffle($mazoClaves);

    // Repartir cartas a los jugadores
    foreach ($jugadores as $x => $y) {
        $jugadores[$x] = []; // Inicializar el array de cartas
        
        // Repartir el número de cartas especificado
        for ($i = 0; $i < $numCartas && !empty($mazoClaves); $i++) {
            $carta = array_shift($mazoClaves); // Tomar la primera carta del mazo
            $jugadores[$x][$carta] = $cartas[$carta]; // Asignar la carta y su valor
        }
    }

    return $jugadores;
}





function resultadoRonda($jugadores){
    if (!is_array($jugadores) || empty($jugadores)) {
        echo "Error: No hay jugadores válidos.";
        return [];
    }

    $apuesta = intval($_POST["apuesta"]);
    $mejorPuntaje = 0;
    $ganadores = [];

    $cartasT = [
        '1C' => 'imagenes/1C.PNG', '2C' => 'imagenes/2C.PNG', '3C' => 'imagenes/3C.PNG', '4C' => 'imagenes/4C.PNG', '5C' => 'imagenes/5C.PNG',
        '6C' => 'imagenes/6C.PNG', '7C' => 'imagenes/7C.PNG', 'JC' => 'imagenes/JC.PNG', 'QC' => 'imagenes/QC.PNG', 'KC' => 'imagenes/KC.PNG',
        '1D' => 'imagenes/1D.PNG', '2D' => 'imagenes/2D.PNG', '3D' => 'imagenes/3D.PNG', '4D' => 'imagenes/4D.PNG', '5D' => 'imagenes/5D.PNG',
        '6D' => 'imagenes/6D.PNG', '7D' => 'imagenes/7D.PNG', 'JD' => 'imagenes/JD.PNG', 'QD' => 'imagenes/QD.PNG', 'KD' => 'imagenes/KD.PNG',
        '1H' => 'imagenes/1H.PNG', '2H' => 'imagenes/2H.PNG', '3H' => 'imagenes/3H.PNG', '4H' => 'imagenes/4H.PNG', '5H' => 'imagenes/5H.PNG',
        '6H' => 'imagenes/6H.PNG', '7H' => 'imagenes/7H.PNG', 'JH' => 'imagenes/JH.PNG', 'QH' => 'imagenes/QH.PNG', 'KH' => 'imagenes/KH.PNG',
        '1S' => 'imagenes/1S.PNG', '2S' => 'imagenes/2S.PNG', '3S' => 'imagenes/3S.PNG', '4S' => 'imagenes/4S.PNG', '5S' => 'imagenes/5S.PNG',
        '6S' => 'imagenes/6S.PNG', '7S' => 'imagenes/7S.PNG', 'JS' => 'imagenes/JS.PNG', 'QS' => 'imagenes/QS.PNG', 'KS' => 'imagenes/KS.PNG',
    ]; //variable que almacena las cartas para luego colocarlas en la tabla
    
    // Variable booleana que sirve para rastrear si hay un ganador que ha sacado 7.5
    $exacto = false; 

    echo "<table border='1'><tr><th>Jugador</th><th>Cartas</th></tr>";

    foreach ($jugadores as $nombre => $cartas) {
        $htmlCartas = "";
        $suma = 0;

        foreach ($cartas as $carta => $valor) {
            if (isset($cartasT[$carta])) {
                $imagen = $cartasT[$carta];
                $htmlCartas .= "<img src='$imagen' alt='$carta' width='50' height='75'>";
                $suma += $valor;
            } else {
                echo "Carta desconocida: $carta<br/>";
            }
        }

        echo "<tr><td>$nombre</td><td>$htmlCartas</td></tr>";

        if ($suma == 7.5) {
            $exacto = true;
            $ganadores[] = $nombre;
        } elseif ($suma < 7.5) {
            if ($suma > $mejorPuntaje) {
                $mejorPuntaje = $suma;
                $ganadores = [$nombre];
            } elseif ($suma == $mejorPuntaje) {
                $ganadores[] = $nombre;
            }
        }
    }

    echo "</table>";

    if ($exacto || !empty($ganadores)) {
        $premio = $apuesta * 0.8;
        $reparto = $premio / count($ganadores);
        echo "Ganador(es): " . implode(", ", $ganadores) . ". Cada uno recibe $reparto euros.<br>";
    } else {
        echo "No hay ganadores en esta ronda. El bote acumulado es de $apuesta euros.";
    }

    return $ganadores;
}

function generarFichero($jugadores, $ganadores, $apuesta) {
    // Crear nombre del archivo con la fecha y hora actual
    $nombreArchivo = "resultado_" . date("dmYHis") . ".txt";
    $contenido = "";

    foreach ($jugadores as $nombre => $cartas) {
        // Calcular puntos del jugador
        $puntos = array_sum($cartas);

        // Obtener las iniciales del jugador (separa por '#')
        $partes = explode("#", $nombre);
        $iniciales = "";
        foreach ($partes as $parte) {
            $iniciales .= strtoupper($parte[0]); // primera letra en mayúscula
        }

        
        if (in_array($nombre, $ganadores)) {
                $premio = round(($apuesta * 0.8) / count($ganadores));
            } else {
                $premio = 0;
            }

        $contenido .= "$iniciales#$puntos#$premio\n";
    }

    // Guardar el archivo
    file_put_contents($nombreArchivo, $contenido);

    return $nombreArchivo;
}
?>

