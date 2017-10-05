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
	$clear_key = htmlspecialchars("$key");
	$clear_value = htmlspecialchars("$value");
	$file_name = "tests/" . $clear_value . "test.json";
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
			print '<legend>' . htmlspecialchars("$val[$num_2]") . '</legend>' . "<br>\n";
		}
		global $correct;
		if($num_2 == 'correct'){
			$cor = "$val[$num_2]";
			$corStr = (string)$cor;
			$correct["q$i"] = htmlspecialchars("$corStr");
		}
		if((is_array($val_2)) !== false){
			foreach($val_2 as $num_3 => $val_3){
				global $i;
				$varStr = $val_3;
				$i_varStr = (int)$varStr;
				print '<input type="radio" name="q' . "$i" . '" value="' . htmlspecialchars(("$num_3")) .  '">' . htmlspecialchars("$i_varStr") . "<br>\n";
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

if(isset($_POST)){
	$result = [];
	foreach($_POST as $f_key => $f_vel){
		$result[$f_key] = htmlspecialchars(("$f_vel"));
	}
}

if($result){
	$w = 0;
	foreach($correct as $ques => $cor){
 		foreach($result as $var_qs => $var_ans){
 			if($ques == $var_qs){
 				if($cor == $var_ans){
 					$w++;
 				}
 			}
 		}
 	}
 	print 'Вы дали ' . $w . ' правильных ответа!';
}

?>
</body>
</html>
