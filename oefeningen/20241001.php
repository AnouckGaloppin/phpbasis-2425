<?php
// <!-- OEF: Bereken de som van alle getallen tussen $start en $start + $count.
// Dus indien $start gelijk is aan 10 en $count gelijk aan 3
// dan zou het resultaat 33 moeten zijn (10+11+12) -->

$start = 10;
$count = 3;
$sum = 0;
for ($i = $start; $i < ($start + $count); $i++) {
    $sum += $i;
}
print $sum;


// <!-- OEF: Geef via een GET paramenter een aantal mee als height=999,
//     waarbij 999 vrij in te vullen is. Op het scherm wil ik een driehoek
//     zien van 999 hoog, waarbij op de eerste lijn 1 sterretje staat,
//     op de tweede lijn twee sterretjes, op de derde lijn 3, ..., ...
//     en uiteindelijk op de 999e lijn 999 sterretjes. -->
$height = @$_GET["height"];
for ($i = 0; $i <= $height; $i++) {
    print str_repeat("*", $i);
}


// <!-- OEF: uitbreiding op de voorgaande driehoek-oefening: indien het
// aantal sterretjes op de lijn deelbaar is door 5, print dan geen
// sterretjes, maar het is-gelijk-aan-teken (=). -->
$height = @$_GET["height"];
for ($i = 0; $i <= $height; $i++) {
    if ($i % 5 == 0) {
        echo str_repeat("=", $i);
    } else {
        echo str_repeat(" *", $i);
    }
}


// <!-- OEF: (mag opnieuw in een apart bestand): maak een pagina die 2
// optionele GET parameters accepteert:
// name=> een string, bevat een naam
// gender => ook een string, mogelijke antwoorden zijn m, f en x
// Toon op de pagina een begroeting in de vorm:
// Hallo [Mr.|Mv.| ] {naam}.
// Hou daarmee rekening met volgende criteria:
// vrouwen worden aangesproken als Mv.
// mannen worden aangesproken als Mr.
// Indien het geslacht ongekend is,
// wordt de aanspreking Mv./Mr. niet getoond
// De naam wordt, ongeacht hoe die in de URL parameters staat,
// STEEDS getoond als kleine letters, waarbij ieder woord/onderdeel
// van de naam begint met een hoofdletter.
// => bvb: Hallo Mr. Van De Voorde -->