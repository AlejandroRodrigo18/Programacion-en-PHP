<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (isset($_POST['btncalcular'])) {

$numero1 = $_POST['num1'];
$numero2 = $_POST['num2'];
$operacion = $_POST['operacion'];

echo "<center><h2>CALCULADORA</h2></center>";

switch ($operacion){
 case 'suma':
            $resultado = $numero1 + $numero2;
            echo "<center><p id=suma>Resultado operación: $numero1 +  $numero2 = $resultado</p></center>";

            break;
        case 'resta':
            $resultado = $numero1 - $numero2;
            echo "<center><p id=resta>Resultado operación: $numero1 -  $numero2 = $resultado</p></center>";

            break;
        case 'multiplicacion':
            $resultado = $numero1 * $numero2;
            echo "<center><p id=multiplicacion>Resultado operación: $numero1 *  $numero2 = $resultado</p></center>";

            break;
        case 'division':
            $resultado = $numero2 != 0 ? $numero1 / $numero2 : "Error: División por cero";
            echo "<center><p id=division>Resultado operación: $numero1 /  $numero2 = $resultado</p></center>";

            break;
        default:
            $resultado = "Operación no válida";
} 
            
}            

?>
