<?php
include __DIR__ . '/GDgenerate.php';
if((!isset($_POST)) && (count($_POST) != 6) && (empty($_POST["name"]))){
	echo 'Вы заполнили не все поля';
	exit(1);
}else{
	foreach($_POST as $key => $velue){
		$num_test = $key;
	}
}
array_pop($_POST);
$person = array_shift($_POST);
$cl_person = htmlspecialchars(("$person"));
$result = [];
foreach($_POST as $f_key => $f_vel){
		$result[$f_key] = htmlspecialchars(("$f_vel"));
	}
$correct = [];
$i = 1;
$file_name = "tests/" . $num_test . "test.json";
$jsonString = file_get_contents("$file_name");
$data = json_decode($jsonString, true);
foreach($data as $num => $val){
	foreach($val as $num_2 => $val_2){
		if($num_2 == 'correct'){
			$cor = "$val[$num_2]";
			$corStr = (string)$cor;
			$correct["q$i"] = htmlspecialchars(("$corStr"));
		}
	}
	$i++;
}

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
}

if($cl_person && $mark){
	print make_img($cl_person, $mark);
}
