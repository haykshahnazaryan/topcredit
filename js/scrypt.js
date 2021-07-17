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

// var map;
// function initMap() {
// 	map = new google.maps.Map(document.getElementById('map'), {
// 		center: {lat: 40.183022, lng: 44.516913},
// 		zoom: 16,
// 	});
// 	marker = new google.maps.Marker({
// 	    position: {lat: 40.183022, lng: 44.516913},
// 	    map: map,
// 	    title: 'EHK',
// 	    icon: 'img/logo_page.png',
//         icon: {url:'img/logo_page.png', 
//     	scaledSize: new google.maps.Size(90, 30)},
// 	});
// }

function send(event, php){
console.log("Отправка запроса");
event.preventDefault ? event.preventDefault() : event.returnValue = false;
var req = new XMLHttpRequest();
req.open('POST', php, true);
req.onload = function() {
	if (req.status >= 200 && req.status < 400) {
	json = JSON.parse(this.response);
    	console.log(json);
    	if (json.result == "success") {
    		alert("Сообщение отправлено");
    	} else {
    		alert("Ошибка. Сообщение не отправлено");
    	}
    } else {alert("Ошибка сервера. Номер: "+req.status);}}; 
req.onerror = function() {alert("Ошибка отправки запроса");};
req.send(new FormData(event.target));
}



