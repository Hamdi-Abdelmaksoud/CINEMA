<?Php

ob_start();
$realisateurs = $requete->fetchAll();
$genres = $requeteGenre->fetchAll();
?>

<form class="btn btn-secondary"  enctype='multipart/from-data' action="index.php?action=ajouterFilm" method="post">

    <input  type="text" name="titre" id="titre" required placeholder="   Titre de film" value="Film de test">
    <input type="date" name="annee_sortie_fr" id="anne" required placeholder="    anne de sortie" value="2020-01-01">
    <input type="number" name="duree" id="duree" min='10' required placeholder="   durée" value="100">
    <input type="text" name="resume" id="resume" required minlength="10" placeholder="   resmuer" value="aaaaaaaaaa">
    <input type="number" id="note" name="note" min='0' max='5' placeholder="  note" value="4">
    <!-- <label for="file">Fichier</label>
        <input type="file" name="img"> -->
    <select name="realisateur">
        <?php
        foreach ($realisateurs as $realisateur) { ?>
            <option value="<?= $realisateur['id_personne'] ?>"><?= $realisateur["person"] ?></option>

        <?php } ?>
    </select>
    <select name=genre>
        <?php foreach ($genres as $genre) { ?>
            <option value="<?= $genre["id_genre"] ?>"><?= $genre["libelle"] ?></option>
        <?php } ?>
    </select>
    <button class="btn btn-secondary" type="submit" name="ajoutFilm">
    Ajouter le film
</button>
</form>

<?php
if (isset($_SESSION['message'])) {
    echo '<div id="message"class="alert alert-danger">' . $_SESSION['message'] . '</div>';
    unset($_SESSION['message']);
    echo '<script>setTimeout(function() {document.getElementById("message").remove()}, 3000);</script>';
 }//afficher un message si le film est déja enregistré dans la base
 else{
    echo '<div id="message" "class=alert alert-success"><i class="fa-solid fa-check" style="color: #07a61a;"></i>film ajouté</div>';
    echo '<script>setTimeout(function() {document.getElementById("message").remove()}, 3000);</script>';
 }//message de success d'ajout
$titre = "Ajouter un film";
$titre_secondaire = "Ajouter un film";
$contenu = ob_get_clean();
require "view/template.php";

?>