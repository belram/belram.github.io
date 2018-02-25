<?php
require_once(__DIR__ . '/core/session.php');

if (isPost()) {
	if (isset($_POST['sign_in'])) {
	    if (login(getParam('login'), getParam('password'), $db)) {
	        redirect('list');
	    } else {
	        print '<label>Неверные логин или пароль.</label>';
	        print '<hr>';
	    }
	} elseif (isset($_POST['register'])) {
		if (login(getParam('login'), getParam('password'), $db)) {
	        print '<label>Такой пользователь уже существует в базе данных.</label>';
	        print '<hr>';
	    }elseif (!login(getParam('login'), getParam('password'), $db)) {
	    	if (!isUser(getParam('login'), $db)){
		    	$obj = new Registration(getParam('login'), getParam('password'), $db);
		    	if($obj->createUser()){
		    		redirect('list');
		    	}else{
		    		print '<label>Логин и/или пароль менее 1 символа не допустимы!</label>';
		    	}
		    }else{
		    	print '<label>Выберете другой логин!</label>';
		    	print '<hr>';
		    }	
	    }
	}
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<title>Авторизация и регистрация</title>
	<meta charset="utf-8">
</head>
	<body>
	<?php
	if (!isPost() && (!isset($_POST['sign_in']) || !isset($_POST['register']))) {
		print '<label>Введите данные для регистрации или войдите, если уже регистрировались:</label>';
		print '<hr>';
	}
	?>
		<form method="POST" action="">
			<input type="text" name="login" placeholder="login">
			<input type="text" name="password" placeholder="password">
			<input type="submit" name="sign_in" value="Вход">
			<input type="submit" name="register" value="Регистрация">
		</form>
	</body>
</html>
