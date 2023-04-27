<?php

ob_start(); ?>

<p class="uk-label uk-label-warning" style="font-weight: bold;">Il y a <?= $requete->rowCount() ?> acteurs :</p>
<table class="table table-dark" style="max-width:300px">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>info</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($requete->fetchAll() as $acteur) { ?>
            <tr>
                <td><?= $acteur["nom"]?></td>
                <td><?= $acteur["prenom"]?></td>
                <td><a href="index.php?action=infoActeur&id=<?=$acteur['id_acteur']?>"><i class="fa-solid fa-info" style="color: #ffffff;"></i></td>
                
            </tr>
        <?php } ?>
        <td colspan="3"><a class="dropdown-item text-light bg-dark " href="index.php?action=ajouterActeur"><i class="fa-solid fa-circle-plus" style="color: #149924;"></i>  <span style="color:white">ajouter un acteur</span></a>
    </td>
    </tbody>
</table>

<?php
$titre = "Liste des acteurs";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "view/template.php"; ?>