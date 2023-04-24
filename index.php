<?php

use Controller\CinemaController;

spl_autoload_register(function ($class_name)
/*une fonction d'autoloading spl_autoload_register qui est utilisée pour inclure automatiquement les classes dans le fichier PHP.
 La fonction accepte une fonction de rappel qui sera appelée chaque fois qu'une classe est appelée mais n'a pas été définie. 
 La fonction de rappel inclut simplement le fichier de la classe à partir de son nom*/ {
    include $class_name . '.php';
});
$ctrlCinema = new CinemaController(); //La classe CinemaController contient les fonctions nécessaires pour traiter les requêtes
if (isset($_GET["action"])) //appel suivant la requete demandée
{
    switch ($_GET["action"]) {
        case "listFilms":
            $ctrlCinema->listFilms();
            break;
        case "listActeurs":
            $ctrlCinema->listActeurs();
            break;
        case "listRealisateurs":
            $ctrlCinema->listRealisateurs();
            break;
            // case 'genre':
            //     $ctrlCinema->genre();
        case 'infofilm':
            $ctrlCinema->infofilm($_GET["id"]);
            break;
        case 'infoActeur':
            $ctrlCinema->infoActeur($_GET["id"]);
            break;
        case 'infoRole':
            $ctrlCinema->infoRole($_GET["id"]);
    }
}
