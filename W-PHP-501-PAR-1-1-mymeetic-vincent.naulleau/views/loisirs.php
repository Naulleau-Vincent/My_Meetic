<?php
if(!$_SESSION['is_Modif']){ 
require_once('../model/rootNewUser.php');
$_SESSION['is_Modif'] = false;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loisirs</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-... votre intégrité ici ..." crossorigin="anonymous" />
</head>
<body id = "loisir_Body">
<div class = "container" id = "loisirs_Container" >
    <div class ="loisirs-Container">
        <form method ="POST" <?php if(!$_SESSION['is_Modif']){echo "action = sub.php";}else{echo "action='modif.php'";} ?> id= "loisirs_Form">
            <h1>Loisirs et centre d'intérets</h1>
            <fieldset>
                <legend>W h a t ' s y o u r h o b b i e s ?</legend>
                <div class= "checkbox_Container">
                    <ul class= "list_Container">
                        <?php include('../model/rootLoisir.php');?>
                    </ul>
                </div>
            </fieldset>  
            <button  id= "loisirs_Submit" ><?php if(!$_SESSION['is_Modif']){echo "Surfer sur le marché";}else{echo"Modifier mes loisirs"; $_SESSION['is_Modif'];}?></button>
        </form>
    </div>       
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../controllers/loisir.js" charset = "utf-8"></script>
</body>
</html>