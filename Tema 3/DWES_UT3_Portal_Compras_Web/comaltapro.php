<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de Productos</title>
</head>

<body>
    <center>
    <h1> Alta de Productos </h1>
        <form action="" method="POST">

           <label for="nombre">Nombre del Producto </label><br><br>
    <input type="text" name="nombre" id="nombre" required><br><br>

    <button type="submit" name="enviar">Guardar Producto</button>


            <br><br>
        </form>
    </center>

    <?php 
    
    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }

/*1. Creamos conexion con la Base de Datos*/

//Usando PDO

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

function generarID_Producto($con){

    $sql = "SELECT id_producto  FROM producto ORDER BY id_producto DESC LIMIT 1 ";

    $stmt = $con->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if($result){

        $lastID =  $result['id_producto'];
        $number = intval(substr($lastID,1));
        $newNumber = $number + 1;

    } else{

        $newNumber = 1;

    }

    return "P" . str_pad($newNumber,4,"0",STR_PAD_LEFT);

} //end generarID_Producto


if (isset($_POST["enviar"])){

    $name = test_input($_POST["nombre"]);
    $newID = generarID_Producto($con);

    try {

        $sql = "INSERT INTO producto (id_producto, nombre) VALUES (:id_producto, :nombre)";
        $stmt = $con->prepare($sql);
        $stmt ->execute ([':id_producto' => $newID, ':nombre' => $name]);
        
        echo "<br><center>Producto <b>$name</b> insertado con ID <b>$newID</b></center>";


    } catch (Exception $e){

                echo "<br><center>Error al insertar: " . $e->getMessage() . "</center>";

    }

}
    ?>
</body>
</html>
