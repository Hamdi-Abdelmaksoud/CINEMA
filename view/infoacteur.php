<?php

ob_start(); 
$acteur = $requete->fetch();
$films=$requeteFilmo->fetchAll()



?>
<h1><?= $acteur["nom"] ?></h1>

<p> <?= $acteur["date_naissance"]?></p>
<p><?php foreach($films as $film){
    echo '<a href="index.php?action=infofilm&id=' . $film["id_film"].'">'.$film['titre']."</a> <br>";
    echo '<a href="index.php?action=infoRole&id='.$film["id_role"].'".>'.$film["nom_personnage"]."</a>"; 
    
    }?></p>

<?php
$titre = "Liste des acteurs";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "view/template.php"; ?>