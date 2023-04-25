<?Php
ob_start();
$realisateurs = $requete->fetchAll();
?>

<form enctype='multipart/from-data' action="index.php?action=ajouterActeur" method="post">

    <input type="text" name="titre" id="titre" required> 
    <input type="date" name="anne" id="anne" required> 
    <input type="text" name="resume" id="resume" required minlength="10"> 
    <input type="number" id="note" name="note" min='0' max='5'>
    <select>
        <?php
    foreach ($realisateurs as $realisateur) { ?>
            <option><?=  ?></option>
        
        <?php } ?>
    </select>
</form>
<?php

$titre = "Ajouter acteur/réalisateur";
$titre_secondaire = "Ajouter un acteur/réalisateur";
$contenu = ob_get_clean();
require "view/template.php";

?>