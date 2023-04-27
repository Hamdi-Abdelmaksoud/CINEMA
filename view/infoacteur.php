<?php

ob_start();
$acteur = $requete->fetch();//on récupére les infos d'un acteur
$films = $requeteFilmo->fetchAll();//on récupére les films d'un acteur



?>


<p> date de naissance : <?= $acteur["date_naissance"] ?></p>
<h3>Filmographie :</h3>
<table class="table table-dark">
<thead>

<th>Film</th>
<th>Role</th>
</thead>
<tbody>
<tr><?php foreach ($films as $film) {
    echo '<td><a class="badge badge-light"  href="index.php?action=infofilm&id=' . $film["id_film"] . '">' . $film['titre'] . "</a> </td>";
    //afficher le titre de film qui sont des liens vers infofilm.on envoi id film avec le lien
    echo '<td><a class="badge badge-light" href="index.php?action=infoRole&id=' . $film["id_role"] . '".>' .$film["nom_personnage"] . "</a></td></tr>";
    //afficher le titre de role qui est uun lien vers inforole.on envoi id film avec le lien
} ?>

<tbody></table>
    

<?php
$titre = "infocteur";
$titre_secondaire =$acteur['nom'];
$contenu = ob_get_clean();
require "view/template.php"; ?>