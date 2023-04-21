<?php

ob_start(); ?>

<p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount() ?> films de type </p>
<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>Titre</th>
            <th>annee_sortie_fr</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($requete->fetchAll() as $genre) { ?>
            <tr>
                <td><?= $genre["titre"] ?></td>
                <td><?= $genre["annee_sortie_fr"] ?></td>
               
            </tr>
        <?php } ?>

    </tbody>
</table>

<?php
$titre = "Films";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "view/template.php"; ?>