<?Php
ob_start();
$acteurs=$requete->fetchAll();


?>

<form enctype='multipart/from-data' action="index.php?action=ajouterActeur" method="post">

    <select name="acteur">
        <?php foreach($acteurs as $acteur){?>
<option value="<?=$acteur['id_personne']?>"><?=$acteur["nom"]?></option>
<!--le value c'est l'id personne pour que on l'affect à le nouveau acteur et l'affiche concatinatio du nom avec prenom as nom-->
<?php }?>
    </select>

    <input type="submit" name="ajouterActeur" value="Ajouter l'acteur">
    <!--lorsque on clique sur ce bouton : isset ajouterActeur dans ajouter film cinema ctrl devient true -->

</form>
<?php

$titre = "Ajouter acteur";
$titre_secondaire = "Ajouter un acteur";
$contenu = ob_get_clean();
require "view/template.php";

?> 