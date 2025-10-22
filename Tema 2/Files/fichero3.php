<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<body>
    
    <h2 style="text-align:center">Tabla</h2>

    <?php 
    
    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }
    function imprimirTabla(){

    //Abrimos Fichero

    $nombreFichero = "../Files/alumnos1.txt" ;


    if (!file_exists($nombreFichero)) {
            die("Fichero no encontrado: $nombreFichero");
        }
    
            $fichero = fopen($nombreFichero, "r");


            // Iniciamos la tabla
            echo "<table border='1' cellpadding='8' cellspacing='0' style='border-collapse:collapse;'>";
            echo "<tr>";
                echo "<th>Nombre</th>";
                echo "<th>Apellido 1</th>";
                echo "<th>Apellido 2</th>";
                echo "<th>Fecha Nacimiento</th>";
                echo "<th>Localidad</th>";
            echo "</tr>";
    
            $contador = 0;


    while (($line = fgets($fichero)) != false) {
    

           
            // Fila de datos
           $nombre = trim(substr($line,0,40));
           $subname1 = trim(substr($line,40,41));
           $subname2 = trim(substr($line,81,42));
           $fNacimiento = trim(substr($line,123,10));
           $localidad = trim(substr($line,133,27));

            $contador++;

            echo "<tr>";
            echo "<th>$nombre</th>";
            echo "<th>$subname1</th>";
            echo "<th>$subname2</th>";
            echo "<th>$fNacimiento</th>";
            echo "<th>$localidad</th>";
            echo "</tr>";           
                
        }//while

             echo "</table>"; // Cerramos la tabla

            fclose($fichero);
            echo"Total de filas leídas: $contador";  
    }
    imprimirTabla();
    ?>
</body>
</html>