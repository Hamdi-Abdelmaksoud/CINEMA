<?php

ob_start();
$film = $requete->fetch();
$casting = $requeteCasting->fetchAll();
$genre = $requeteClasser->fetch();
$realisateur=$requeteRealisateur->fetch();

?>
<h1><?= $film["titre"] ?></h1>
<h3><a href="index.php?action=genre&id=<?= $genre["id_genre"] ?>"><?=$genre["libelle"]?> </a></h3>
<p>Année de sortie : <?= $film["annee_sortie_fr"] ?></p>
<p>réaliser par : <?=$realisateur["nom"]?></p>

<p> castings :<?php
     foreach ($casting as $acteur) {?>
          <a href="index.php?action=infoActeur&id=<?=$acteur['id_acteur']?>"><?= $acteur["prenom"] . ' ' . $acteur["nom"] ?> </a><br>
    <?php }?> </p>

<?php
$titre = "FILMS";
$titre_secondaire = "Liste des films";
$contenu = ob_get_clean();
require "view/template.php"; ?>