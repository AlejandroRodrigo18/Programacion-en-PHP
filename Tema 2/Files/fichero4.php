<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
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

    $nombreFichero = "../Files/alumnos2.txt" ;


    if (!file_exists($nombreFichero)) {
            die("Fichero no encontrado: $nombreFichero");
        } //end if
    
            $fichero = fopen($nombreFichero, "r");


            // Iniciamos la tabla
            echo "<table border='1'>";
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
          
            $codigo = explode("##", $line);

            if (count($codigo) >= 5) {
            echo "<tr>";
                echo "<th>" . htmlspecialchars($codigo[0]) . "</th>";
                echo "<th>" . htmlspecialchars($codigo[1]) . "</th>";
                echo "<th>" . htmlspecialchars($codigo[2]) . "</th>";
                echo "<th>" . htmlspecialchars($codigo[3]) . "</th>";
                echo "<th>" . htmlspecialchars($codigo[4]) . "</th>";
            echo "</tr>";          

            $contador++;       
            } 
              
        }//end while

             echo "</table>"; // Cerramos la tabla

            fclose($fichero);

            echo"Total de filas leídas: $contador";  
    }//end function

    imprimirTabla();
    
    ?>
</body>
</html>