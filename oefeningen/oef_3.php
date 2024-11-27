<?php
$height = @$_GET["height"];
for ($i = 0; $i <= $height; $i++) {
    if ($i % 5 == 0) {
        echo str_repeat("=", $i) . "<br/>";
    } else {
        echo str_repeat("*", $i) . "<br/>";
    }
}
