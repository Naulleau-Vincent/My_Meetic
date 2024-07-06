$(document).ready(function(){
    var cityPattern = new RegExp("^[a-zA-ZÀ-ÿ-/' ]+$");
    $("#modif_Form").submit(function(e){
        var valid_Modif = true;
        var city_Modif = $("#signup_Ville_Modif").val();      
        console.log(city_Modif);
        //Vérification de la ville
        if(city_Modif == "" || city_Modif.length == 1){
            if($("#signup_Ville_Modif").val() == ""){
                $("#signup_Ville_Modif").attr("placeholder", "Veuillez entrer une ville !");
            }else{
                $("#signup_Ville_Modif").val('');
                $("#signup_Ville_Modif").attr("placeholder", "Veuillez entrer une ville valide !")
            }
            valid_Modif = false;
            //Je regarde s'il n'y a pas de charactères spéciaux !
        }else if(!cityPattern.test(city_Modif)){
            $("#signup_Ville_Modif").val('');
            $("#signup_Ville_Modif").attr("placeholder","Attention aux charactères spéciaux(ex:@#~) !");
            valid_Modif = false;
        }
        //Si mes adresses mails sont bien conformes !
        if($("#signup_Mail_Modif").val() != $("#signup_Mail_Confirm_Modif").val()){
            $("#signup_Mail_Modif").val('');
            $("#signup_Mail_Modif").attr("placeholder","Attention, votre adresse mail")
            $("#signup_Mail_Confirm_Modif").val('');
            $("#signup_Mail_Confirm_Modif").attr("placeholder","n'est pas identique !");
            valid_Modif = false;
        }
        //Vérification des mot-de-passe
        if($("#signup_Mdp_Modif").val() != $("#signup_Mdp_Confirm_Modif").val()){
            $("#signup_Mdp_Modif").val('');
            $("#signup_Mdp_Modif").attr("placeholder","Attention, votre mot-de-passe");
            $("#signup_Mdp_Confirm_Modif").val('');
            $("#signup_Mdp_Confirm_Modif").attr("placeholder","n'est pas identique !");
            valid_Modif = false;
        }
        //Si mon form n'est pas carré
        if(valid_Modif == false){ 
            e.preventDefault(e);
        }
        alert('Modification bien pris en compte !');
    })
})