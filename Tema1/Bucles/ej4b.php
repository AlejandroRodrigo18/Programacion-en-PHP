<HTML>
<HEAD><TITLE> EJ4B – Tabla Multiplicar</TITLE></HEAD>
<BODY>
    <?php
    
    $num="8";

    echo("Tabla de multiplicar del ".$num);
    
    echo("<br>");

    
    for ($i=0; $i <=10 ; $i++) { 
        
      
        $resultado = $num * $i;

        echo($num. "x" .$i. "=".$resultado."<br>" );


    }

    ?>
</BODY>
</HTML>