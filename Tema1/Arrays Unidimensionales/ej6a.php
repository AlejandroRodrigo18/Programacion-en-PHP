<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
</head>
<body>
    
    <h2>Array sin funciones</h2>

        <?php
        $array1 = ["Bases Datos", "Entornos Desarrollo", "Programación"];
        $array2 = ["Sistemas Informáticos", "FOL"];
        $array3 = ["Desarrollo Web ES", "Desarrollo Web EC", "Despliegue", "Desarrollo Interfaces", "Inglés"];
    
        $reverso1 = array_reverse($array1);
        $reverso2 = array_reverse($array2);
        $reverso3 = array_reverse($array3);


        echo "<pre>";
        print_r($reverso1);
        echo "\n\n";
        print_r($reverso2);
        echo "\n\n";
        print_r($reverso3);
        echo "</pre>";
        ?>

    <h2>Array con merge</h2>

    <?php 
    
    $revresoMerge = array_merge($array1, $array2,$array3);
    $inverso = array_reverse($revresoMerge);
    print_r($inverso);

    ?>

    <h2>Array Push</h2>
<?php 
    
array_push($array1, $array2); // $array2 se convierte en un subarray dentro de $array1

echo "<pre>";
print_r(array_reverse($array1));
echo "</pre>";
    ?>
</body>
</html>