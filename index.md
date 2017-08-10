```markdown

<!DOCTYPE html>
<html lang="ru">
<head>
	<title>Введение в PHP</title>
	<meta charset="utf-8">
</head>
<body>
	<?php 
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
	<?php 
	echo $title;
	 ?>
	</h1>
	<table>
		<tr>
			<td>
				<?php 
				echo $name;
				 ?>
			</td>
			<td>
				<?php 
				echo $a;
				 ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php 
				echo $age;
				 ?>
			</td>
			<td>
				<?php 
				echo $b;
				 ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php 
				echo $mail;
				 ?>
			</td>
			<td>
				<a href="mailto:gor20@tut.by">
					<?php 
					echo $c;
					 ?>
				</a>	 
			</td>
		</tr>
		<tr>
			<td>
				<?php 
				echo $city;
				 ?>
			</td>
			<td>
				<?php 
				echo $d;
				 ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php 
				echo $about_your_self;
				 ?>
			</td>
			<td>
				<?php 
				echo $i;
				 ?>
			</td>
		</tr>

	</table>
</body>
</html>
```


