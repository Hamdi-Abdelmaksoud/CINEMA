<?php

namespace Controller;

use Model\Connect;

class CinemaController
{
    /**
     * Lister les films
     */
    public function listFilms()
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT id_film, titre, annee_sortie_fr FROM film");
        require "view/listFilms.php";
    }

    public function listActeurs()
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT * 
        FROM  personne p
        INNER JOIN acteur a ON a.id_personne = p.id_personne");
        require "view/listActeurs.php";
    }
    public function listRealisateurs()
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT * 
        FROM  personne p
        INNER JOIN realisateur r ON r.id_personne = p.id_personne");
        require "view/listRealisateurs.php";
    }
    public function infofilm($id)
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT f.titre,f.annee_sortie_fr 
            FROM film f
            WHERE f.id_film = :id_film");

        $requete->execute(["id_film" => $id]);

        $requeteCasting = $pdo->prepare("
        SELECT CONCAT(p.nom,' ',p.prenom) FROM film
INNER JOIN jouer  j ON j.id_film=film.id_film
INNER JOIN acteur a ON a.id_acteur=j.id_acteur
INNER JOIN personne p ON p.id_personne=a.id_personne
WHERE film.id_film= :id_film");
        $requeteCasting->execute(["id_film" => $id]);

        require "view/infofilm.php";
    }

    // public function genre()
    // {
    //     $selected_genre = $_GET['genre'];
    //     $pdo = Connect::seConnecter();
    //     $requete = $pdo->query("
    //     SELECT titre,annee_sortie_fr
    //     FROM   film f
    //     INNER JOIN classer c ON c.id_film = f.id_film
    //     INNER JOIN genre g ON g.id_genre = c.id_genre
    //     WHERE g.libelle=:$selected_genre");
    //     require "view/genre.php"; 
    // }
}
