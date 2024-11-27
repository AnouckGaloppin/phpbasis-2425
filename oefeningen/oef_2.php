<?php
$height = @$_GET["height"];
for ($i = 1; $i <= $height; $i++) {
    print str_repeat("*", $i) . "<br/>";
}
