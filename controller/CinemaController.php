<?php
namespace Controller;
use Model\Connect;
class CinemaController{
    /**
     * Lister les films
     */
    public function listFilms(){
        $pdo=Connect::seConnecter();
        $requete=$pdo->query("
        SELECT titre, anne_sortie_fr FROM film");
        require "view/listFilms.php";
    }
}