<?php

ob_start();
$genre = $requete->fetchAll();
$type = $requetelibelle->fetch();
if ($requete->rowCount() > 0) { ?>

    <p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount() ?> films de type <?= $type["libelle"] ?></p>
    <?php

    foreach ($genre as $film) { ?>
        <a href="index.php?action=infofilm&id=<?= $film["id_film"] ?>"><?= $film["titre"] . "</a> sorti le " . $film["annee_sortie_fr"] . "<br>" ?>
    <?php }
} else {
    echo "<p>pas de films de ce genre pour le moment</p>";
} ?>



    <table class="uk-table uk-table-striped">

        <?php
        $titre = "Films";
        $titre_secondaire = "Liste des films par genre";
        $contenu = ob_get_clean();
        require "view/template.php"; ?>