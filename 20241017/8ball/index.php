<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('data.php');


function getRandomAnswer($answers, $previousKey)
{
    $randomKey = array_rand($answers);

    while ($randomKey == $previousKey) {
        $randomKey = array_rand($answers);
    }

    return $randomKey;
}

$isClicked = @$_GET["clicked"];
$previousKey = @$_GET["prevKey"];
$currentKey = 0;

?>

<!DOCTYPE html>
<html>

<head>
    <title>8 Ball</title>
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">
</head>

<body>

    <main align="center">
        <?php
        if ($isClicked != "clicked") {
        ?> <a href="index.php?clicked=clicked"><button>ASK 8-BALL</button></a>

        <?php
        } else {
            $currentKey = getRandomAnswer($answers, $previousKey);
        ?>
            <h2> <?= $answers[$currentKey] ?> </h2>

            <a href="index.php?clicked=clicked&prevKey=<?= $currentKey ?>"><button>ASK AGAIN</button></a>
        <?php
        }
        ?>
    </main>

</body>

</html>