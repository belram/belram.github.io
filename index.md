```markdown

<!DOCTYPE html>
<html lang="ru">
<head>
	<title>Введение в PHP</title>
	<meta charset="utf-8">
</head>
<body>
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
	break 2;
}
	$three = $one;
	$one += $two;
	$two = $three;
	echo "Three: $three\n";
	echo "<br>";
	echo "Two: $two\n";
}
 ?>
</body>
</html>
```


