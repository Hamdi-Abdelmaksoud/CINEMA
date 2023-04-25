<?php

namespace Controller;

use Model\Connect;

class GenreController
{
    public function AjouterGenre()
    {
        if (isset($_POST["ajoutGenre"])) {
            $genre = filter_input(INPUT_POST, "nom_genre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if ($genre) {
                $pdo = Connect::seConnecter();
                $requete = $pdo->prepare(
                    "INSERT INTO genre(libelle) VALUES (:libelle)"
                );
                $requete->execute(['libelle' => $genre]);
            }
        }

        require "view/ajouterGenre.php";
    }
}
