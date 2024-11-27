<?php
include('data.php');
?>
<!DOCTYPE html>
<html lang="en" data-lt-installed="true">

<head>
    <link rel="icon" href="https://via.placeholder.com/70x70">
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">

    <meta charset="utf-8">
    <meta name="description" content="My description">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cats cats cats</title>
</head>

<body>
    <main>
        <section id="section-1">
            <header>
                <h2>Overzicht katten</h2>
                <p>Mijn katten van unsplash</p>
            </header>

            <?php
            foreach ($photos as $index => $photo) { ?>
                <aside>
                    <a href="cats_detail.php?id=<?php echo $index; ?>">
                        <img src="<?php echo $photo; ?>" />
                    </a>
                </aside>
            <?php
            }
            ?>
        </section>
    </main>

</body>

</html>