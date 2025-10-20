<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7</title>
</head>
<body>

<?php
$edades_alumnos = ["Carlos"  => 25,"Laura"   => 17,"Miguel"  => 21,"Sofía"   => 19,"Andrés"  => 23];

echo "<h2>Array Inicial</h2>";
echo "<pre>";
print_r($edades_alumnos);
echo "</pre>";

echo "<h3>a. Contenido del Array Usando Bucle foreach</h3>";
echo "<ul>";
foreach ($edades_alumnos as $nombre => $edad) {
    echo "<li>$nombre tiene **$edad** años.</li>";
}
echo "</ul>";

echo "<h3>b. Puntero en la Segunda Posición</h3>";
reset($edades_alumnos);
next($edades_alumnos); 


$nombre_actual = key($edades_alumnos);
$edad_actual = current($edades_alumnos);
echo "<p>El alumno en la **segunda posición** es **$nombre_actual** con $edad_actual años.</p>";



echo "<h3>c. Avanza una Posición (Tercera Posición)</h3>";

next($edades_alumnos); 

$nombre_actual = key($edades_alumnos);
$edad_actual = current($edades_alumnos);
echo "<p>El alumno en esta nueva posición es **$nombre_actual** con $edad_actual años.</p>";



echo "<h3>d. Puntero en la Última Posición</h3>";

end($edades_alumnos);

$nombre_actual = key($edades_alumnos);
$edad_actual = current($edades_alumnos);
echo "<p>El alumno en la **última posición** es **$nombre_actual** con $edad_actual años.</p>";



echo "<h3>e. Array Ordenado por Edad</h3>";

asort($edades_alumnos);

echo "<p>El array ha sido ordenado (de menor a mayor edad):</p>";
echo "<pre>";
print_r($edades_alumnos);
echo "</pre>";


reset($edades_alumnos);
$nombre_primero = key($edades_alumnos);
$edad_primero = current($edades_alumnos);

end($edades_alumnos);
$nombre_ultimo = key($edades_alumnos);
$edad_ultimo = current($edades_alumnos);


echo "<h4>Resultado:</h4>";
echo "<ul>";
echo "<li>El alumno de menor edad (primera posición) es $nombre_primero con $edad_primero años.</li>";
echo "<li>El alumno de mayor edad (última posición) es $nombre_ultimo con $edad_ultimo años.</li>";
echo "</ul>";

?>

</body>
</html>