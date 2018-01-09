<!DOCTYPE html>
<html lang="ru">
<head>
	<title>Простейший PHP сценарий</title>
	<meta charset="utf-8">
</head>
<body>

<p>
<?php 
$user = rand(0,100);
echo "Число ".$user." <br>";
$one = 1;
$two = 1;
while(true){
	if($one > $user){
	echo "задуманное число Не входит в числовой ряд ";
	break 1;
}elseif($one == $user){
	echo "задуманное число входит в числовой ряд ";
	break;
}
	$three = $one;
	$one += $two;
	$two = $three;
	echo "Three: $three\n";
	echo "<br>";
	echo "Two: $two\n";
}
 ?>
</p>

</body>
</html>
