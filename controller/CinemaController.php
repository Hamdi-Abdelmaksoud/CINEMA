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



    public function ajouterFilm()
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare(
            "SELECT CONCAT(p.nom, '-', p.prenom) AS person,p.id_personne
            FROM personne p
            INNER JOIN realisateur r ON r.id_personne=p.id_personne"
        );
        $requete->execute();
        
        if (isset($_POST["ajoutFilm"]))
        {
            
            $titre = filter_input(INPUT_POST, "titre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $annee = filter_input(INPUT_POST, "annee_sortie_fr", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $duree = filter_input(INPUT_POST, "duree", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $resume = filter_input(INPUT_POST, 'resume', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $note = filter_input(INPUT_POST, "note", FILTER_VALIDATE_INT);
            $id = filter_input(INPUT_POST, "realisateur", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if ($titre && $annee && $duree && $resume && $note && $id) {
                $requeteFilm = $pdo->prepare(
                    "INSERT INTO film(titre,annee_sortie_fr,duree,resume,note,id_realisateur) VALUES(:titre,:annee_sortie_fr,:duree,:resume,:note,:id_realisateur)"
                );
                $requeteFilm->execute([
                    "titre" => $titre,
                    "annee_sortie_fr" => $annee,
                    "duree" => $duree,
                    "resume" => $resume,
                    "note" => $note,
                    "id_realisateur"=>$id
                ]);
            }
        } // fin if
        require "view/ajouterFilm.php";
    }
}
