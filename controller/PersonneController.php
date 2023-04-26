<?php

namespace Controller;

use Model\Connect;

class PersonneController
{
    public function ajouterPersonne()
    {
        if (isset($_POST["ajoutpersonne"]))
        {
            
            $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $prenom=filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $date = filter_input(INPUT_POST, 'date_naissance', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $sexe=filter_input(INPUT_POST, "sexe", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if ($nom && $prenom && $date && $sexe)
            {
                $pdo = Connect::seConnecter();
                $requete = $pdo->prepare(
                    "INSERT INTO personne(nom,prenom,date_naissance,sexe) VALUES (:nom,:prenom,:date_naissance,:sexe)"
                );
                $requete->execute
                ([
                    "nom"=>$nom,
                    "prenom"=>$prenom,
                    "date_naissance"=>$date,
                    "sexe"=>$sexe
                ]);
            }
        }

        require "view/ajouterPersonne.php";
    }

    public function ajouterActeur()
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare(" SELECT CONCAT(p.nom,'-',p.prenom) AS nom ,id_personne FROM personne p");
    $requete->execute();
        if(isset ($_POST["ajouterActeur"]))//ajouter acteur from name input type submit
       {
         $id=filter_input(INPUT_POST, "acteur", FILTER_SANITIZE_FULL_SPECIAL_CHARS);//acteur c'est le nom de select de la page ajouter acteur
         $pdo = Connect::seConnecter();
         $requeteActeur = $pdo->prepare("
         INSERT INTO acteur(id_personne) VALUES(:id)
         "); 
         $requeteActeur->execute(['id' => $id]);
      }
        require "view/ajouterActeur.php";
    }
    
    
    public function ajouterRealisateur() 
        {
            $pdo = Connect::seConnecter();
            $requete = $pdo->prepare(" SELECT CONCAT(p.nom,'-',p.prenom) AS nom ,id_personne FROM personne p");
        $requete->execute();
            if(isset ($_POST["ajouterRealisateur"]))//ajouter realisateur from name input type submit
           {
             $id=filter_input(INPUT_POST, "realisateur", FILTER_SANITIZE_FULL_SPECIAL_CHARS);//realisateur c'est le nom de select de la page ajouter realisateur
             $pdo = Connect::seConnecter();
             $requeteRealisateur = $pdo->prepare("
             INSERT INTO realisateur(id_personne) VALUES(:id)
             "); 
             $requeteRealisateur->execute(['id' => $id]);
          }
            require "view/ajouterRealisateur.php";
        }
    }

