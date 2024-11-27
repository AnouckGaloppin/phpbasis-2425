<?php
include('db.php');
$members = getMembers();

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

?>

<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
</head>

<body>
    <main>
        <section id="overview">
            <header>
                <h2>Gebruikers</h2>
            </header>
            <table>
                <thead>
                    <tr>
                        <th>Voornaam</th>
                        <th>Achternaam</th>
                        <th>Gebruikersnaam</th>
                        <th>Geslacht</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($members as $member): ?>
                        <tr>
                            <td><?= $member['firstname']; ?></td>
                            <td><?= $member['lastname']; ?></td>
                            <td><?= $member['username']; ?></td>
                            <td><?= $member['gender']; ?></td>

                            <td>
                                <form method="post" action="admin.php">
                                    <input type="hidden" id="id" name="memberId" value="<?= $member['id']; ?>">
                                    <button type="submit" name="delete">Verwijder</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

    </main>
</body>


</html>