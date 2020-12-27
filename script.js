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

function addFriend(element) {
	var friend_list = document.querySelector("#list");
	console.dir(element);
	var href = element.dataset.href;
	// Создать обект для отправки http запроса
	var ajax = new XMLHttpRequest();
	// Открываем ссылку, передавая метод запроса и саму ссылку
	ajax.open("POST", href, false);
	// Отправляем запрос
    ajax.send();
    // Меняем контент в блоке #list
	friend_list.innerHTML = ajax.responseText;
}

function delteFriend(element) {
	var friend_list = document.querySelector("#list");
	console.dir(element);
	var hrefi = element.dataset.hrefi;
	// Создать обект для отправки http запроса
	var ajax = new XMLHttpRequest();
	// Открываем ссылку, передавая метод запроса и саму ссылку
	ajax.open("POST", hrefi, false);
	// Отправляем запрос
    ajax.send();
    // Меняем контент в блоке #list
	friend_list.innerHTML = ajax.responseText;
}


var form = document.querySelector("#form");

form.onsubmit = function(sobitye) {
    sobitye.preventDefault();
    console.dir(sobitye);
	var komu = form.querySelector("input[name='komu_polzovatel_id']");
	var ot = form.querySelector("input[name='ot_polzovatel_id']");
	var text = form.querySelector("textarea");

    var dannie = "otpravka_sms=1" +
                  "&komu_polzovatel_id=" + komu.value + 
                  "&ot_polzovatel_id=" + ot.value +
                  "&text=" + text.value;

    var ajax = new XMLHttpRequest();
        ajax.open("POST", form.action, false);
        ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        ajax.send(dannie);

    console.dir(ajax);    
    var spisokSoobsheniy = document.querySelector("#spisok-soobsheniy");
    spisokSoobsheniy.innerHTML = ajax.response;
    text.value = "";

}


var form = document.querySelector("#poisk");

form.onsubmit = function(sobitye) {
    sobitye.preventDefault();
    console.dir(sobitye);
	var name = form.querySelector("input");


    var dannie = "name=" + name.value;
                  

    var ajax = new XMLHttpRequest();
        ajax.open("POST", form.action, false);
        ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        ajax.send(dannie);

    console.dir(ajax);    
    var spisokSoobsheniy = document.querySelector("#polzovateli");
    spisokSoobsheniy.innerHTML = ajax.response;

}