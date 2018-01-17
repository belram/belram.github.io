<!DOCTYPE html>
<html>
<head>
	<title>Список загруженных тестов</title>
</head>
<body>

<style>
	table{
		border-collapse: collapse;
	}
	td{
		border: 1px solid black;
		min-width: 100px;
		text-align: center;
	}
</style>


<h4>Список тестов</h4>

<?php
//Подготовительный код
//Скандиром получаем массив файлов в дирректории, куда записывали
//файл с тестами. Через функцию array_diff записываем в переменную массив
//имен фаулов без значений с точками
$files = array_diff((scandir('tests/')), array('..', '.'));
foreach($files as $key_r => $value){
	//Проверяем, если файлы имеют расширение не json, удаляем их из массива 
	//files с тестами.
	if(pathinfo('tests/' . $value, PATHINFO_EXTENSION) !== 'json'){
		unset($files[$key_r]);
	}
}

sort($files, SORT_STRING);

?>

<table>
	<tr>
		<td>Загруженные тесты</td>
		<td>Имя теста</td>
		<td>Пройти тест</td>
	</tr>
	<?php foreach ($files as $key => $value) {?>
	<tr>
		<!--Делаем проверку, что ключь это число   -->
		<td><?php print (int)$key + 1; ?></td>
		<!--Убираем расширение из названия теста  -->
		<td><?php print str_replace('.json', '', $value); ?></td>
		<td>
			<form method="get" action="test.php">
				<!--Отправляем название теста  -->
				<input type="submit" name=<?php print '"' . str_replace('.json', '', $value) . '"'?> value="Пройти тест">
			</form>
		</td>
	</tr>
	<?php } ?>
</table>

</body>
</html>
