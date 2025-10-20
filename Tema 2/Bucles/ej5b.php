<!DOCTYPE html>
<html>
<head>
    <title>Tabla generada con for</title>
</head>
<body>

<table border="1">
    <tr>
        <td>Operación</td>
        <td>Resultado</td>

    </tr>
<tr>

</tr>
    

    <?php
    $num="8";

    echo("Tabla de multiplicar del ". $num);

    echo"<br>";
    echo"<br>";


    for ($i = 0; $i <= 10; $i++) {

        $resultado = $num * $i;

        echo"<tr>";
        echo"<td id='numero'>".$num." x ". $i. "</td>" ;
        echo"<td id='resultado'>".$resultado."</td>";
        echo"<tr>";

    }

    
    ?>

</table>

</body>
</html>
