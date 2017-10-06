<?php
require_once 'src/session.php';
include __DIR__ . '/GDgenerate.php';

$next_data = [];
if ((!isAuthorized()) && (!isGuest())) {
    redirect('index');
}elseif(!isset($_POST)){
	echo 'Вы не заполнили ни одного поля!';
	die;
}else{
	foreach($_POST as $key => $velue){
		$num_test = $key;
	}
}
array_pop($_POST);
if(getGuest()){
	$person = getGuest();
}elseif(getAuthorizedUser()){
	$person = getAuthorizedUser()['username'];
}
$cl_person = htmlspecialchars($person);
$result = [];
foreach($_POST as $f_key => $f_vel){
		$result[$f_key] = htmlspecialchars($f_vel);
	}
$correct = [];
$i = 1;
$file_name = 'tests/' . $num_test . 'test.json';
$jsonString = file_get_contents("$file_name");
$data = json_decode($jsonString, true);
foreach($data as $num => $val){
	foreach($val as $num_2 => $val_2){
		if($num_2 == 'correct'){
			$correct["q$i"] = htmlspecialchars($val[$num_2]);
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
