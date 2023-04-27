<?Php
ob_start();

?>
<h3>AJouter un role</h3>

<form enctype='multipart/from-data' action="index.php?action=ajouterRole" method="post">

    <label for="nom_role"></label>
    <input type="text" name="nom_role" id="nom_role" required>
    <input type="submit" name="ajoutRole" value="Ajouter le role">
</form>
<a href="index.php?action=affecterRole">Affecter un role à un acteur</a>
<?php

$titre = "Ajouter un rôle";
$titre_secondaire = "Ajouter un rôle";
$contenu = ob_get_clean();
require "view/template.php";

?>