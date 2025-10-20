<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (isset($_POST['btncalcular'])) {

$numero = test_input($_POST["number"]);
$nueva_base = test_input($_POST["base"]);
$base_antigua= "";

//Separamos numero de la base antigua
$partes = explode("/",$numero);

if(count($partes) == 2) {

    $numero = $partes[0];
    $base_antigua = $partes[1];
}
if ($base_antigua < 2 || $base_antigua > 36 || $nueva_base < 2 || $nueva_base > 36){

    //Verificamos que la base esté entre 2 y 36
    echo "La base debe de estar comprendida entre 2 y 36";

} else {

    // Convertir el número de la base antigua a decimal
    $numero_decimal = intval($numero, $base_antigua);

    //Convertimos el número a la nueva base
    $resultado = base_convert($numero_decimal, 10, $nueva_base);

    echo "<div style='text-align:center'>Número $numero en base $base_antigua = $resultado en base $nueva_base</div>";
}

}//fin isset



?>
