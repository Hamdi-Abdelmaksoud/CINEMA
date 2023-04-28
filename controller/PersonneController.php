<?php

namespace Controller;

use Model\Connect;

class PersonneController
{
    public function infoActeur($id)
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare
        ("SELECT concat(p.nom,'-',p.prenom)as nom,p.date_naissance,a.id_acteur 
            FROM  acteur a
            INNER JOIN personne p ON p.id_personne=a.id_personne
            WHERE a.id_acteur = :id_acteur
         "
        );
        $requete->execute(["id_acteur" => $id]);
        $requeteFilmo = $pdo->prepare
        ("SELECT f.titre, r.nom_personnage , f.annee_sortie_fr,f.id_film,r.id_role
            FROM film f
            INNER JOIN jouer j ON f.id_film = j.id_film
            INNER JOIN acteur a ON j.id_acteur = a.id_acteur
            INNER JOIN role r ON j.id_role = r.id_role
            WHERE a.id_acteur = :id_acteur 
         "
        );
        $requeteFilmo->execute(["id_acteur" => $id]);
        require "view/infoActeur.php";
    }
    public function listActeurs()
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query
        (
        "SELECT *
            FROM  personne p
            INNER JOIN acteur a ON a.id_personne = p.id_personne
        "
        );
            require "view/listActeurs.php";
    }

    public function listRealisateurs()
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query
        (
            "SELECT p.nom,p.prenom,r.id_realisateur,p.date_naissance
                FROM  personne p
                INNER JOIN realisateur r ON r.id_personne = p.id_personne
            "
        );
        require "view/listRealisateurs.php";
    }

    public function infoRealisateur($id)
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare
        (
            "SELECT concat(p.nom,'-',p.prenom)as nom,p.date_naissance,r.id_realisateur
                FROM  realisateur r
                INNER JOIN personne p ON p.id_personne=r.id_personne
                WHERE r.id_realisateur = :id_realisateur
            "
        );
        $requete->execute(["id_realisateur" => $id]);
        $requeteFilmo = $pdo->prepare
        (
        "SELECT f.titre,f.annee_sortie_fr,f.id_film
            FROM film f
            INNER JOIN realisateur r ON r.id_realisateur = f.id_realisateur
            WHERE f.id_realisateur = :id_realisateur 
        "
        );
        $requeteFilmo->execute(["id_realisateur" => $id]);
        require "view/infoRealisateur.php";
    }
    public function ajouterPersonne()
    {
        if (isset($_POST["ajoutpersonne"])) 
        {

            $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $prenom = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $date = filter_input(INPUT_POST, 'date_naissance', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $sexe = filter_input(INPUT_POST, "sexe", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if ($nom && $prenom && $date && $sexe) 
            {
                $pdo = Connect::seConnecter();
                $requete = $pdo->prepare(
                    "INSERT INTO personne(nom,prenom,date_naissance,sexe) VALUES (:nom,:prenom,:date_naissance,:sexe)"
                );
                $requete->execute
                ([
                    "nom" => $nom,
                    "prenom" => $prenom,
                    "date_naissance" => $date,
                    "sexe" => $sexe
                ]);
            }
        }

        require "view/ajouterPersonne.php";
    }

    public function ajouterActeur()
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare(" SELECT CONCAT(p.nom,'-',p.prenom) AS nom ,id_personne 
        FROM personne p
        WHERE NOT EXISTS(SELECT a.id_personne FROM acteur a WHERE p.id_personne = a.id_personne)");
        $requete->execute();
        if (isset($_POST["ajouterActeur"])) //ajouter acteur from name input type submit
        {
            $id = filter_input(INPUT_POST, "acteur", FILTER_SANITIZE_FULL_SPECIAL_CHARS); //acteur c'est le nom de select de la page ajouter acteur
            $pdo = Connect::seConnecter();
            $requeteActeur = $pdo->prepare
            (
                "INSERT INTO acteur(id_personne) VALUES(:id)"
            );
            $requeteActeur->execute(['id' => $id]);
        }
        require "view/ajouterActeur.php";
    }
    public function ajouterRealisateur()
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("SELECT CONCAT(p.nom,'-',p.prenom) AS nom ,id_personne 
FROM personne p
WHERE NOT EXISTS(SELECT r.id_personne FROM realisateur r WHERE p.id_personne = r.id_personne)");
        $requete->execute();
        if (isset($_POST["ajouterRealisateur"])) //ajouter realisateur from name input type submit
        {
            $id = filter_input(INPUT_POST, "realisateur", FILTER_SANITIZE_FULL_SPECIAL_CHARS); //realisateur c'est le nom de select de la page ajouter realisateur
            $pdo = Connect::seConnecter();
            $requeteRealisateur = $pdo->prepare(
                "INSERT INTO realisateur(id_personne) VALUES(:id)");
            $requeteRealisateur->execute(['id' => $id]);
        }
        require "view/ajouterRealisateur.php";
    }
}
