<html lang="fr">
<head>
    <link href="../pages_css\accueil.css" rel="stylesheet" type="text/css" />
    <meta charset="utf-8" />
    <title>Stranded In Space</title>
</head>
<body>
    <nav class="menu" style="height: 90px;">
        <img src="..\images\popcorn1.png" class="pop">
        <div class="logo">
            <a href="..\index.html">Stranded In Space</a>
        </div>
        <ul class="links">
            <li>
                <a href="lejeu.html">Le jeu</a>
                <!--on voudra rajouter un menu deroulant, avec possibilité d'accéder a différentes parties de la page en cliquant sur le lien-->
            </li>
            <li>
                <a href="histoire.html">L'histoire du groupe</a> 
                <!--on voudra rajouter un menu deroulant, avec possibilité d'accéder a différentes parties de la page en cliquant sur le lien-->
            </li>
            <li>
                <a href="highscores.php">Highscores</a>
                <!--ici on laissera le lien tel quel pour accéder directement aux meilleurs scores des joueurs-->
            </li>
        </ul>
        <img src="..\images\popcorn2.png" class="pop">
    </nav>
    </br></br></br></br></br>
    <p>
        <?php 
            session_start();
            //accès a la base de données
            
        ?>
        <form action="connexion.php" method="post">
            Pseudo: <input type="text" name="pseudo" value="" required/>
            <br />
            Mot de passe: <input type="password" name="mdp" value="" required/>
            <br />
            <input type="submit" name="connexion" value="Connexion" />
        </form>
    </p>
</body>
</html>