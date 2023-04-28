<?Php
ob_start();
$realisateurs=$requete->fetchAll();


?>

<form enctype='multipart/from-data' action="index.php?action=ajouterRealisateur" method="post">

    <select name="realisateur">
        <?php foreach($realisateurs as $realisateur){?>
<option value="<?=$realisateur['id_personne']?>"><?=$realisateur["nom"]?></option>
<!--le value c'est l'id personne pour que on l'affect à le nouveau realisateur et l'affiche concatinatio du nom avec prenom as nom-->
<?php }?>

    </select>

    <input type="submit" name="ajouterRealisateur" value="Ajouter le realisateur">
    <!--lorsque on clique sur ce bouton : isset ajouter realisateur dans ajouter film cinema ctrl devient true -->

</form>
<?php

$titre = "Ajouter realisateur";
$titre_secondaire = "Ajouter un realisateur";
$contenu = ob_get_clean();
require "view/template.php";

?> 