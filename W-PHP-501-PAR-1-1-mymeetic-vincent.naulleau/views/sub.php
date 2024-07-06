<?php
    $_SESSION['is_New'] = true;
    require_once('../model/rootLogin.php');
    $Connection = new Connection();
    $token = $Connection->getToken();
    $start = $Connection->start();
    if($_SESSION['is_Modif']){include('../model/rootModifUser.php');}
    include('../model/status.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyMeetic Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-... votre intégrité ici ..." crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">
</head>
<body id = "login_Body">
<header class = "sub_Header">
    <div>
        <button class="button_Header"><h1>My Meetic</h1></button>
    </div>
    <div class = "header_Container">
        <ul class = "list_Container2">
            <li><button>Passer GOLD</button></li>
            <li><button>Mon compte</button>
                <ul id = "listUnder_Container">
                    <li><button>Préférence</button></li>
                    <li><button id= "options">Options</button></li>
                    <form action="CYA.php" class ="Not_lui" method="post"><li><button type ="submit" action = "sub.php" class ="delete">Supprimer le compte</button></li></form>
                </ul>
            </li>
            <li><button class= "disconnection">Se deconnecter</button></li>
        </ul>
    </div>
</header>
<div class = "pokedexForm_Container">
    <h2>Pokedex</h2>            
        <div class = "slider-outer">
            <img src= "../img/symbole-fleche-gauche-rose.png" alt="" class = "prev">
            <div class="slider-inner">
                <article class ="active">
                    <h4>Prenom</h4>
                    <h4>genre</h4>
                    <h4>annee de naissance</h4>
                    <h5>loisirs</h5>
                    <h5>ville</h5>
                </article>
                <article>
                    <h4>Prenom</h4>
                    <h4>genre</h4>
                    <h4>annee de naissance</h4>
                    <h5>loisirs</h5>
                    <h5>ville</h5>
                </article>
                <article>
                    <h4>Prenom</h4>
                    <h4>genre</h4>
                    <h4>annee de naissance</h4>
                    <h5>loisirs</h5>
                    <h5>ville</h5>
                </article>
            </div>
            <img src= "../img/symbole-fleche-gauche-rose.png" alt="" class="next">
        </div>
</div>







<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../controllers/sub.js" charset = "utf-8"></script>
<script src="main.js" charset = "utf-8"></script>
<script src="min.js"></script>
</body>
</html>