<?php

ob_start();//Cette fonction démarre un tampon de sortie de sortie de bufferisation de sortie PHP qui permet de stocker la sortie dans une variable plutôt que de l'afficher immédiatement.
?>

<p class="uk-label uk-label-warning">Il y a <?=$requete->rowCount()?>films</p><!--le nombre de films dans la requête à l'aide de la fonction rowCount() -->
<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>TITRE</th>
            <th>ANNE SORTIE</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach($requete->fetchAll() as $film){?><!--fletchAll() pour obtenir plusieurs ligne-->
        <tr>
            <td><?= $film["titre"]?></td> <!--Cette ligne affiche le titre du film stocké dans la variable $film.-->
            <td><?= $film["annee_sortie_fr"]?></td>
        </tr>
        <?php } ?>
        
    </tbody>
</table>

<?php
$titre="Liste des films";
$titre_secondaire="Liste des films";
$contenu=ob_get_clean();
require "view/template.php";?><!-- Cette ligne charge le template de la page qui contient le code HTM -->


