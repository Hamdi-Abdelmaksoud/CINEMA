<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link href="/public/css/style.css" rel="stylesheet">
        <title><?= $titre ?></title>
    </head>
    
    <body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-success ">

             
                <ul  class="navbar-nav me-auto mb-2 mb-lg-0" >
                    <li class="nav-item" >
                        <a class="nav-link"  href="index.php?action=listFilms">Liste des films</a>
                    </li >
                    <li  class="nav-item">
                        <a class="nav-link"   href="index.php?action=listActeurs">Liste des acteurs</a>
                    </li>
                    <li  class="nav-item">
                        <a class="nav-link" href="index.php?action=listRealisateurs">Liste des réalisateurs</a>
                    </li >
                    <li  class="nav-item">
                        <a  class="nav-link" href="index.php?action=listGenre">Liste des genre</a>
                    </li>
                    </ul>
                </nav>
                       <ul >
            <li>
                <a href="index.php?action=ajouterRole">Ajouter un role</a>
            </li>
            <li><a href="index.php?action=ajouterGenre">Ajouter un genre</a></li>
            <li><a href="index.php?action=ajouterPersonne">Ajouter acteur/réalisateur</a></li>
            <li><a href="index.php?action=ajouterFilm">Ajouter un film</a></li>
            <li><a href="index.php?action=ajouterActeur">Ajouter un acteur</a></li>
            <li><a href="index.php?action=ajouterRealisateur">Ajouter un realisateur</a></li>
            <li><a href="index.php?action=affecterRole">Affecter un role à un acteur</a></li>
            <!-- <li>
                <div>filter
                    <select name="genre" id="genre">
                        <option value="action"><a href="index.php?action=genre"> action</a></option>
                        <option value="romance"><a href="index.php?action=genre"> romance</a></option>
                    </select>
                </div> 
            </li>-->
        </ul>

    <h1><?= $titre_secondaire ?></h1>

    <div>
        <?= $contenu ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>