$(document).ready(function(){
    $('.burger_btn').click(function(){
        $('.special_menu_burger').addClass("special_menu_burger_active");
        $('#body').addClass("overflow");
    });
    $('.close_menu').click(function(){
        $('.special_menu_burger').removeClass("special_menu_burger_active");
        $('#body').removeClass("overflow");
    });
});



