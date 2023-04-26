<?php

ob_start();
$acteur = $requete->fetch();//on récupére les infos d'un acteur
$films = $requeteFilmo->fetchAll();//on récupére les films d'un acteur



?>
<h1><?= $acteur["nom"] ?></h1>

<p> <?= $acteur["date_naissance"] ?></p>
<p><?php foreach ($films as $film) {
        echo '<a href="index.php?action=infofilm&id=' . $film["id_film"] . '">' . $film['titre'] . "</a> <br>";
        //afficher le titre de film qui sont des liens vers infofilm.on envoi id film avec le lien
        echo '<a href="index.php?action=infoRole&id=' . $film["id_role"] . '".>' . $film["nom_personnage"] . "</a>";
        //afficher le titre de role qui est uun lien vers inforole.on envoi id film avec le lien
    } ?></p>

<?php
$titre = "infos acteur";
$titre_secondaire = "info acteur";
$contenu = ob_get_clean();
require "view/template.php"; ?>