<?Php
ob_start();

?>


<form enctype='multipart/from-data' action="index.php?action=ajouterGenre" method="post">

    <label for="nom_role"></label>
    <input type="text" name="nom_genre" id="nom_genre" required>
    <input type="submit" name="ajoutGenre" value="Ajouter Genre">
</form>
<?php

$titre = "Ajouter un genre";
$titre_secondaire = "Ajouter un genre";
$contenu = ob_get_clean();
require "view/template.php";

?>