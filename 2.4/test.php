<?php
require_once 'src/session.php';


if ((!isAuthorized()) && (!isGuest())) {
    redirect('index');
}elseif(empty($_GET)){
	header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
	echo 'Cтраница не найдена!';
	die;
}

foreach ($_GET as $key => $value) {
	//Делаем проверку
	$clearValue = htmlspecialchars($key);

	//Формируем имя файла
	$fileName = $clearValue . '.json';

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

	//Проверяем, если теста в массиве со всеми тестами не существует, даем ошибку 404
	//и выходим из скрипта

	if(!in_array($fileName, $files)){
		header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
		echo 'Cтраница не найдена!';
		die;
	}

	$jsonString = file_get_contents('tests/' . $fileName);
	$data = json_decode($jsonString, true);

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Пройдите тест</title>
	<meta charset="utf-8">
</head>
<body>
	<style>
		.check{
			background-color: #05f944;
		}
		.clear{
			background-color: #d52c11;
		}
	</style>

<?php

$i = 1;

print '<form action="check.php" method="POST">' . "\n";
//Поле, чтобы передать имя файла
print '<input type="hidden" name="fileName" value="' . $fileName . '">' . "\n";

foreach($data as $num => $val){
	foreach($val as $num_2 => $val_2){
		//Выполняем проверку на наличие в ключе слова question, чтобы напечатать вопрос
		if((strpos($num_2, 'question')) !== false){
			print '<fieldset>' . "<br>\n";
			print '<legend>' . htmlspecialchars($val[$num_2]) . '</legend>' . "<br>\n";
		}
		//Поскольку только вопросы определены в массив, делая проверку получаем к нему доступ
		if((is_array($val_2)) !== false){
			foreach($val_2 as $num_3 => $val_3){
				//В POST попадет массив с ключами q1 и значением варианта ответа v3, v2.... 
				//У всех вариантов 1 вопроса будет 1 ключ q1 или q2 ...
				print '<input type="radio" name="q' . $i . '" value="' . htmlspecialchars($num_3) .  '">' . htmlspecialchars((int)$val_3) . "<br>\n";
			}
			print '</fieldset>' . "<br>\n";		
		}
	}
	$i++;
}

print '<input class="clear" type="reset" value="Clear All">' . "<br>\n";
print "<br>";
//Последний элемент массива с вариантами ответа будет ключ-done, значение-Check.
print '<input class="check" type="submit" name="done" value="Check">' . "<br>\n";
print '</form>';

?>
</body>
</html>
