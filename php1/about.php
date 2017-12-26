<!DOCTYPE html>
<html lang="ru">
<head>
	<title>Введение в PHP</title>
	<meta charset="utf-8">
</head>
<body>

	<? 
	$title = 'Страница пользователя Николай';
	$name = 'Имя';
	$a = 'Николай';
	$age = 'Возраст';
	$b = 30;
	$mail = 'Адрес электронной почты';
	$c = 'gor20@tut.by';
	$city = 'Город';
	$d = 'Минск';
	$about_your_self = 'О себе';
	$i = 'Ищу работу';
	 ?>
	
	 <style>
	 h1 {
	 	padding-bottom: 10px;
	 }
	 td {
	 	padding-bottom: 5px;
	 	padding-right: 10px;
	 }
	 </style>

	<h1>

	<?	echo $title; ?>
	
	</h1>
	<table>
		<tr>
			<td>

				<? echo $name; ?>

			</td>
			<td>

				<? echo $a; ?>

			</td>
		</tr>
		<tr>
			<td>

				<? echo $age; ?>

			</td>
			<td>

				<? echo $b; ?>

			</td>
		</tr>
		<tr>
			<td>

				<? echo $mail; ?>

			</td>
			<td>
				<a href="mailto:gor20@tut.by">

					<? echo $c; ?>

				</a>	 
			</td>
		</tr>
		<tr>
			<td>

				<? echo $city; ?>

			</td>
			<td>

				<? echo $d; ?>

			</td>
		</tr>
		<tr>
			<td>

				<? echo $about_your_self; ?>

			</td>
			<td>

				<? echo $i; ?>

			</td>
		</tr>

	</table>
</body>
</html>
