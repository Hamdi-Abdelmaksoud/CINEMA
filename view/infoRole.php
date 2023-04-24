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
    <td>".$cast["nom"]."(".$cast['titre'].")</td>
    <tr>
    
    </table>";
}
?>
<?php
$titre = "Information role";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "view/template.php"; ?>



 