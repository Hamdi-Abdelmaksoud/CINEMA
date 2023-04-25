<?php

namespace Controller;

use Model\Connect;

class PersonneController
{
    public function ajouterPersonne()
    {
        if (isset($_POST["ajoutpersonne"])) {
            
            $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $prenom=filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $date = filter_input(INPUT_POST, 'date_naissance', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $sexe=filter_input(INPUT_POST, "sexe", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if ($nom && $prenom && $date && $sexe) {
                $pdo = Connect::seConnecter();
                $requete = $pdo->prepare(
                    "INSERT INTO personne(nom,prenom,date_naissance,sexe) VALUES (:nom,:prenom,:date_naissance,:sexe)"
                );
                $requete->execute([
                    "nom"=>$nom,
                    "prenom"=>$prenom,
                    "date_naissance"=>$date,
                    "sexe"=>$sexe
                ]);
            }
        }

        require "view/ajouterPersonne.php";
    }
}
