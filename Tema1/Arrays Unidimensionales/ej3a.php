<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<body>

   <table border="1">
    <tr>
        <td>Indice</td>
        <td>Binario</td>
        <td>Octal</td>
    </tr>

     <?php
     $numero= array();

    for ($i = 0; $i < 20; $i++) {
        $numero[$i] = $i;
        $binario = decbin($numero[$i]);
        $octal = decoct($numero[$i]);

        echo "<tr>
                <td>$i</td>
                <td>$binario</td>
                <td>$octal</td>
              </tr>";
              
    }
    ?>
</table>
</body>
</html>