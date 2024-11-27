<?php
require('data.php');

$errors = [];

if (@$_POST['submit']) {
    if (!isset($_POST['url'])) {
        $errors[] = "url field missing...";
    } else {
        $url = $_POST['url'];
    }
    if (!isset($_POST['description'])) {
        $errors[] = "description field is missing...";
        if (strlen($_POST['description'] < 3)) {
            $errors[] = "description is too short...";
        } else {
            $description = $_POST['description'];
        }
    }
    if (!isset($_POST['link'])) {
        $errors[] = "link field missing...";
    } else {
        $link = $_POST['link'];
    }
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>

<body>
    <main>
        <form method="post" action="form.php">
            <label for="url" name="url">Image URL:</label>;
            <input type="text" name="url" id="url" value="<?= $url ?>">;

            <label for="description">Description:</label>
            <input type="textarea" name="description" id="description"><?= $description ?>

            <label for="link">Link:</label>
            <input type="text" name="link" id="link" value="<?= $link ?>">

            <input type="submit" name="submit" value="submit">
        </form>
    </main>
</body>

</html>