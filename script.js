// Открыть контакты
var btOpenContact = document.querySelector("#open_contact");
btOpenContact.onclick = function() {
	var contactsModal = document.querySelector("#contacts-modal");
	contactsModal.style.display = "block";
}

var contactsModalCloseBtn = document.querySelector("#contacts-modal .close");
contactsModalCloseBtn.onclick = function() {
	var contactsModal = document.querySelector("#contacts-modal");
	contactsModal.style.display = "none";
}

/*
1. Вынести вывод всех контакты в отдельный файл - готово
2. JS - добавить событие на кнопку добавить в дрезья
3. JS - отправить запрос на сервер
4. Если запрос выполнен успешно вывести контакты
*/

var curElement = document.activeElement("#London");

function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
