<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>
<body>

   <table border="1">
    <tr>
        <td>Indice</td>
        <td>Binario</td>
        <td>Octal</td>
        <td>Indice Invertido</td>
    </tr>

     <?php
    $numero = array();

        for ($i = 0; $i < 20; $i++) {
        $numero[$i] = $i;
    }    

        $arrayInvertido = array_reverse($numero);

    for ($i = 0; $i < 20; $i++) {

    
        $binario = decbin($numero[$i]);
        $octal = decoct($numero[$i]);
        $valorInvertido = $arrayInvertido[$i];
        echo "<tr>
                <td>$i</td>
                <td>$binario</td>
                <td>$octal</td>
                <td>$valorInvertido</td>
              </tr>";
              
    }
    ?>
</table>
</body>
</html>