<html lang="fr">
<head>
    <link href="..\pages_css\accueil.css" rel="stylesheet" type="text/css" />
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
    </br></br></br>
    <p>
        <?php
        $BDD = array();
        $BDD['host']="localhost";
        $BDD['user']="root";
        $BDD['pass']="";
        $BDD['db']="players";
        $mysqli=mysqli_connect($BDD['host'],$BDD['user'],$BDD['pass'],$BDD['db']);
        if(!$mysqli){
            echo "Erreur: connexion non établie, veuillez réessayer s'il vou plait."
        }
        $AfficherFormulaire=1;
        if(isset($_POST['pseudo'],$_POST['pw'])){
            if(!preg_match("#^[a-z,0-9]+$#",$_POST['pseudo'])){
                echo "Merci de renseigner votre pseudo avec des lettres minuscules et des chiffres uniquement"
            } elseif(strlen($_POST['pseudo']>50)){
                echo "Votre pseudo est trop long, merci de le raccourcir à 50 caractères ou moins :)"
            } elseif(empty($_POST['pw'])){
                echo "Vous n'avez pas donné de mot de passe"
            } elseif(mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM members WHERE members_id='".$_POST['pseudo']."'"))==1){
                echo "Ce pseudonyme est déja utilisé, merci d'en choisir un autre"
            } else {
                $pass_hache=password_hash($_POST['pw'], PASSWORD_DEFAULT)
                if(!mysqli_query($mysqli,"INSERT INTO members SET members_id='".$_POST['pseudo']."', members_mdp='".$pass_hache."'")){
                    echo "Une erreur s'est produite :".mysqli_error($mysqli);
                } else {
                    $AfficherFormulaire=0;
                    echo "Vous etes desormais inscrit !"
                    echo "Vous pouvez retourner vaquer à vos occupations désormais."
                }
            }
        }
        ?>
    </p>
</body>
</html>