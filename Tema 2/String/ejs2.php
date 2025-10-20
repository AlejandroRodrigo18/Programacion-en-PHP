<HTML>
<HEAD><TITLE> EJ1 - Conversión IP Decimal a Binario </TITLE></HEAD>
<BODY>

<?php

$ip = "192.18.16.204";
$ip2 = "10.33.161.2";

// Extraer cada parte manualmente
$pos1 = strpos($ip, ".");
$parte1 = substr($ip, 0, $pos1);

$pos2 = strpos($ip, ".", $pos1 + 1);
$parte2 = substr($ip, $pos1 + 1, $pos2 - $pos1 - 1);

$pos3 = strpos($ip, ".", $pos2 + 1);
$parte3 = substr($ip, $pos2 + 1, $pos3 - $pos2 - 1);

$parte4 = substr($ip, $pos3 + 1);

// Convertir a binario con 8 bits
$bin1 = str_pad(decbin($parte1), 8, "0", STR_PAD_LEFT);
$bin2 = str_pad(decbin($parte2), 8, "0", STR_PAD_LEFT);
$bin3 = str_pad(decbin($parte3), 8, "0", STR_PAD_LEFT);
$bin4 = str_pad(decbin($parte4), 8, "0", STR_PAD_LEFT);


//Hacemos lo mismo pero con la segunda IP
$posi1 = strpos($ip2, ".");
$part1 = substr($ip2, 0, $pos1);

$posi2 = strpos($ip2, ".", $pos1 + 1);
$part2 = substr($ip2, $pos1 + 1, $pos2 - $pos1 - 1);

$posi3 = strpos($ip2, ".", $pos2 + 1);
$part3 = substr($ip2, $pos2 + 1, $pos3 - $pos2 - 1);

$part4 = substr($ip2, $pos3 + 1);

// Convertir a binario con 8 bits
$bini1 = str_pad(decbin($part1), 8, "0", STR_PAD_LEFT);
$bini2 = str_pad(decbin($part2), 8, "0", STR_PAD_LEFT);
$bini3 = str_pad(decbin($part3), 8, "0", STR_PAD_LEFT);
$bini4 = str_pad(decbin($part4), 8, "0", STR_PAD_LEFT);

// Mostrar con printf
print("La IP " .$ip. " en binario es: ". $bin1.".". $bin2. "." . $bin3. ".". $bin4);

echo "<br>";

print("La IP " .$ip2. " en binario es: ". $bini1.".". $bini2. "." . $bini3. ".". $bini4);


?>

</BODY>
</HTML>
