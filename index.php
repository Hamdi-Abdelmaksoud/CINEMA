<?php

use Controller\CinemaController;
use Controller\RoleController;
use Controller\GenreController;
use Controller\PersonneController;

spl_autoload_register(function ($class_name)
/*une fonction d'autoloading spl_autoload_register qui est utilisée pour inclure automatiquement les classes dans le fichier PHP.
 La fonction accepte une fonction de rappel qui sera appelée chaque fois qu'une classe est appelée mais n'a pas été définie. 
 La fonction de rappel inclut simplement le fichier de la classe à partir de son nom*/ 
 {
    include $class_name . '.php';
 });
$ctrlCinema = new CinemaController(); //La classe CinemaController contient les fonctions nécessaires pour traiter les requêtes
$ctrlrole = new RoleController();
$ctrlgenre=new GenreController();
$ctrlpersonne= new PersonneController();
if (isset($_GET["action"])) //appel suivant la requete demandée
{
    switch ($_GET["action"]) {
        case "listFilms":
            $ctrlCinema->listFilms();
            break;
        case "listActeurs":
            $ctrlpersonne->listActeurs();
            break;
        case "listRealisateurs":
            $ctrlpersonne->listRealisateurs();
            break;
        case 'infoRealisateur':
            $ctrlpersonne->infoRealisateur($_GET["id"]);
            break;
        case 'infofilm':
            $ctrlCinema->infofilm($_GET["id"]);
            break;
        case 'infoActeur':
            $ctrlpersonne->infoActeur($_GET["id"]);
            break;
        case 'infoRole':
            $ctrlCinema->infoRole($_GET["id"]);
            break;
        case 'genre':
            $ctrlgenre->genre($_GET["id"]);
            break;
        case 'listGenre':
            $ctrlgenre->listGenre();
            break;
        case 'ajouterRole':
            $ctrlrole->AjouterRole();
            break;
        case 'ajouterGenre':
            $ctrlgenre->AjouterGenre();
            break;
        case 'ajouterPersonne':
            $ctrlpersonne->ajouterPersonne();
            break;
        case 'ajouterFilm':
            $ctrlCinema->ajouterFilm();
            break;
        case 'ajouterActeur':
            $ctrlpersonne->ajouterActeur();    
            break;
        case 'ajouterRealisateur':
            $ctrlpersonne->ajouterRealisateur();
            break; 
        case 'affecterRole':
            $ctrlrole->affecterRole();
            break;


    }
}
