<?php

namespace Controller;

use Model\Connect;

class RoleController
{
    public function AjouterRole()
    {
        if (isset($_POST["ajoutRole"])) {
            $role = filter_input(INPUT_POST, "nom_role", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if ($role) {
                $pdo = Connect::seConnecter();
                $requete = $pdo->prepare(
                        "INSERT INTO role(nom_personnage) VALUES (:role)"
                    );
                $requete->execute(['role' => $role]);
            }
        }

        require "view/ajouterRole.php";
    }
    public function affecterRole()
    {
        $pdo = Connect::seConnecter();
        $requeteRole = $pdo->prepare(
                "SELECT * FROM role"
            );
        $requeteRole->execute();
        $requeteActeur = $pdo->prepare(
            " SELECT a.id_acteur,CONCAT(p.nom,'-',p.prenom)AS nom        
            FROM  acteur a
            INNER JOIN personne p ON a.id_personne=p.id_personne
                   "
        );
        $requeteActeur->execute();
        $requeteFilm = $pdo->prepare(
            "SELECT * FROM film"
        );
        $requeteFilm->execute();
        if (isset($_POST["affecterRole"])) {
            $film = filter_input(INPUT_POST, "film", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $role = filter_input(INPUT_POST, "role", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $acteur = filter_input(INPUT_POST, "acteur", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if ($film && $role && $acteur) {
                $requete = $pdo->prepare("
                INSERT INTO jouer(id_film,id_role,id_acteur) VALUES(:id_film,:id_role,:id_acteur)
                ");
                $requete->execute([
                    "id_film" => $film,
                    "id_role" => $role,
                    "id_acteur" => $acteur

                ]);
            }
        }
        require "view/affecterRole.php";
    }
}
