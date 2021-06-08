<?php
/*
1. Дизайн/мокап - готов
2. Сделать отправку формы
3. Проверить есть ли пользователь с таким email
4. Проверить заполнил ли пользователь поля формы (email, password)
5. Если все предыдущие(3 и 4) шаги прошли, то
  5.1 Добавить пользователя в базу данных

*/

include "configs/db.php";

if(
	isset($_POST["email"]) && isset($_POST["password"])
    && $_POST["email"] != "" && $_POST["password"] != ""
) {
	// Вставить в таблицу "название таблицы" ()
	$sql = "INSERT INTO polzovateli (email, password, name) VALUES ('" . $_POST["email"] . "', '" . $_POST["password"] . "', '" . $_POST["name"] . "')";
	if(mysqli_query($connect, $sql)) {
		echo "<h2>Пользователь добавлен</h2>";
	} else {
		echo "<h2>Произошла ошибка</h2>" . mysqli_error($connect);
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Регистрация</title>
	<link rel="stylesheet" type="text/css" href="mein1.css">
</head>
<body>

<?php
   include "chasti_site/shapka.php";
?>

<div id="content">

<form id="form-login" action="redister.php" method="POST">
	<h1 id="login-heading">Регистрация</h1>

	<p><input class="input-login" type="text" name="name" placeholder="Ведите ваше имя"></p>

	<div class="password">
		<input class="input-login" type="password" id="password-input" placeholder="Пароль" name="password">
		<label><input type="checkbox" class="password-checkbox"></label>
	</div>

	<p><input class="input-login" type="text" name="email" placeholder="Ведите свой email"></p>



    <p><button id="redister-come" type="submit">Перейти на сайт</button></p>

</form>

<p id="login-question">Уже есть аккаунт?</p>

<form action="login.php" id="login-register">
   <button>Авторизация</button>
</form>

</div>

<script src="https://yandex.st/jquery/2.1.1/jquery.min.js"></script>
<script>
$('body').on('click', '.password-checkbox', function(){
if ($(this).is(':checked')){
	$('#password-input').attr('type', 'text');
} else {
	$('#password-input').attr('type', 'password');
}
});
</script>
</body>
</html>
