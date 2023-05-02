<?php

ob_start(); //Cette fonction démarre un tampon de sortie de sortie de bufferisation de sortie PHP qui permet de stocker la sortie dans une variable plutôt que de l'afficher immédiatement.
$genres=$requete->fetchAll();

?>
<table class="table table-dark"style="font-weight: bold;max-width :15 0px;">
 
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