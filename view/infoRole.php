<?php
ob_start();
$titre = $requeterole->fetch(); //pn récupére nom de personnage (role)
$role = $requete->fetchAll(); //on récupére les donées d'un role 
?>
<h1><?= $titre["nom_personnage"] ?></h1>
</h3>
liste des acteurs qui ont joué ce role : <h3>
    <?php
    foreach ($role as $cast) {
        echo "
    <table>
    <tr>
    <td>" . '<a href="index.php?action=infoActeur&id=' . $cast["id_acteur"] . '">' . $cast["nom"] . "</a> ("
            . '<a href="index.php?action=infofilm&id=' . $cast["id_film"] . '">' . $cast['titre'] . "</a>)</td>
    <tr>
    
    </table>";/*afficher les acteurs qui ont joué ce role et les films .les acteurs et les films sont des liens vers index.php.on envoi avec chacun son id */
    }
    ?>
    <?php
    $titre = "Information role";
    $titre_secondaire = "Liste des acteurs";
    $contenu = ob_get_clean();
    require "view/template.php"; ?>