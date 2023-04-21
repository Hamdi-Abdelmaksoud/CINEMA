<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
ob_start();?>
<p class="uk-label uk-label-warning">Il y a <?=$requete->rowCount()?>films</p>
<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>TITRE</th>
            <th>ANNE SORTIE</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach($requete->fetchAll() as $film){?>
        <tr>
            <td><?= $film["titre"]?></td>
            <td><?= $film["anne_sortie_fr"]?></td>
        </tr>
        <?php } ?>
        
    </tbody>
</table>
<?php
$titre="Liste des films";
$titre_secondaire="Liste des films";$contenu=ob_get_clean();
require "view/template.php";?>
</body>
</html>