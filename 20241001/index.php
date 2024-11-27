<?php
//Onderstaande 3 regels zorgen ervoor dat errors zichtbaar en nuttiger worden om te debuggen
//Bij aflevering product voor klant is dit geen goed idee want dit komt niet professioneel over.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// comment zoals JavaScript. Zowel // als /* */
// Php is nooit zichtbaar in console(inspect)! Dit doordat het server side programmeren is en niet client/browser side programmeren.
// Een nieuwe variabele definieren:


$id = @$_GET["id"];
//----> stukje tussen [] is wat er in de url zal staan. Dit hoeft niet 
//      hetzelfde te zijn als de variabele naam. Kan dus ook 
//      $id = @$_GET['volgnummer'];


// if ($id == 1) {
//     $firstname = "Vinnie";
//     $lastname = "Stoop";
// } else if ($id == 2) {
//     $firstname = "Nicolas";
//     $lastname = "Van Lankveld";
// } else {
//     $firstname = "Voornaam";
//     $lastname = "Familienaam";
// }

//Dit is een switch statement die hetzelfde doet als de if else van hierboven.

switch ($id) {
    case 1:
        $firstname = "Vinnie";
        $lastname = "Stoop";
        break;
    case 2:
        $firstname = "Nicolas";
        $lastname = "Van Lankveld";
        break;
    default:
        $firstname = "Voornaam";
        $lastname = "Familienaam";
        break;
}

?>
<html>

<head>
    <title>Portfolio <?php echo $firstname . ' ' . $lastname; ?> </title>
    <!-- We gebruiken MVP's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">
</head>

<body>
    <main>
        <h1><?php echo "$firstname $lastname"; ?></h1>
        <h2>Student Full Stack Developer</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <br>
            Ut enim ad minim veniam, quis nostrud exercitation ullamco
            laboris nisi ut aliquip ex ea commodo consequat. <br>
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. <br>
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
        <ul>
            <li><a href="https://www.instagram.com/anouckgaloppin/" target="_blank" title="Anouck's Instagram-profiel">Instagram: anouckgaloppin</a></li>
            <li><a href="https://www.facebook.com/anouck.galoppin/" target="_blank" title="Anouck's Facebook-profiel">Facebook: Anouck Galoppin</a></li>
            <li><a href="mailto:anouck.galop@hotmail.com?subject=Contact through website" target="_blank" title="Anouck's emailadres">Email: anouck.galop@hotmail.com</a></li>
        </ul>
    </main>
    <footer>
        <hr>
        <p>
            <small>&copy; Copyright 2024 by <?php print "$firstname $lastname"; ?></small>
        </p>
    </footer>
</body>

</html>