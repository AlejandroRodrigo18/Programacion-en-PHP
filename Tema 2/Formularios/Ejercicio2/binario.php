<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (isset($_POST['btncalcular'])) {

$decimal = test_input($_POST["decimal"]);
$binario = decbin($decimal);
}

echo "<div style='text-align: center;'>CONVERSOR BINARIO</div>";
echo"<br><br>";
echo "<div style='text-align: center;'><label id='decimal'>Numero Decimal: $decimal</label></div>";
echo "<br><br>";
echo "<div style='text-align: center;'><label id='binario'>Número Binario: $binario</label></div>";

?>