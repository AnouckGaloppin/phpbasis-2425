<?php
require('data.php/data.php');
$id = @$_GET['id'];

if (!isset($photos[$id])) {
    header("HTTP/1.0 404 Not Found");
    header('Location: index.php');
    exit;                 // Deze exit is zeer belangrijk!
}

$photo = $photos[$id];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lego - detailpagina</title>
</head>

<body>
    <main>
        <section id="section-1">
            <header>
                <h2>Details lego</h2>
            </header>
            <img src="<?php echo $photo['url']; ?>" />
            <?php if ($photo['description'] != NULL) { ?>
                <p>Description: <?php echo $photo['description']; ?></p>
            <?php } ?>
            <?php if ($photo['user']['name'] != NULL) { ?>
                <p>Photograph: <a href="<?php echo $photo['user']['link'] ?>"><?php echo $photo['user']['name'] ?></a></p>
            <?php } ?>
            <?php if ($photo['likes'] != NULL) { ?>
                <p>Likes: <?php echo $photo['likes'] ?></p>
            <?php } ?>
            <?php if ($photo['link'] != NULL) { ?>
                <p>Link: <a href="<?php echo $photo['link'] ?>"> <?php echo $photo['link'] ?></p>
            <?php } ?>
            </p>
        </section>
    </main>

</body>

</html>