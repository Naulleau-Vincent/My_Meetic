<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription/Connexion</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-... votre intégrité ici ..." crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">
</head>
<body id= "signup_Body" >
    <div class = "container" id = "container" >
        <div class ="form_Container sign-up-Container">
            <form method ="POST" action = "loisirs.php" name = "signup_Form" id= "signup_Form">
                <h1>Créer un compte</h1>
                <input type="text" name="signup_Prenom" placeholder = "Prénom" id= "signup_Prenom" required value="valentin">
                <input type="text" name="signup_Nom" placeholder = "Nom" id= "signup_Nom" required value="couteau">
                <label for="date">Date de naissance</label>
                <input type="date" value="1987-10-10" name= "signup_Date" id= "signup_Date" required>
                <fieldset>
                    <legend>Je suis </legend>
                    <div class= "radio_Container">
                        <input type="radio" name= "signup_Genre" id= "signup_Homme" value= "homme" required checked>
                        <label for="homme">Homme</label>
                    </div>
                    <div class= "radio_Container">
                        <input type="radio" name= "signup_Genre" id ="signup_Femme" value= "femme" required>
                        <label for="femme">Femme</label>
                    </div>
                    <div class= "radio_Container">
                        <input type="radio" name= "signup_Genre" id ="signup_Autre" value= "autre" required>
                        <label for="autre">Autre(s)</label>
                    </div>
                </fieldset>
                <input type="text" name = "signup_Ville" placeholder = "Indiquez votre ville" id= "signup_Ville" required value="Paris">
                <input type="email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" title="Adresse mail non valide" name= "signup_Mail" value="matuidi@gmail.com" placeholder= "ex: matuidi@gmail.com" id= "signup_Mail" required/>
                <input type="email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" title="Adresse mail différente" name= "signup_Mail_Confirm" value="matuidi@gmail.com" placeholder= "Confirmer l'adresse mail" id = "signup_Mail_Confirm" required/>
                <label for="mdp">Mot de passe (8 characters minimum):</label>
                <input type="password" name="signup_Mdp" minlength = "8" placeholder= "Créer un mdp" id= "signup_Mdp" required value="12345678">
                <input type="password" name="signup_Mdp_Confirm" minlength = "8" placeholder= "Confirmer votre mdp" id="signup_Mdp_Confirm" value="12345678" required>
                
                <button  id= "signup_Submit" >Créer le compte</button>
            </form>
        </div>
    
        <div class ="form_Container login-Container">
            <form action="sub.php" method = "POST" name = "login_Form" id = "login_Form" >
                <h1>Se connecter</h1>
                <span>Je n'ai pas de compte</span>          
                <input type="email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" title="Adresse mail non valide" name= "mail_login" placeholder= "ex: matuidi@gmail.com" required/>
                <input type="password" name="mdp_login" id="mdp_login" minlength = "8" placeholder= "******* min8" required>
                <button id ="login_Submit" >Se connecter</button>
            </form>
        </div>

        <div class= "overlay-container">
            <div class= "overlay">
                <div class= "overlay-panel overlay-left">
                    <h1>Déjà parmis nous ?</h1>
                    <p>Connecte toi et rejoinds Jean-Luc Kitoko dans sa recherche de partenaire !</p>
                    <button class= "ghost" id="login">Se connecter</button>
                </div>
                <div class= "overlay-panel overlay-right">
                    <h1>Envie de nous rejoindre ?</h1>
                    <p>Rejoignez la communauté et venez faire un maximum de rencontres ! Si, comme Jean-Luc Kitoko, vous rêvez de trouver l'âme soeur alors vous êtes au bon endroit !</p>
                    <button class= "ghost" id="signup">S'inscrire</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../controllers/signup.js" charset = "utf-8"></script>
    <script src="main.js" charset = "utf-8"></script>
</body>
</html>