<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Decimal a Binario</title>
</head>
<body>
    <div style="text-align: center;">
        <h1>Calculadora</h1>

        <form method="POST" action="">
            <label for="decimal">Número Decimal:</label>
            <input type="text" pattern="\d*" name="decimal" placeholder="Introduce un número" required>
            <br><br>

            <input type="submit" name="btncalcular" value="Calcular">        
            <input type="reset" value="Borrar">
        </form>
    </div>

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

        echo "<div style='text-align: center;'><h2>CONVERSOR BINARIO</h2></div>";
        echo "<div style='text-align: center;'><label id='decimal'>Número Decimal: $decimal</label></div>";
        echo "<br><br>";
        echo "<div style='text-align: center;'><label id='binario'>Número Binario: $binario</label></div>";
    }
    ?>
</body>
</html>
