<?php
require_once('../controllers/tokenTemplate.php');
if(!$isValid){
    echo "<script>alert('Vous avez été déconnecté, merci de vous reconnecter  afin de continuer de naviguer sur notre site !')</script>";
}else{
    require('../model/rootUserInfos.php');
    require('../controllers/loisirTemplate.php');
    foreach($row as $r){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace mon compte</title>
    <link rel="stylesheet" href="../views/style.css">
</head>
<body id ="perso_Body">
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
                    <form action="CYA.php" class ="Not_lui" method="post"><li><button type ="submit" action = "sub.php" class ="delete">Supprimer le compte</button></li></form>
                </ul>
            </li>
            <li><button class= "disconnection">Se deconnecter</button></li>
        </ul>
    </div>
</header>
<div id= "persoForm_Container">
    <form method = "POST" action = "modif.php" id="perso_Form">
        <h1 id = "perso_Title">Mes informations</h1>
        <div id="title_Container">
            <div class="titles_Container">
                <h2>Prenom</h2>
                <p id="looking_Prenom"><?php echo $r['prenom'];?></p>
            </div>
            <div class="titles_Container">
                <h2>Nom</h2>
                <p id="looking_Nom"><?php echo $r['nom'];?></p>
            </div>
            <div class="titles_Container">
                <h2>Adresse email</h2>
                <p id="looking_Mail"><?php echo $r['mail'];?></p>
            </div>
            <div class="titles_Container">
                <h2>Date de naissance</h2>
                <p id="looking_Naissance"><?php echo $r['naissance'];?></p>
            </div>
            <div class="titles_Container">
                <h2>Genre</h2>
                <p id="looking_Genre"><?php echo $r['genre'];?></p>
            </div>
            <div class="titles_Container">
                <h2>Ville</h2>
                <p id="looking_Ville"><?php echo $r['ville'];}?></p>
            </div>
            <div class="titles_Container">
                <h2>Loisirs</h2>
                <p id="looking_Loisirs"><?php include('../model/rootGetInfos.php');foreach($row as $r){echo $r['name']."<br>";}?></p>
            </div>
            <div id="persoSubmit_Container">
            <button id="perso_Submit">Modifier mes informations</button>
            </div>
        </div>
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../controllers/modif.js" charset = "utf-8"></script>
<script src="../controllers/sub.js" charset = "utf-8"></script>
<script src="min.js" charset = "utf-8"></script>
</body>
</html>
<?php
?>
<?php
}
?>