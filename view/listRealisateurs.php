<?php

ob_start();
$realisateurs=$requete->fetchAll() ?>

<p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount() ?> réalisateurs</p>

      <?php foreach($realisateurs as $realisateur) 
      {?>
<a href="index.php?action=listRealisateurs&id=<?=$realisateur['id_realisateur']?>"><?=$realisateur['nom']?></a>
      <?php } ?>      
<?php
$titre = "Liste des réalisateurs";
$titre_secondaire = "Liste des réalisateurs";
$contenu = ob_get_clean();
require "view/template.php"; ?>