<?php
include 'GDgenerate.php';
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
	$result[] = filter_input(INPUT_POST, "$f_key", FILTER_SANITIZE_SPECIAL_CHARS);
}
$correct = [];
$file_name = "tests/" . $num_test . "test.json";
$jsonString = file_get_contents("$file_name");
$data = json_decode($jsonString, true);
foreach($data as $num => $val){
	foreach($val as $num_2 => $val_2){
		if($num_2 == 'correct'){
			$cor = "$val[$num_2]";
			$corStr = (string)$cor;
			$correct[] = htmlspecialchars(("$corStr"));
		}
	}
}
for($m = 0, $w = 0; $m < count($result); $m++){
	if($correct[$m] === $result[$m]){
		$w++;
		$mark = "$w";
	}
}
if($cl_person && $mark){
	print make_img($cl_person, $mark);
}
