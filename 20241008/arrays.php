<?php
$list = ["Vinnie", "Nicolas", "Joppe", "Kevin", 50];
$list[] = "Matthice";

// echo $list[4];

// echo "<pre>"; //-->zorgt ervoor dat je in de browser kan zien 
// print_r($list); //-->print_r dient om te debuggen (echo_r werkt niet) zodat je kan zien wat er in je variabele/array zit.
// var_dump($list); //-->doet hetzelfde als print_r maar geeft meer informatie over het element (bv aantal characters, type (string / integer)).
// echo "</pre>";
// exit; //--> zorgt ervoor dat je code stopt met uitvoeren. Alles wat hieronder zou staan wordt dus niet meer uitgevoerd.
?>

<html>

<head>
    <link rel="stylesheet" href="http://unpkg.com/mvp.css">
</head>

<body>
    <main>
        <ul>
            <?php
            for ($i = 0; $i < count($list); $i++) {
                echo "<li>$list[$i]</li>";
            }

            //Onderstaande foreach doet exact hetzelfde als bovenstaande for
            foreach ($list as $person) {
                echo "<li>$person</li>";
            }

            foreach ($list as $i => $person) {
                echo "<li>$person</li>";
            }
            ?>
        </ul>
    </main>
</body>

</html>