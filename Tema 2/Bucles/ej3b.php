<HTML>
<HEAD><TITLE> EJ3B – Conversor Decimal a base 16</TITLE></HEAD>
<BODY>
    <?php
        
        $num="222";
        $base="16";

     $numOriginal =$num;

    $resultado="";

   
    while($num > 0 )
        {  

        $resto = $num % $base;
        
    if ($resto == 10) {
        $digito = "A";
    } elseif ($resto == 11) {
        $digito = "B";
    } elseif ($resto == 12) {
        $digito = "C";
    } elseif ($resto == 13) {
        $digito = "D";
    } elseif ($resto == 14) {
        $digito = "E";
    } elseif ($resto == 15) {
        $digito = "F";
    } else {
        $digito = $resto;

    } //end else  

        $resultado = $digito.$resultado;

        //calculo manual para sacar el octal

        $num = ($num - ($num % $base ))/$base;
        
    } //end Wihile
        
    print("Numero ".$numOriginal." en base ".$base." es: ".$resultado);

    ?>

</BODY>
</HTML>