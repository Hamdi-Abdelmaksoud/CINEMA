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
        SELECT titre, annee_sortie_fr FROM film");
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
}
