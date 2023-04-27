<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="/public/css/style.css" type="text/css" rel="stylesheet">
        <title ><?= $titre ?></title>
</head>

<body class="p-3 mb-2 bg-secondary text-dark bg-opacity-25">
    <nav class="navbar navbar-dark bg-dark" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
        
    
    <ul class="nav justify-content-end">
        <li class="nav-item ">
            <a class="nav-link text-light " href="index.php?action=listFilms">Liste des films</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-light" href="index.php?action=listActeurs">Liste des acteurs</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link  text-light" href="index.php?action=listRealisateurs">Liste des réalisateurs</a>
        </li>
        <li class="nav-item">
            <a class="nav-link  text-light" href="index.php?action=listGenre">Liste des genre</a>
        </li>
        <li class="nav-item dropdown text-light bg-dark ">
            <a class="nav-link dropdown-toggle text-light bg-dark " data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Ajouter</a>
            <ul class="dropdown-menu dropdown-menu-dark">
                <li>
                    <a class="dropdown-item text-light " href="index.php?action=ajouterRole">role</a>
                </li>
                <li><a class="dropdown-item text-light bg-dark" href="index.php?action=ajouterGenre">genre</a></li>
                <li><a class="dropdown-item text-light " href="index.php?action=ajouterFilm">film</a></li>
                <li><a class="dropdown-item text-light bg-dark" href="index.php?action=affecterRole">casting</a></li>
                
                
                <li><a  class="dropdown-item text-light " h ref="index.php?action=ajouterPersonne">acteur/réalisateur</a></li>
                <li><a class="dropdown-item text-light bg-dark " href="index.php?action=ajouterActeur">acteur</a></li>
                <li><a class="dropdown-item text-light " href="index.php?action=ajouterRealisateur">realisateur</a></li>
            </li>
         
        </ul>
    </ul>
</nav>



</nav>
<!-- <li>
    <div>filter
        <select name="genre" id="genre">
            <option value="action"><a href="index.php?action=genre"> action</a></option>
            <option value="romance"><a href="index.php?action=genre"> romance</a></option>
        </select>
    </div> 
</li>-->
<div style="display:flex;">
<div style="width: 150px;min-width: heigth 100px;margin-top:5%;"class="bg-opacity-25">

</div>

<div style="width: 60%;margin-top:5% ;">
    <h1><?= $titre_secondaire ?></h1>
    <?= $contenu ?>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>