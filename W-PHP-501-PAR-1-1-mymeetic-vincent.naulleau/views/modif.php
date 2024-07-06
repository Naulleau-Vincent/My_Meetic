<?php
require_once('../controllers/tokenTemplate.php');
if(!$isValid){
    echo "<script>alert('Vous avez été déconnecté, merci de vous reconnecter  afin de continuer de naviguer sur notre site !')</script>";
}else{
    if(!$_SESSION['is_Modif']){
    session_start();
    $_SESSION['is_New'] = true;
    $_SESSION['is_Modif'] = true;
    require_once('loisirs.php');
    require_once('../model/rootLogin.php');
        $Connection = new Connection();
        $token = $Connection->getToken();
        $start = $Connection->start();
    }
    else{
        include('../controllers/loisirTemplate.php');
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Changer mes infos</title>
    </head>
    <body>
    <div class ="form_Container sign-up-Container">
            <form method ="POST" action = "sub.php" name = "modif_Form" id= "modif_Form">
                <h1>Modifier mes informations</h1>
                <fieldset>
                    <legend>Je suis </legend>
                    <div class= "radio_Container">
                        <input type="radio" name= "signup_Genre_Modif" id= "signup_Homme_Modif" value= "homme" required checked>
                        <label for="homme">Homme</label>
                    </div>
                    <div class= "radio_Container">
                        <input type="radio" name= "signup_Genre_Modif" id ="signup_Femme_Modif" value= "femme" required>
                        <label for="femme">Femme</label>
                    </div>
                    <div class= "radio_Container">
                        <input type="radio" name= "signup_Genre_Modif" id ="signup_Autre_Modif" value= "autre" required>
                        <label for="autre">Autre(s)</label>
                    </div>
                </fieldset>
                <input type="text" name = "signup_Ville_Modif" placeholder = "Indiquez votre nouvelle-ville" id= "signup_Ville_Modif" required value="Marseille">
                <input type="email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" title="Adresse mail différente" name= "signup_Mail_Modif" value="louia@gmail.com" placeholder= "Confirmer votre nouvelle adresse mail" id = "signup_Mail_Modif" required/>
                <input type="email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" title="Adresse mail différente" name= "signup_Mail_Confirm_Modif" value="louia@gmail.com" placeholder= "Confirmer votre nouvelle adresse mail" id = "signup_Mail_Confirm_Modif" required/>
                <label for="mdp">Mot de passe (8 characters minimum):</label>
                <input type="password" name="signup_Mdp_Modif" minlength = "8" placeholder= "Modifier mon mdp" id= "signup_Mdp_Modif" required value="9abcdert">
                <input type="password" name="signup_Mdp_Confirm_Modif" minlength = "8" placeholder= "Confirmer votre nouveau mdp" id="signup_Mdp_Confirm_Modif" value="9abcdert" required>
                
                <button  id= "signup_Submit" >Modifier mes informations</button>
            </form>
        </div>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="../controllers/modif.js"></script>
    </body>
    </html>
<?php
}}
?>