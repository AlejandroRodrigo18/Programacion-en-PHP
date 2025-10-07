<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (isset($_POST['btncalcular'])) {

$numero = test_input($_POST['decimal']);
$binario = decbin($numero);
$octal = decoct($numero);
$hexade = strtoupper(dechex($numero));
$operacion = $_POST['operacion'];


echo "<center><h2>CONVSERSOR NÚMERICO</h2></center>";
echo "<table border='1' style='margin: auto; text-align: center;'>";

switch ($operacion) {

    case "binario":
        echo"<center><p>Número Decimal: $numero</center></p>";

        echo "<tr>";

        echo"<td>Binario</td>";
        echo"<td id='binario'>$binario</td>";

        echo"</tr>";
        break;
     
    case "octal":

        echo"<center><p>Número Decimal: $numero</center></p>";

        echo "<tr>";

        echo"<td>Octal</td>";
        echo"<td id='octal'>$octal</td>";

        echo"</tr>";
        break;   

    case "hexadecimal":
       
        echo"<center><p>Número Decimal: $numero</center></p>";

        echo "<tr>";

        echo"<td>Hexadecimal</td>";
        echo"<td id='hexadecimal'>$hexade</td>";

        echo"</tr>";
        break;    

    case "all":
                                                                     
          echo"<center><p>Número Decimal: $numero</center></p>";
    
          echo "<tr>";
    
          echo"<td>Binario</td>";
          echo"<td id='binario'>$binario</td>";
    
          echo"</tr>";
    
          echo "<tr>";
    
          echo"<td>Octal</td>";
          echo"<td id='octal'>$octal</td>";
    
          echo"</tr>";
    
          echo "<tr>";
    
          echo"<td>Hexadecimal</td>";
          echo"<td id='hexadecimal'>$hexade</td>";
    
          echo"</tr>";
          break;                                            

    
    }//fin switch

    echo "</table>";

}