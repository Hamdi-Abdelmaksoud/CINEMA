<?php

ob_start(); 
$titre=$requeterole->fetch();
$role=$requete->fetchAll();

?>
<h1><?=$titre["nom_personnage"]?></h1>
</h3>
liste des acteurs qui ont joué ce role : <h3>
    <?php
foreach($role as $cast)
{
    echo "
    <table>
    <tr>
    <td>".'<a href="index.php?action=infoActeur&id='.$cast["id_acteur"].'">'.$cast["nom"]."</a> ("
    .'<a href="index.php?action=infofilm&id='.$cast["id_film"].'">'.$cast['titre']."</a>)</td>
    <tr>
    
    </table>";
    
}
?>

<?php
$titre = "Information role";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "view/template.php"; ?>



 