<?php
require('wikis.php');

$index = @$_GET['id'];
$g = @$_GET['g'];

if ($g) {
    $guesses = [];
}
$guesses = explode(',', $g);

if (!isset($wikis[$index])) {
    header("HTTP/1.0 404 Not Found");
    header('Location: index.php');
    exit; //belangrijke exit!
}

$wiki = $wikis[$index];

include($wiki['data']);

$allowed_words = ['in', 'de', 'door', 'het', 'is', 'een'];
$allowed_words = array_merge($allowed_words, $guesses);

$text_parts = explode(' ', $text);

function custom_in_array($needle, $haystack)
{
    return in_array(strtolower($needle), array_map('strtolower', $haystack));
}

for ($i = 0; $i < count($text_parts); $i++) {
    if (!in_array($text_parts[$i], $allowed_words)) {
        $len = strlen($text_parts[$i]);
        $text_parts[$i] = str_repeat('*', $len);
    }
}

$text = implode(' ', $text_parts);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="https://via.placeholder.com/70x70">
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">
    <meta charset="utf-8">
    <meta name="description" content="My description <?= $wiki['episode']; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WikiWisKwis - <?= $wiki['episode']; ?></title>
</head>

<body>
    <main>
        <section>
            <header>
                <h2>WikiWisKwis - <?= $wiki['episode']; ?></h2>
            </header>
            <ul>
                <?php foreach ($guesses as $guess): ?>
                    <li><?= $guess; ?></li>
                <?php endforeach ?>
            </ul>
            <?= $text; ?>
        </section>
    </main>
</body>

</html>