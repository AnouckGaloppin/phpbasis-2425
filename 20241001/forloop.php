<?php
$x = 50;
// print $x;
$count = @$_GET["count"];

// for ($i = 0; $i <= $count; $i++) {
//     print $i . '<br/>';
// }

//'<br/>' is html die ervoor zorgt dat de
// getallen onder elkaar staan.

// for ($i = 0; $i <= $count; $i += 2) {
//     print $i . '<br/>';
// }


//TOON ALLE EVEN GETALLEN VANAF EEN STARTGETAL
$start = @$_GET["start"];

// for ($i = $start; $i <= ($start + $count); $i++) {
//     if ($i % 2 == 0) {
//         print $i . '<br/>';
//     }
// }

//Toon alle priemgetallen 
//(enkel deelbaar door zichzelf en 1)
// $start = @$_GET["start"];
// $start = 3; //TODO
for ($i = $start; $i <= ($start + $count); $i + 1) {
    $isPrime = true;
    for ($divider = 2; $divider < $i; $divider += 1) {
        if ($i % $divider == 0) {
            $isPrime = false;
        }
    }
    if ($isPrime) {
        print "$i is een priemgetal... <br/>";
    }
}
