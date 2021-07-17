function send(event, php){
event.preventDefault ? event.preventDefault() : event.returnValue = false;
for (var i = 0,count=arrInput.length; i<count; i++) {arrInput[i].classList.remove("inputerror");}
event.target.querySelector("button").disabled = true;
showMsg("Подождите. Идёт отправка сообщения", "#b1b1b1");
var req = new XMLHttpRequest();
req.open('POST', php, true);
req.onload = function() {
event.target.querySelector("button").disabled = false;
    if (req.status >= 200 && req.status < 400) {
        json = JSON.parse(this.response);
        console.log(json);
        if (json.result == "success") {
            showMsg("Сообщение успешно отправлено", "#36AE46");
            console.log("Сообщение отправлено");
            event.target.reset();
        } else if(json.result == "email") {
            showMsg("Ошибка. Неверно указан Email", "#DC352F");
            console.log("Ошибка. Неверно указан Email");
            document.querySelector("#email").classList.add("inputerror");
        } else {
            showMsg("Ошибка. Сообщение не отправлено", "#DC352F");
            console.log("Ошибка. Сообщение не отправлено");
        }
    } else {showMsg("Ошибка сервера. Номер: "+req.status, "#DC352F");}}; 
req.onerror = function() {showMsg("Ошибка отправки запроса", "#DC352F");};
req.send(new FormData(event.target));
}

