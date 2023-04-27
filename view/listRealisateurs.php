<?php

ob_start(); ?>

<p class="uk-label uk-label-warning" style="font-weight: bold;">Il y a <?= $requete->rowCount() ?> realisateurs :</p>
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
        foreach ($requete->fetchAll() as $realisateur) { ?>
            <tr>
                <td><?= $realisateur["nom"]?></td>
                <td><?= $realisateur["prenom"]?></td>
                <td><a href="index.php?action=infoRealisateur&id=<?=$realisateur['id_realisateur']?>"><i class="fa-solid fa-info" style="color: #ffffff;"></i></td>
                
            </tr>
        <?php } ?>

    </tbody>
  
    <td colspan="3"><a  style='text-decoration:none;' href="index.php?action=ajouterRealisateur"><i class="fa-solid fa-circle-plus" style="color: #149924;"></i>  <span style="color:white">ajouter un realisateur</span></a>
    </td>
</table>

<?php
$titre = "Liste des realisateurs";
$titre_secondaire = "Liste des realisateurs";
$contenu = ob_get_clean();
require "view/template.php"; ?>