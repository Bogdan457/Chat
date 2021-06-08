// загрузить аватарку в профиль
$(document).ready(function($) {
  $('.popup-open').click(function() {
    $('.popup-fade').fadeIn();
    return false;
  });

  $('.popup-close').click(function() {
    $(this).parents('.popup-fade').fadeOut();
    return false;
  });

  $(document).keydown(function(e) {
    if (e.keyCode === 27) {
      e.stopPropagation();
      $('.popup-fade').fadeOut();
    }
  });

  $('.popup-fade').click(function(e) {
    if ($(e.target).closest('.popup').length == 0) {
      $(this).fadeOut();
    }
  });
});


$(document).ready(function($) {
  $('.popup-open').click(function() {
    $('.popup-article').fadeIn();
    return false;
  });

  $('.popup-close').click(function() {
    $(this).parents('.popup-article').fadeOut();
    return false;
  });

  $(document).keydown(function(e) {
    if (e.keyCode === 27) {
      e.stopPropagation();
      $('.popup-article').fadeOut();
    }
  });

  $('.popup-article').click(function(e) {
    if ($(e.target).closest('.popup').length == 0) {
      $(this).fadeOut();
    }
  });
});

$('.popup-open-smile').on('click', function(){
$('.popup-smile').toggleClass('open');
});

    $('#menu-nav').on('click', function(){
    $('.menu').toggleClass('open');
});

$('.popup-smile li').click(function() {
  var smiley = $(this).attr('title');
  ins2pos(smiley, 'create-article');
});

function ins2pos(str, id) {
 var TextArea = document.getElementById(id);
 var val = TextArea.value;
 var before = val.substring(0, TextArea.selectionStart);
 var after = val.substring(TextArea.selectionEnd, val.length);
 TextArea.value = before + str + after;
}


function addFriend(element) {
  var friend_list = document.querySelector(".block-friends");
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
	var friend_list = document.querySelector(".block-friends");
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

  var addArticles = document.querySelector("#create-article-form");

  addArticles.onsubmit = function(sobitye) {
      sobitye.preventDefault();
      console.dir(sobitye);
    var article = addArticles.querySelector("textarea");

      var dannie = "send=1" + "&article=" + article.value;

      var ajax = new XMLHttpRequest();
          ajax.open("POST", addArticles.action, false);
          ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
          ajax.send(dannie);

      console.dir(ajax);
      var spisokSoobsheniy = document.querySelector("#all-articles");
      var spisokSoobsheniy1 = document.querySelector("#my-articles");
      spisokSoobsheniy.innerHTML = ajax.response;
      spisokSoobsheniy1.innerHTML = ajax.response;
      article.value = "";
  }


// var form = document.querySelector("#poisk");
//
// form.onsubmit = function(sobitye) {
//     sobitye.preventDefault();
//     console.dir(sobitye);
// 	var name = form.querySelector("input");
//
//
//     var dannie = "name=" + name.value;
//
//
//     var ajax = new XMLHttpRequest();
//         ajax.open("POST", form.action, false);
//         ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
//         ajax.send(dannie);
//
//     console.dir(ajax);
//     var spisokSoobsheniy = document.querySelector("#polzovateli");
//     spisokSoobsheniy.innerHTML = ajax.response;
//
// }

$("#button-friends").on("click", function() {
  $(".popup-friends-button").toggle();
  $(".popup-friend").show();
});
