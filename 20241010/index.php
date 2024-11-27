<?php
require('wikis.php');

$wikis = array_reverse($wikis, true);

//Onderstaande geeft de php uit wikis.php weer in de browser. Handig voor tijdens het programmeren.
// print '<pre>';
// print_r($wikis);
// print '<pre>';
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="https://via.placeholder.com/70x70">
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">
    <meta charset="utf-8">
    <meta name="description" content="My description">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WikiWisKwis</title>
</head>

<body>
    <main>
        <section>
            <header>
                <h1>WikiWisKwis - Overzicht</h1>
            </header>
            <table>
                <thead>
                    <tr>
                        <th>Datum</th>
                        <th>Titel</th>
                        <th>Tip</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($wikis as $index => $wiki): ?>
                        <tr>
                            <td><b><?php echo $wiki['episode']; ?></b></td>
                            <td><?php echo $wiki['title']; ?></td>
                            <td><?php echo $wiki['tip']; ?></td>
                            <td><a href="detail.php?id=<?= $index ?>">Speel nu</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>

</body>

</html>