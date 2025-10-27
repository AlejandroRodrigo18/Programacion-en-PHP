<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejericicio 5</title>
</head>
<body>
    <h2>Operaciones Ficheros</h2>

    <form method="post">
        <label for="file">Fichero (Path/nombre)</label>
        <input type="text" name="file" id="file" required>
        <br><br>
        <p>Operaciones</p>

        <input type="radio" id="seeFile" name="seeFile" value="seeFile" checked>Mostrar Fichero<br>
        <input type="radio" id="seeLine" name="seeFile" value="seeLine">Mostrar línea <input type="text" pattern="\d*" name="numberLine" id="line" size="1"> fichero 
        <br>
        <input type="radio" id="seeLine2" name="seeFile" value="seeLine2">Mostrar línea <input type="text" pattern="\d*" name="numberLine2" id="line2" size="1"> primeras lineas
        <br><br>
        <input type="submit" value="Enviar" name ="btn">
        <input type="reset" value="Borrar">

    </form> 

    <?php 
    
    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }

    function libro(){
    if (isset($_POST['btn'])) {

    $fichero = $_POST['file'];
    $numeroLinea = (int) $_POST['numberLine'];
    $numeroLinea2 = (int) $_POST['numberLine2'];
    $opcion = $_POST['seeFile'];

//    $fichero2 = fopen($fichero,'r') or die ("No se puede abrir el fichero");

    switch ($opcion){

        case 'seeFile':
            if(file_exists($fichero)){
              $fichero2 = file_get_contents($fichero,) or die ("No se puede abrir el fichero");
              echo "<pre>$fichero2</pre>";
              
        }else {
                echo "El fichero no existe.";
            }

        case 'seeLine':
            if(file_exists($fichero)){
            $fichero2 = fopen($fichero, "r" ) or die ("No se puede abrir el fichero");
          $contador = 0;

                while (!feof($fichero2)) {
                    $linea = fgets($fichero2);
                    if ($contador === $numeroLinea) {
                        echo "Línea $numeroLinea:" . htmlspecialchars($linea) . "<br>";
                        break;
                    }
                    $contador++;
                }

                fclose($fichero2);
            } else {
                echo "El fichero no existe.";
            }
        
        
        case 'seeLine2':
            if(file_exists($fichero)){
                $fichero2 = file(($fichero)) or die ("No se puede abrir el fichero");
                if($numeroLinea2 != false){
                    $lineas_a_mostrar = array_slice($fichero2, 0, $numeroLinea2);
           foreach ($lineas_a_mostrar as $numeroLinea2) {
               echo "<pre>$numeroLinea2</pre>";
           }
         }//end if
    }else {
                echo "El fichero no existe.";
            }
        

        }//end IF isset
    }//end function libro

}
    libro();

    ?>
</body>
</html>