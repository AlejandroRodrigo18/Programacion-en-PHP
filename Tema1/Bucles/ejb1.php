<HTML>
<HEAD><TITLE> EJ1B – Conversor decimal a binario</TITLE></HEAD>
<BODY>
    
    <?php
    
    $num="168";
    $num1=$num;
    
    $num2="127";
    $num22=$num2;

    $binario="";
    $binario2="";
    

    while($num> 0){

//        $resultado= $num / 2;
        $resto = $num % 2;
        $binario = $resto . $binario;

        //calculo manual para sacar el binario
        $num = ($num -($num % 2)) / 2;

        $resto = $num2 % 2;
        $binario2 = $resto . $binario2;
        $num2 = intval($num2 / 2);
        
    }


    print("Número ".$num1." en binario = ".$binario);
    echo"<br>";
    
    print("Número ".$num22." en binario = ".$binario2);


    ?>

</BODY>
</HTML>
