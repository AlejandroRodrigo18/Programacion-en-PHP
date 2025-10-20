<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (isset($_POST['btncalcular'])) {

    $nombre = test_input($_POST['name']);
    $subname = test_input($_POST['subname1']);
    $subname2 = test_input($_POST['subname2']); 
    $email = test_input($_POST['mail']);    
    $genero = test_input($_POST['genero']);


    //Creacion del archivo y escritura de datos
    $nombre_archivo = "datos.txt";
    $contenido = "Nombre: $nombre\nApellidos: $subname $subname2\nEmail: $email\nSexo: $genero\n";

    // Si el archivo no existe, se creará
    // Si existe, su contenido será sobrescrito por defecto
    file_put_contents($nombre_archivo, $contenido);
 
    //Creaccion de la tabla
    echo "<h2 style='text-align:center'>Datos Alumnos</h2>";
    echo "<table border='1' style='border-collapse: collapse; margin: auto; text-align: center;'>";
    echo "<tr>
    <td>Nombre</td>
    <td>Apellidos</td>
    <td>Email</td> 
    <td>Sexo</td>
    </tr>";

    echo "<tr>
    <td>$nombre</td>
    <td>$subname $subname2</td>
    <td>$email</td>
    <td>$genero</td>
    </tr>";

    echo '</table>';
    echo "<br><br>";

    echo "<center><a href='$nombre_archivo' download style='display:inline-block;padding:10px 20px;background:#007BFF;color:white;text-decoration:none;border-radius:5px;'>Descargar Datos</a></center>";
}
?>