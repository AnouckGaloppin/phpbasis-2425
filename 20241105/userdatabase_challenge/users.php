<?php
include('db.php');
$members = getMembers();

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Members</title>
    <style>
        ul.error {
            background-color: red;
            color: white;
        }
    </style>
</head>

<body>
    <main>
        <section id="addForm">
            <form method="post" action="users.php">
                <header>
                    <h2>Formulier</h2>
                </header>
                <?php if (count($errors)) {
                ?>
                    <ul class="error">
                        <?php foreach ($errors as $error): ?>
                            <li><?= $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php } elseif (@$_POST != null) {
                    echo 'Nieuwe gebruiker toegevoegd!';
                } ?>


                <label for="firstname">Voornaam:</label>
                <input maxlength="100" type="text" id="firstname" value="<?= @$firstname; ?>" name="firstname" size="20" placeholder="Schrijf je voornaam...">
                <label for="lastname">Naam:</label>
                <input type="text" id="lastname" name="lastname" size="20" placeholder="Schrijf je naam...">
                <label for="username">Gebruikersnaam:</label>
                <input type="text" id="username" name="username" size="20" placeholder="Schrijf je gebruikersnaam...">
                <label for="gender">Geslacht:</label>


                <label for="m">m</label>
                <input type="radio" id="gender_m" name="gender" value="m" <?= (@$_POST['gender'] == 'm' ? 'checked' : ''); ?>>
                <label for="f">f</label>
                <input type="radio" id="gender_f" name="gender" value="f" <?= (@$_POST['gender'] == 'f' ? 'checked' : ''); ?>>
                <label for="x">x</label>
                <input type="radio" id="gender_x" name="gender" value="x" <?= (@$_POST['gender'] == 'x' ? 'checked' : ''); ?>>

                <button id="verzenden" name="verzenden" type="submit">Voeg toe</button>
            </form>
        </section>


    </main>
</body>

</html>