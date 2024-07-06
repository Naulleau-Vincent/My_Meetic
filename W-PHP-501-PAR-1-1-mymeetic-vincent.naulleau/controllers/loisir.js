$(document).ready(function(){
    //Lorsqu'il veut rentrer sur le marché
    $("#loisirs_Form").submit(function(e){
        var loisirsValid = true;
        var loisirsValues = [];
        $("input[type='checkbox']:checked").each(function(){
            loisirsValues.push($(this).val());
        })      
        //Je vérifie s'il a choisit moins de 3 check boxx.
        if(loisirsValues.length < 3){
            alert("Ne soyez pas timide, nous savons pertinemment que vous aimez au moins 3 choses !");
            loisirsValid = false;
        }
        //Je vérifie s'il n' pas choisit plus de 7 checkboxx.
        if(loisirsValues.length > 7){
            alert("Doucement l'ancien, faut prendre du temps pour ne rien faire aussi ! 7 Loisirs maximum !");
            loisirsValid = false;
        }
        //Je vérifie si mon formulaire n'est pas conforme et je le block si tel est le cas.
        if(loisirsValid == false){
            e.preventDefault(e);
        }
    })
})




/*
-----------------------loisirsValues----------------
1=> Je compte le nombre de clé dans mon tableau, 1000 fois plus simple !

var loisirsValues = $('input[type='chekbox']');
console.log(loisirsValues);
*/