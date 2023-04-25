<?Php
ob_start();

?>

<form enctype='multipart/from-data' action="index.php?action=ajouterPersonne" method="post">

    <label for="nom"></label>
    <input type="text" name="nom" id="nom" required>
    <input type="text" name="prenom" id="prenom" required>
    <input type="date" name="date_naissance" id="naissance" required>
    <select name="sexe" id="sexe">
        <option value='h'>Homme</option>
        <option value='f'>Femme</option>
    </select>
    <input type="submit" name="ajoutpersonne" value="Ajouter un acteur/réalisateur">
</form>
<?php

$titre = "Ajouter acteur/réalisateur";
$titre_secondaire = "Ajouter un acteur/réalisateur";
$contenu = ob_get_clean();
require "view/template.php";

?>