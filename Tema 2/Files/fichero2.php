<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 - Fichero </title>
</head>
<body>
    
<form method="POST" action="">

<label for="nombre">Nombre:</label>
<input type="text" name="nombre" required>

<br><br>

<label for="subname1">Primer Apellido: </label>
<input type="text" name="subname1" required>

<br><br>

<label for="subname2">Segundo Apellido: </label>
<input type="text" name="subname2" required>

<br><br>

<label for="birth">Fecha Nacimiento:</label>
<input type="date" name="birth" required>

<br><br>

<label for="city">Localidad</label>
<input type="text" name="city" required>

<br><br>

<input type="submit" name="btn" value="Guardar">
</form>
</body>

<?php 

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function guardarFichero(){
if (isset($_POST['btn'])) {

    $nombre = test_input($_POST['nombre']);
    $subname1 = test_input($_POST['subname1']);
    $subname2 = test_input($_POST['subname2']); 
    $fNacimiento = test_input($_POST['birth']); 
    $localidad = test_input($_POST['city']);   


    

        //Ruta donde se va a guardar el fichero
        $nombreFichero = "Files/alumnos2.txt";

        //Separacion de las variables en la columna indicada
        $linea  = str_pad($nombre, strlen($nombre)+2, "#", STR_PAD_RIGHT);
        $linea .= str_pad($subname1, strlen($subname1)+2, "#", STR_PAD_RIGHT);
        $linea .= str_pad($subname2, strlen($subname2)+2, "#", STR_PAD_RIGHT);
        $linea .= str_pad($fNacimiento, strlen($fNacimiento)+2, "#", STR_PAD_RIGHT);
        $linea .= str_pad($localidad,  strlen($localidad)+2, "#", STR_PAD_RIGHT);
        $linea .= "\n";


        $fichero = fopen($nombreFichero, "a") or die ("Fichero Inaccesible");
        fwrite($fichero, $linea);
        fclose($fichero);
        echo "Registro guardado correctamente en: $nombreFichero";

    }
}

guardarFichero();

?>
</html>
