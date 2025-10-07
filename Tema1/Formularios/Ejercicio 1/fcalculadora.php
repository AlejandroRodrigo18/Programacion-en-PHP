<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>

</head>
<body>
    <div style="text-align: center;">
            <h1>Calculadora</h1>

            <form method="POST" action="calculadora.php">

            <label for="operando1">Operando1:</label>
            <input type="text" pattern="\d*" name="num1" placeholder="Introduce un número" required>
            <br><br>

            <label for="operando2">Operando2:</label>
            <input type="text"  pattern="\d*" name="num2" placeholder="Introduce un número" required>

            <br><br>

            <p>Selecciona una operación</p>
            <input type="radio" name="operacion" value="suma" checked>Sumar
            <br>
            <input type="radio" name="operacion" value="resta">Restar
            <br>
            <input type="radio" name="operacion" value="multiplicacion">Producto
            <br>
            <input type="radio" name="operacion" value="division">Dividir

            <br><br>

            <input type="submit" name="btncalcular" value="Calcular">        
            <input type="reset" value="Borrar">
        </form>
</div>
    
</body>
</html>

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
