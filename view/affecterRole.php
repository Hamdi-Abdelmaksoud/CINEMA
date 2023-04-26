<?Php
ob_start();
$films = $requeteFilm->fetchAll();
$acteurs = $requeteActeur->fetchAll();
$roles = $requeteRole->fetchAll();
?>
<form enctype='multipart/from-data' action="index.php?action=affecterRole" method="post">
    <select name="acteur">
        <?php foreach ($acteurs as $acteur) { ?>
            <option value="<?= $acteur['id_acteur'] ?>"><?= $acteur["nom"] ?></option>
            <!--le value c'est l'id acteur  qu'on va l'affecter un role-->
        <?php } ?>
    </select>
    <select name="film">
        <?php foreach ($films as $film) { ?>
            <option value="<?= $film['id_film'] ?>"><?= $film["titre"] ?></option>
            <!--le value c'est l'id film dans lequel on va affecter un role-->
        <?php } ?>
    </select>
    <select name="role">
        <?php foreach ($roles as $role) { ?>
            <option value="<?= $role['id_role'] ?>"><?= $role["nom_personnage"] ?></option>
            <!--le value c'est l'id role qu'on va le donner -->
        <?php } ?>
    </select>
    <input type="submit" name="affecterRole" value="Affecter le role">
    <!--lorsque on clique sur ce bouton : isset affecter role dans role controller devient true -->
</form>
<?php
$titre = "Affecter un role";
$titre_secondaire = "Ajouter un role";
$contenu = ob_get_clean();
require "view/template.php";
?>