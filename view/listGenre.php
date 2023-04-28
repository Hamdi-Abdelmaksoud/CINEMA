<?php

ob_start(); //Cette fonction démarre un tampon de sortie de sortie de bufferisation de sortie PHP qui permet de stocker la sortie dans une variable plutôt que de l'afficher immédiatement.
$genres=$requete->fetchAll();

?>
<table class="uk-label uk-label-warning" style="font-weight: bold;">
<thead>
        <tr>
            <th>genre</th>
            
        </tr>
    </thead>
    <tbody>
        <?php foreach($genres as $genre){?>
            <tr>
            <td><a href="index.php?action=genre&id=<?= $genre["id_genre"] ?>"><?=$genre["libelle"]?> </td></p><?php }?>
            </tr>
            <tbody>
                </table>
 <?php
$titre = "Liste des genres";
$titre_secondaire = "Gernes";
$contenu = ob_get_clean();
require "view/template.php"; ?>