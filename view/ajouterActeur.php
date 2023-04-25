<?Php
ob_start();

?>

<form enctype='multipart/from-data' action="index.php?action=ajouterActeur" method="post">
<label for="nom"></label>
    <input type="text" name="nom" id="nom" required> 



</form>
<?php

$titre = "Ajouter acteur/réalisateur";
$titre_secondaire = "Ajouter un acteur/réalisateur";
$contenu = ob_get_clean();
require "view/template.php";

?>