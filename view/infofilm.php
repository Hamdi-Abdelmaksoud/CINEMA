<?php

ob_start();
$film = $requete->fetch();
$casting = $requeteCasting->fetchAll();
$genre=$requeteClasser->fetch();


?>

<h1><?= $film["titre"] ?></h1>
<h3><?=$genre["libelle"]?></h3>
<p>Année de sortie : <?= $film["annee_sortie_fr"] ?></p>

<p> <?php
     foreach ($casting as $acteur) {
          echo '<a href="index.php?action=infoActeur&id=' . $acteur["id_acteur"] . '">- ' . $acteur["prenom"] . ' ' . $acteur["nom"] . '</a><br>';
     } ?></p>

<?php
$titre = "Liste des acteurs";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "view/template.php"; ?>