<?php
/*


*/

include "configs/db.php";

if(
	isset($_POST["email"]) && isset($_POST["password"])
    && $_POST["email"] != "" && $_POST["password"] != ""
) {

    $sql = "SELECT * FROM `polzovateli` WHERE `email` LIKE '" . $_POST["email"] . "' AND `password` LIKE '" . $_POST["password"] . "'";

    $result = mysqli_query($connect, $sql);
    $col_polzovateley = mysqli_num_rows($result);

    if($col_polzovateley == 1) {
    	$polzovatel = mysqli_fetch_assoc($result);
    	setcookie("polzovatel_id", $polzovatel["id"], time() + 60 * 60 * 24);
    	header("Location: /pages/myaccount.php");
    } else {
    	echo "<h2>Логин или пароль введены не верно</h2>";
    }

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Авторизация</title>
	<link rel="stylesheet" type="text/css" href="mein1.css">
</head>
<body>

<?php
   include "chasti_site/shapka.php";
?>

<div id="content">

<form id="form-login" action="login.php" method="POST">
    <h1 id="login-heading">Войти</h1>

	<p><input class="input-login" type="text" name="email" placeholder="email"></p>

		<div class="password">
			<input class="input-login" type="password" id="password-input" placeholder="Пароль" name="password">
			<label><input type="checkbox" class="password-checkbox"></label>
		</div>

<p><button id="login-come" type="submit">Войти</button></p>
<p><button id="forgot-password" type="submit">Забыли пароль?</button></p>

</form>

<p id="login-question">Впервые на сайте?</p>

<form action="redister.php" id="login-register">
   <button>Зарегистрироваться</button>
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
