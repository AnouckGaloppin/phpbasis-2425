<?php
include('db.inc.php');
$tasks = getTasks();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Todo app</title>
    <!-- <link rel="stylesheet" href="todo.css"> -->
    <style>
        ul.error {
            background-color: red;
            color: white;
        }
    </style>
</head>

<body>
    <main>
        <section id="overview">
            <header>
                <h2>Taken</h2>
            </header>
            <ul>
                <?php foreach ($tasks as $task): ?>
                    <li>
                        <?= $task['name']; ?>
                        <form method="post" action="todo.php">
                            <input type="hidden" id="taakId" name="taakId" value="<?= $task['id']; ?>">
                            <button type="submit">Markeer als klaar</button>
                        </form>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>

        <section id="addForm">
            <form method="post" action="todo.php">
                <header>
                    <h2>Toevoegen</h2>
                </header>
                <?php if (count($errors)): ?>
                    <ul class="error">
                        <?php foreach ($errors as $error): ?>
                            <li><?= $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <label for="taak">Taak:</label>
                <input type="text" id="taak" name="taak" size="20" placeholder="Voeg hier een taak toe...">

                <button type="submit">Voeg toe</button>
            </form>
        </section>
    </main>
</body>

</html>