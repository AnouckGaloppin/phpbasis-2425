<?php

function subFib($start, $count)
{
    $sum = 0;
    for ($i = $start; $i < ($start + $count); $i++) {
        $sum += $i;
    }
    return $sum;
}


print subFib(20, 2) . "<br/>";
print subFib(20, 3) . "<br/>";
print subFib(50, 100) . "<br/>";

$basis = 10000;
function superSom($one, $two, $basis)
{
    return $basis + $one + $two;
}

$basis = 100;

print "De supersom van 5 en 10 is." . superSom(5, 10, 200) . "<br/>";
