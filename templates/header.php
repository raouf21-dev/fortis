<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keyword"  content="Psychlogue,Remédiation Cognitive, Conseillère bien être, Nutrition" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/fontawesome.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/solid.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/regular.css">
    <link href="css/style.css" rel="stylesheet">
    <title><?= isset($title) ? $title : 'Mon site'?></title>
</head>
<body>
 <header>
    <div class="logo">
        <a href="home">
            <h2>Stéphanie Fortis</h2>
            <h5>Psychologue Spécialisée Remédiation Cognitive <br> Conseillère Bien-être et Nutrition</h5>
        </a>
    </div>
    <nav class="menu-principal">   
        <ul>
            <li><a href="home">Accueil</a></li>
            <li><a href="blog">Blog</a></li>
            <li><a href="contact">Contact</a></li>
            <li><a href="register">Inscription</a></li>
            <?php if(isset($_SESSION['user']))
        {    
        ?>
            <li><a href="logout">Déconnexion</a></li>
        <?php }else { ?>
            <li><a href="login">Connexion</a></li>                
        <?php } ?>       
        </ul>
    </nav>
    <div class="nav">
        <label for="toggle">&#9776;</label>
        <input type="checkbox" id="toggle">
        <div class="menu">
            <a href="home">Accueil</a>
            <a href="blog">Blog</a>
            <a href="contact">Contact</a>
            <a href="register">Inscription</a>
            <?php if(isset($_SESSION['user']))
        {    
        ?>
            <a href="logout">Déconnexion</a>
        <?php }else { ?>
            <a href="login">Connexion</a>               
        <?php } ?>            
        </div>
    </div>
</header>   