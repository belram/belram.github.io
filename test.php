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

$next_data = [];
foreach ($_GET as $key => $value) {
	$file_name = "tests/" . $value;
	$jsonString = file_get_contents("$file_name");
	$data = json_decode($jsonString, true);
	global $next_data;
	$next_data = $data;
}

$correct = [];
$i = 1;

print '<form action="" method="POST">' . "<br>\n";

foreach($data as $num => $val){
	foreach($val as $num_2 => $val_2){
		if((strpos($num_2, 'question')) !== false){
			print '<fieldset>' . "<br>\n";
			print '<legend>' . "$val[$num_2]" . '</legend>' . "<br>\n";
		}
		global $correct;
		if($num_2 == 'correct'){
			$correct[] = "$val[$num_2]";
		}
		if((is_array($val_2)) !== false){
			foreach($val_2 as $num_3 => $val_3){
				global $i;
				print '<input type="radio" name="q' . "$i" . '" value="' . "$num_3" .  '">' . "$val_3" . "<br>\n";
			}
			print '</fieldset>' . "<br>\n";			
		}
	}
	$i++;
}

print '<input class="clear" type="reset" value="Clear All">' . "<br>\n";
print "<br>";
print '<input class="check" type="submit" value="Check">' . "<br>\n";
print '</form>';


$result = array_values($_POST);

if(count($result)){
	fun_first();
	for($m = 0, $w = 1; $m < count($result); $m++, $w++){
		if($correct[$m] === $result[$m]){
			print "$w ";
		}
	}
	fun_last();
}

function fun_first(){
	print '<style>.parent {width: 100%;height: 100%;position: absolute;top: 0;left: 0;overflow: auto;background-color: #6f0573;opacity: .92;}.block{width: 360px;height: 150px;position: absolute;top: 0;right: 0;bottom: 0;left: 0;margin: auto;background-color: blue;opacity: 1;text-align: center;}.ans {display: inline-block;margin-top: 50px;color: #ffffff;}.back{position: absolute;bottom: 30px;left: 140px;text-align: center;}</style>';
	print '<div class="parent"><div class="block"><p class="ans">Вы правильно ответили на вопрос(ы) № ';
}

function fun_last(){
	print '</p><form class="back" action="list.php" method="post"><input type="submit" name="back" value="List of tests"></form></div></div>';
}

?>

</body>
</html>
