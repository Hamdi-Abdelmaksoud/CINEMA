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
        SELECT CONCAT(p.nom,'-',p.prenom) AS nom,r.id_realisateur,p.date_naissance
        FROM  personne p
        INNER JOIN realisateur r ON r.id_personne = p.id_personne");
        require "view/listRealisateurs.php";
    }
    public function infoRealisateur()
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT *
        FROM  personne p
        INNER JOIN realisateur r ON r.id_personne = p.id_personne
        WHERE r.id_realisateur=:id_realisateur");
        $requete->execute(["id_realisateur="]);
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
        SELECT p.nom,p.prenom,a.id_acteur FROM film
        INNER JOIN jouer  j ON j.id_film=film.id_film
        INNER JOIN acteur a ON a.id_acteur=j.id_acteur
        INNER JOIN personne p ON p.id_personne=a.id_personne
        WHERE film.id_film= :id_film");
        $requeteCasting->execute(["id_film" => $id]);
        $requeteClasser = $pdo->prepare("
        SELECT g.libelle,c.id_genre FROM genre g
INNER JOIN classer c ON c.id_genre=g.id_genre
WHERE c.id_film=:id_film
        
        ");
        $requeteClasser->execute(["id_film" => $id]);
        $requeteRealisateur = $pdo->prepare(
            "   
            SELECT f.id_realisateur,CONCAT(p.nom,'-',p.prenom) As nom
            FROM   film f
            INNER JOIN realisateur r ON r.id_realisateur = f.id_realisateur
            INNER JOIN personne p ON p.id_personne=r.id_personne
            WHERE f.id_film=:id_film"
        );
        $requeteRealisateur->execute(["id_film" => $id]);

        require "view/infofilm.php";
    }
    public function infoActeur($id)
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT concat(p.nom,'-',p.prenom)as nom,p.date_naissance,a.id_acteur 
        FROM  acteur a
        INNER JOIN personne p ON p.id_personne=a.id_personne
        WHERE a.id_acteur = :id_acteur");
        $requete->execute(["id_acteur" => $id]);
        $requeteFilmo = $pdo->prepare("
        SELECT f.titre, r.nom_personnage , f.annee_sortie_fr,f.id_film,r.id_role
        FROM film f
        INNER JOIN jouer j ON f.id_film = j.id_film
        INNER JOIN acteur a ON j.id_acteur = a.id_acteur
        INNER JOIN role r ON j.id_role = r.id_role
        WHERE a.id_acteur = :id_acteur 
        ");
        $requeteFilmo->execute(["id_acteur" => $id]);
        require "view/infoActeur.php";
    }
    public function infoRole($id)
    {
        $pdo = connect::seConnecter();
        $requeterole = $pdo->prepare("
        SELECT r.nom_personnage FROM role r
        WHERE r.id_role=:id_role
        ");
        $requeterole->execute(["id_role" => $id]);
        $requete = $pdo->prepare("
        SELECT CONCAT(p.nom,'-',p.prenom)as nom,a.id_acteur,f.titre,j.id_film  
            FROM jouer j
            INNER JOIN acteur a ON a.id_acteur= j.id_acteur
            INNER JOIN personne p  ON p.id_personne = a.id_personne
            INNER JOIN role r ON j.id_role = r.id_role
            INNER JOIN film f ON f.id_film=j.id_film
            WHERE j.id_role =:id_role  
        ");
        $requete->execute(["id_role" => $id]);
        require "view/infoRole.php";
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

    public function listGenre()
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT libelle,id_genre FROM genre 
        ");
        require "view/listGenre.php";
    }
    public function affichePersonne()
    {
        $pdo=Connect::seConnecter();
        $requete=$pdo->prepare
        (
            "SELECT CONCAT(id_personne, ' - ', nom, '-', prenom) AS personne FROM personne "
        );
        require "view/ajouterFilm.php";
    }
}
