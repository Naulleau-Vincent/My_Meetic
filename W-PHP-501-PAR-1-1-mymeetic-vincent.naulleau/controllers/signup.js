$(document).ready(function(){
    var currentdate = new Date();
    var noFutur = currentdate.toISOString().split('T')[0];
    var cityPattern = new RegExp("^[a-zA-ZÀ-ÿ-/' ]+$");
    $("#signup_Date").attr("max", noFutur);
    //Lorsque mon user click sur le boutton submit.
    $("#signup_Form"). submit(function(e){
        var city = $("#signup_Ville").val();      
        valid = true;

        //Vérification du prénom.
        if($("#signup_Prenom").val() == "" || $("#signup_Prenom").val().length == 1){
            if($("#signup_Prenom").val() == ""){
                $("#signup_Prenom").attr("placeholder", "Veuillez entrer votre prenom !");
            }else{
                $("#signup_Prenom").val('');
                $("#signup_Prenom").attr("placeholder", "Veuillez écrire 2 charactères min !");
            }
            valid = false;
        }
        //Vérification du nom.
        if($("#signup_Nom").val() == "" || $("#signup_Nom").val().length == 1){
            if($("#signup_Nom").val() == ""){
                $("#signup_Nom").attr("placeholder", "Veuillez entrer votre nom !");
            }else{
                $("#signup_Nom").val('');
                $("#signup_Nom").attr("placeholder", "Veuillez écrire 2 charactères min !"); 
            }
            valid = false;
        }
        //Vérification de l'age légal.(18 ans).
        if($("#signup_Date").val() != ""){
            //Je récupere sa date de naissance sous forme d'objet.
            var date_value = new Date($('#signup_Date').val());
            //Je calcule les jours de ma (pour la blague) triste vie.
            var jours = parseInt((currentdate-date_value) / (1000 * 60 * 60 * 24));
            //Je transforme en année.
            var ans = jours/365;

            if(ans < 18){
                alert('Vous devez avoir 18 ans afin d\'accéder à notre site. Revenez dans quelques temps !');
                valid = false;
            }
        }
        //Vérification de la ville
        if(city == "" || city.length == 1){
            if($("#signup_Ville").val() == ""){
                $("#signup_Ville").attr("placeholder", "Veuillez entrer une ville !");
            }else{
                $("#signup_Ville").val('');
                $("#signup_Ville").attr("placeholder", "Veuillez entrer une ville valide !")
            }
            valid = false;
        }else if(!cityPattern.test(city)){
            $("#signup_Ville").val('');
            $("#signup_Ville").attr("placeholder","Attention aux charactères spéciaux(ex:@#~) !");
            valid = false;
        }
        //Vérification des adresses mails
        if($("#signup_Mail").val() != $("#signup_Mail_Confirm").val()){
            $("#signup_Mail").val('');
            $("#signup_Mail").attr("placeholder","Attention, votre adresse mail")
            $("#signup_Mail_Confirm").val('');
            $("#signup_Mail_Confirm").attr("placeholder","n'est pas identique !");
            valid = false;
        }
        //Vérification des mot-de-passe
        if($("#signup_Mdp").val() != $("#signup_Mdp_Confirm").val()){
            $("#signup_Mdp").val('');
            $("#signup_Mdp").attr("placeholder","Attention, votre mot-de-passe");
            $("#signup_Mdp_Confirm").val('');
            $("#signup_Mdp_Confirm").attr("placeholder","n'est pas identique !");
            valid = false;
        }
        //Je vérifie si mon formulaire n'est pas conforme, et dans tel cas, je block l'envoie !.
        if(valid == false){ 
            e.preventDefault(e);
        }
    })
})