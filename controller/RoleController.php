<?php

namespace Controller;

use Model\Connect;

class RoleController
{
    public function AjouterRole()
    {
        if(isset($_POST["ajoutRole"]))
        {
            $role=filter_input(INPUT_POST,"nom_role",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if($role)
            {
                $pdo=Connect::seConnecter();
                $requete=$pdo->prepare(
                    "INSERT INTO role(nom_personnage) VALUES (:role)"
                );
                $requete->execute(['role' => $role]);
            }
        }
       
        require "view/ajouterRole.php";
    }
}