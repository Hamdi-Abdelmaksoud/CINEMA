<?php

ob_start();
$realisateur = $requete->fetch();//on récupére les infos d'un realisateur
$films = $requeteFilmo->fetchAll();//on récupére les films d'un realisateur



?>
<h1><?= $realisateur["nom"] ?></h1>

<p> <?= $realisateur["date_naissance"] ?></p>
<p><?php foreach ($films as $film) {
        echo '<a href="index.php?action=infofilm&id=' . $film["id_film"] . '">' . $film['titre'] . "</a> <br>";
        //afficher le titre de film qui sont des liens vers infofilm.on envoi id film avec le lien
    
    } ?></p>

<?php
$titre = "info realisateur";
$titre_secondaire = "info realisateur";
$contenu = ob_get_clean();
require "view/template.php"; ?>