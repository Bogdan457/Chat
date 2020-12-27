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
    	header("Location: /");
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

<form action="login.php" method="POST">
	<p>
		Ведите свой email:<br/>
        <input type="text" name="email">
    </p>

    <p>
    	Ведите свой пароль:<br/>
       <input type="password" name="password">
    </p>

<p>
	<button type="submit">Войти</button>
</p>

</form>
   <a href="redister.php">Зарегистрироваться</a>
</div>

</body>
</html>