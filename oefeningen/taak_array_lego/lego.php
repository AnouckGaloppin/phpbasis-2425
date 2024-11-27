<?php
require('data.php/data.php');
?>
<!DOCTYPE html>
<html lang="en" data-lt-installed="true">

<head>
    <link rel="icon" href="https://via.placeholder.com/70x70">
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">

    <meta charset="UTF-8">
    <meta name="description" content="My description">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lego - Mainpage</title>
</head>

<body>
    <main>
        <section id="section-1">
            <header>
                <h1>Lego</h1>
                <h2>Totaal: 30 foto's</h2>
            </header>

            <?php
            foreach ($photos as $index => $photo) { ?>
                <aside style="background-color: <?php echo $photo['color'] ?>">
                    <a href="lego_detail.php?id=<?php echo $index; ?>">
                        <img src="<?php echo $photo['url']; ?>" />
                    </a>
                </aside>
            <?php
            }
            ?>
        </section>
    </main>

</body>

</html>