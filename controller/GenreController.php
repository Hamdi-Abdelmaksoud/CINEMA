<?php

namespace Controller;

use Model\Connect;

class GenreController
{
    public function listGenre()
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("SELECT libelle,id_genre FROM genre 
        ");
        require "view/listGenre.php";
    }
    public function genre($id)
    {

        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT f.titre,f.annee_sortie_fr,f.id_film
        FROM   film f
        INNER JOIN classer c ON c.id_film = f.id_film
        WHERE c.id_genre=:id_genre");
        $requete->execute(["id_genre" => $id]);
        $requetelibelle = $pdo->prepare(
            "
        SELECT DISTINCT g.libelle
        FROM   genre g
        INNER JOIN classer c ON c.id_genre = g.id_genre
        WHERE c.id_genre=:id_genre"
        );
        $requetelibelle->execute(["id_genre" => $id]);
        require "view/genre.php";
    }
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
