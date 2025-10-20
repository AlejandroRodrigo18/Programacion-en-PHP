<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

   <table border="1">
    <tr>
        <td>Indice</td>
        <td>Valor</td>
        <td>Suma</td>
    </tr>

     <?php

     $numero = array();
     $suma = 0;

     
    for ($i = 0; $i < 20; $i++) {

        $valor = ($i * 2) + 1;
        $numero[$i] = $valor;
        $suma += $numero[$i];

        echo "<tr>
                <td>$i</td>
                <td>$valor</td>
                <td>$suma</td>
              </tr>";
    }
    ?>
</table>
</body>
</html>
