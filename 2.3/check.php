<?php
include __DIR__ . '/GDgenerate.php';
//Удаляем кнопку Check
array_pop($_POST);
//Заносим имя теста в имя файла, предварительно почистив и 
//одновременно его удаляя
$fileName = htmlspecialchars(array_shift($_POST));

//Забираем имя тестируемого, если нет, то "аноном". 
//Также удаляем
if($_POST['name']){
	$person = htmlspecialchars(array_shift($_POST));
}else{
	array_shift($_POST);
	$person = 'Anonim';
}

//Забираем результаты, если $_POST пустой - значит $result также
//останется пустым
$result = [];
foreach($_POST as $f_key => $f_vel){
		$result[htmlspecialchars($f_key)] = htmlspecialchars($f_vel);
}

//Достаем правильные ответы
$correct = [];
$i = 1;
$fileName = 'tests/' . $fileName;
$jsonString = file_get_contents($fileName);
$data = json_decode($jsonString, true);
foreach($data as $num => $val){
	foreach($val as $num_2 => $val_2){
		if($num_2 == 'correct'){
			$correct["q$i"] = htmlspecialchars($val[$num_2]);
		}
	}
	$i++;
}

//Сравниваем
if($result){
	$mark = 0;
	foreach($correct as $ques => $cor){
 		foreach($result as $var_qs => $var_ans){
 			if($ques == $var_qs){
 				if($cor == $var_ans){
 					$mark++;
 				}
 			}
 		}
 	}
}elseif (!$result) {
	$mark = 0;
}

//Печатаем
print make_img($person, $mark);
