<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2 - Formulario Valor</title>
</head>
<body>
    
    <h2 style="text-align:center;">Consulta Operaciones Bolsa</h2>
    <form method="POST" style="text-align:center;">

        <label for ="valors">Valores</label>
        <br><br>

        <input type="text"  name ="valors" placeholder="Escriba un valor" required>

        <br><br>

        <input type="submit" name="btnvisualizar" value="Visualizar">      

    </form>
    
</body>
</html>

<?php 

        function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

        function visualizarValores(){

        if (isset($_POST['btnvisualizar'])) {

        $valor = test_input($_POST["valors"]);
        $fichero =  "C:/wamp64/www/clase/PHP/Bolsa/ibex35.txt";   
        $lectura = fopen($fichero, "r") or die ("No se puede abrir el fichero");
            
        echo fread($lectura, filesize($fichero));
        fclose ($lectura);

        }
    }

   
?>
