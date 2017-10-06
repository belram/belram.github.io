<?php
require_once 'src/session.php';
if (isPost()) {
    if(login(getParam('login'), getParam('password'))) {
        redirect('list');
    }elseif(guestMan(getParam('guest'))){
    	redirect('list');
    }
    else {
        print 'Неверные логин или пароль';
    }
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Авторизация</title>
	<meta charset="utf-8">
</head>
<body>

	<form method="POST" action="">
		<label>Логин:</label><br>
		<input type="text" name="login" placeholder="login"><br>
		<label>Пароль:</label><br>
		<input type="text" name="password" placeholder="password"><br>
		<input type="submit" name="Вход">
	</form>

	<form method="POST" action="">
		<label>Гость:</label><br>
		<input type="text" name="guest" placeholder="Имя"><br>
		<input type="submit" name="Пройти тест">
	</form>

</body>
</html>
