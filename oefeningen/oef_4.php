<?php
$name = @$_GET["name"];

//correctie / mogelijkheden
//$name = ucwords($name); --> ucwords zorgt voor een hoofdletter bij elk woord uit de string. Bv: Van Den Troost
//Bovenstaande code vervangt onderstaande 3 regels.

$firstLetter = strtoupper(substr($name, 0, 1));
$restName = substr($name, 1, strlen($name));
$nameCorrect = $firstLetter . $restName;
$titel = "";
$gender = @$_GET["gender"];
if ($gender == "f" || $gender == "m" || $gender == "x") {
    switch ($gender) {
        case "f":
            $titel = "Mv";
            break;
        case "m":
            $titel = "Mr";
            break;
        case "x":
            $titel = "";
            break;
    }
    print('Hallo ' . $titel . ' ' . $nameCorrect . '.');
} else {
    print 'Enter a valid option';
}
