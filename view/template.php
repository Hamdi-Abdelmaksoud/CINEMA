<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titre ?></title>
</head>

<body>
    <nav>
        <ul>
            <li>
                <a href="index.php?action=listFilms">Liste des films</a>
            </li>
            <li>
                <a href="index.php?action=listActeurs">Liste des acteurs</a>
            </li>
            <li>
                <a href="index.php?action=listRealisateurs">Liste des realisateurs</a>
            </li>
            <li>
                <a href=""></a>
            </li>
        </ul>
    </nav>
    <h1><?= $titre_secondaire ?></h1>

    <main>
        <?= $contenu ?>
    </main>
</body>

</html>