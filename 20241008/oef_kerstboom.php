<?php
$height = @$_GET["height"];
//Onderstaande if zorgt ervoor dat als je geen height parameter meegeeft, je toch een kerstboom krijgt het height 21
if ($height === null) {
    $height = 21;
}

for ($i = 1; $i <= $height; $i = $i += 2) {

    $spaces = floor($height - $i) / 2;
    //Eerst printen we de leading spaces
    echo str_repeat("_", $spaces);

    //Nu printen we het aantal sterretjes voor deze rij
    $char = "*";
    echo str_repeat($char, $i);

    //Daarna printen we de trailing spaces.
    echo str_repeat("_", $spaces) . "<br >";
}
