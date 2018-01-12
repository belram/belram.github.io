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

foreach ($_GET as $value) {
	//Делаем проверку
	$clearValue = htmlspecialchars($value);
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
	//Сортируем массив по строковому сравнению. Поскольку, в $clearValue (ранее $value) 
	//находится ключ, значение которого даст имя файла с необходимым тестом,
	// отсортировав массив $files получим тот же массив с тестами, что и в предыдущем случае (в list.php).
	// Подставляем значение из GET (теперь $clearValue) как ключ в files, получаем имя файла с тестом.
	sort($files, SORT_STRING);
	$fileName = $files[$clearValue];
	$jsonString = file_get_contents('tests/' . $fileName);
	$data = json_decode($jsonString, true);
}

$correct = [];
$i = 1;

print '<form action="" method="POST">' . "<br>\n";

foreach($data as $num => $val){
	foreach($val as $num_2 => $val_2){
		//Выполняем проверку на наличие в ключе слова question, чтобы напечатать вопрос
		if((strpos($num_2, 'question')) !== false){
			print '<fieldset>' . "<br>\n";
			print '<legend>' . htmlspecialchars($val[$num_2]) . '</legend>' . "<br>\n";
		}
		//Вводим массив $correct, в который запишем правильный ответ по каждому вопросу.
		//Название ключей массива с ответами, соответствует названиям ключей (q1, q2 ...) с вариантами
		// ответа - v3, v2...
		if($num_2 == 'correct'){
			$correct["q$i"] = htmlspecialchars($val[$num_2]);
		}
		//Поскольку только вопросы определены в массив, делая проверку получаем к нему доступ
		if((is_array($val_2)) !== false){
			foreach($val_2 as $num_3 => $val_3){
				//В POST попадет массив с ключами q1 и значением варианта ответа v3, v2...
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

//Делаем проверку, если в POST есть done, то есть нажата кнопка проверить и 
//в POST есть хоть 1 вариант ответа, обрабатываем результат
if((isset($_POST['done'])) && (count($_POST) !== 1)){
	$result = [];
	//Удаляем из POST элемент с ключем done 
	array_pop($_POST);
	//Заносим результаты ответа, предварительно их обрабатываем
	foreach($_POST as $f_key => $f_vel){
		$result[htmlspecialchars($f_key)] = htmlspecialchars($f_vel);
	}
	//Если в POST есть только done, значит ни один из вопросов не отвечен 
}elseif ((isset($_POST['done'])) && (count($_POST) === 1)) {
	print 'Ни одного правильного ответа!';
}

//Если массив с результатами сеществует, проверяем его путем сверки с 
//правильными ответами, которые хранятся в массиве $correct
if($result){
	$w = 0;
	foreach($correct as $ques => $cor){
 		foreach($result as $var_qs => $var_ans){
 			//Если номера вопросов совпадают, проверяем совпадают ли ответы
 			if($ques == $var_qs){
 				if($cor == $var_ans){
 					//Если ответ совпадает с правильным, итерируем переменную $w,
 					//которая покажет количество правильных вариантов ответов
 					$w++;
 				}
 			}
 		}
 	}
 	// Выводим количество правильных ответов
 	print 'Вы дали ' . $w . ' правильных ответа!';
}

?>
</body>
</html>
