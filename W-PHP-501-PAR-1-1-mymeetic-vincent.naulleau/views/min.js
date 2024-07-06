$(document).ready(function(){
    $('.list_Container2 > li').hover(function(){
        $(this).find('ul').stop(true, true).slideDown();
    }, function() {
        $(this).find('ul').stop(true, true).slideUp();
    });
});