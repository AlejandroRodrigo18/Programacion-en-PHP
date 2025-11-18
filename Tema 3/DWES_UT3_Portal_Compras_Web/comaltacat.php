<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de Categorias</title>
</head>

<body>
    <center>
    <h1> Alta de Categorias </h1>
        <form action="" method="POST">

           <label for="nombre">Nombre de la Categoría</label><br><br>
    <input type="text" name="nombre" id="nombre" required><br><br>

    <button type="submit" name="enviar">Guardar Categoría</button>


            <br><br>
        </form>
    </center>
</body>
</html>

<?php

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }



$servername = "localhost";
$username = "root";
$password = "rootroot";
$dbname = "comprasweb";

try {
    
    //Crear conexión PDO
        $con = new PDO("mysql:host=$servername;dbname=$dbname",$username, $password);   
    //Activamos modo de errores por excepciones
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Conexión establecida con la base de datos $dbname";
} catch (Exception $e) {
    echo "Error de conexión " . $e->getMessage();
}//catch

//2.- Recibimos datos del formulario

function generarID_Categoria($con){


$sql = "SELECT id_categoria FROM categoria ORDER BY id_categoria DESC LIMIT 1";

$stmt = $con->prepare($sql);
$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_ASSOC);

if($result){

    $ultimoID =$result['id_categoria'];
    $numero = intval(substr($ultimoID,2));

    $numeroNuevo = $numero + 1;
    
        } else {

            $numeroNuevo = 1;
        }

        return "C-" . str_pad($numeroNuevo,3,"0",STR_PAD_LEFT);
    }


if (isset($_POST["enviar"])) {

    $nombre = test_input($_POST["nombre"]);
    $idNuevo = generarID_Categoria($con);

    try {
        $sql = "INSERT INTO categoria (id_categoria, nombre) VALUES (:id_categoria, :nombre)";
        $stmt = $con->prepare($sql);
        $stmt->execute([
            ':id_categoria' => $idNuevo,
            ':nombre' => $nombre
        ]);

        echo "<br><center>Categoría <b>$nombre</b> insertada con ID <b>$idNuevo</b></center>";

    } catch (Exception $e) {
        echo "<br><center>Error al insertar: " . $e->getMessage() . "</center>";
    }
}

?>






