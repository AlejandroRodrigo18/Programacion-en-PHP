<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 8</title>
</head>
<body>

<?php

$notas_bd = ["Ana"=> 7.5,"Pablo"=> 3.22,"Lucía"=> 6.5,"Javier" => 5.0, "Marta" => 1.25];

echo "<h2>Notas de Alumnos en Bases de Datos</h2>";
echo "<pre>";
print_r($notas_bd);
echo "</pre>";

$nota_maxima = max($notas_bd);

$alumno_mayor_nota = array_search($nota_maxima, $notas_bd);

echo "<h3>a. Alumno con Mayor Nota</h3>";
echo "<p>El alumno con la mayor nota es $alumno_mayor_nota con un $nota_maxima.</p>";

$nota_minima = min($notas_bd);

$alumno_menor_nota = array_search($nota_minima, $notas_bd);

echo "<h3>b. Alumno con Menor Nota</h3>";
echo "<p>El alumno con la menor nota es $alumno_menor_nota con un $nota_minima.</p>";


$suma_notas = array_sum($notas_bd);

$cantidad_alumnos = count($notas_bd);

$media = $suma_notas / $cantidad_alumnos;

$media_formateada = number_format($media, 2);

echo "<h3>c. Media de Notas</h3>";
echo "<p>La suma total de las notas es: $suma_notas</p>";
echo "<p>El número total de alumnos es: $cantidad_alumnos</p>";
echo "<p>La media de las notas obtenidas es: $media_formateada</p>";

?>

</body>
</html>