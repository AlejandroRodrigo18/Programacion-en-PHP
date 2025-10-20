<HTML>
<HEAD><TITLE> EJ2B – Conversor Decimal a base n </TITLE></HEAD>
<BODY>

<?php
    $num="48";
    $base="6";
    $numOriginal =$num;

    $resultado="";

   
    while($num > 0 ){  
                
        $resto = $num % $base;
        
        $resultado = $resto.$resultado;

        //calculo manual para sacar el octal

        $num= ($num - ($num % $base ))/$base;
        
    }
        
    print("Numero ".$numOriginal." en base ".$base." es: ".$resultado);

?>


</BODY>
</HTML>
