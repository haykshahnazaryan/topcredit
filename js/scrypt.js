$(document).ready(function(){
    $('.burger_btn').click(function(){
        $('.special_menu_burger').addClass("special_menu_burger_active");
        $('#body').addClass("overflow");
    });
    $('.close_menu').click(function(){
        $('.special_menu_burger').removeClass("special_menu_burger_active");
        $('#body').removeClass("overflow");
    });
	
		
    $('.btn_send_form').click(function() {
        $('#contactform').attr('action',
            'mailto:armen.safs@gmail.com?subject=Jeannette Chambliss Digital Portfolio' +
            $('#fname').val() + '&body=' + $('#birthday').val() + '&body=' + $('#phone').val() + '&body=' + $('#money').val() + '&body=' + $('#yes').val() + '&body=' + $('#no').val() + '&body=' + $('#no_two').val() + '&body=' + $('#yes_two').val() + '&body=');
        $('#contactform').submit();
    });
	
	
	
});

var map;
function initMap() {
	map = new google.maps.Map(document.getElementById('map'), {
		center: {lat: 40.183022, lng: 44.516913},
		zoom: 16,
	});
	marker = new google.maps.Marker({
	    position: {lat: 40.183022, lng: 44.516913},
	    map: map,
	    title: 'EHK',
	    icon: 'img/logo_page.png',
        icon: {url:'img/logo_page.png', 
    	scaledSize: new google.maps.Size(90, 30)},
	});
}
