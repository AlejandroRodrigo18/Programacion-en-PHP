<HTML>
<HEAD>

    <TITLE> EJ2-Direccion Red – Broadcast y Rango</TITLE>

</HEAD>
<BODY>
    <?php
    
    //Variable IP + Máscara
    $ip="192.168.16.100/16";
    
    ///////////////////////////////////////


    //Variable máscara

    $mask =substr($ip, 14);

    ///////////////////////////////////////

    //Variable de red
    
    //Muy agarrado por pinzas

    $dirRed1 = substr_replace($ip, "0.0", 8, );
    $dirRed2 = substr_replace($ip, "0", 0 );

    ////////////////////////////////////////
    
    //Variable de broadcast

    $broadcast = substr_replace($ip, "255.255",8);

    ///////////////////////////////////////

    //variable de rango

    $rangoPart1 = substr_replace($ip, "0.1",8);

    $rangoPart2 = substr_replace($ip,"255.254",8);
    
    ///////////////////////////////////////

    //Resultado Final
    print("IP: ". $ip);


    echo "<br>";

    print("Máscara: ".$mask);
    
    echo "<br>";

    print("Dirección de red: ". $dirRed1);

    //print("Dirección de red: ". $dirRed1.".".$dirRed2);

    echo "<br>";

    print("Direccion Broadcast: " . $broadcast);

    echo "<br>";

    print("Rango: " . $rangoPart1. " a " . $rangoPart2);

    ?>
</BODY>
</HTML>