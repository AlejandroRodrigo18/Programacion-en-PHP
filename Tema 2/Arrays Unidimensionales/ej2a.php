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
        <td>Media Par</td>
        <td>Media Impar</td>
    </tr>

     <?php
     $par = 0;
     $impar = 0;
     $contadorPar = 0;
     $contadorImpar = 0;

    for ($i = 0; $i < 20; $i++) {

        $valor = $i * 2 + 1;
       
        if ($i % 2 == 0){

            $par += $valor;
            $contadorPar++;
        } else{
            $impar += $valor;
            $contadorImpar++;
        }

        echo "<tr>
                <td>$i</td>
                <td>$valor</td>
              </tr>";
           
    }
    
        $mediaPar = $par / $contadorPar;
        $mediaImpar = $impar / $contadorImpar;

        echo "<tr>
        <td colspan='2'><strong>Media Final</strong></td>
        <td>$mediaPar</td>
        <td>$mediaImpar</td>
      </tr>";
    ?>
</table>
</body>
</html>