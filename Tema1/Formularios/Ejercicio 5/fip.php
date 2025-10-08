<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambio de Base</title>
</head>
<body>
    <div style="text-align: center;">
    <form method="POST" action="">

        <h2>IPs</h2>

        <label for="ip">IP notacion decimal:</label>
        <input type="text"  pattern="\d+(\.\d+){3}"   name="number" placeholder="Introduce un número" required>
        <br><br>    

        <input type="submit" name="btncalcular" value="Notacion Binaria">        
        <input type="reset" value="Borrar">

        <br><br>
        <br><br>

    </form>
    </div>

    <?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (isset($_POST['btncalcular'])) {

$ip = test_input($_POST["number"]);
$octetos = explode(".",$ip);

if(count($octetos)==4){
    
    //Separamos en 4 octetos
    $binario1 = str_pad(decbin($octetos[0]), 8, "0", STR_PAD_LEFT);
    $binario2 = str_pad(decbin($octetos[1]), 8, "0", STR_PAD_LEFT);
    $binario3 = str_pad(decbin($octetos[2]), 8, "0", STR_PAD_LEFT);
    $binario4 = str_pad(decbin($octetos[3]), 8, "0", STR_PAD_LEFT);

    //Creacion de variable que guarde el conjunto de ips en binario
    $ip_binaria = "$binario1.$binario2.$binario3.$binario4";

    echo "IP notación decimal: <input type='text' value='$ip' size ='15' readonly>";
    echo "<br><br>";
    echo "IP notación binaria: <input type='text' value='$ip_binaria' size ='33' readonly>";
    }

    else {

        echo "La IP introducida no es válida.";
        
    }
}//fin isset


?>
</body>
</html>