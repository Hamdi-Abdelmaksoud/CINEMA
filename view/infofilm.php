<?php

ob_start(); 
$film = $requete->fetch();

?>

<h1><?= $film["titre"] ?></h1>
<p>Année de sortie : <?= $film["annee_sortie_fr"] ?></p>
<p> : <?= $film["annee_sortie_fr"] ?></p>

<?php
$titre = "Liste des acteurs";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "view/template.php"; ?>