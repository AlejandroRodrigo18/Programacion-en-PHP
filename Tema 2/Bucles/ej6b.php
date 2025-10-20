<!DOCTYPE html>
<html>
<head>
    <title>EJ6B – Factorial</title>
</head>
<body>

<?php
    $num = 5;
    $factorial = 1;

    echo $num . "! = ";

    // Mostramos la multiplicación paso a paso
    for ($i = $num; $i > 0; $i--) {
        
        echo $i;

        if ($i > 1) {
            echo " x ";
        }
        
        $factorial *= $i;
    }

    echo " = " . $factorial;
?>

</body>
</html>
