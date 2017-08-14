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
echo "Число ".$user." ";
$one = 1;
$two = 1;
if($one > $user){
	echo "задуманное число Не входит в числовой ряд ";
}elseif($one == $user){
	echo "задуманное число входит в числовой ряд ";
}else{
	while($one > $user){
		
		$three = $one;
		$two = $three + $two;
		echo $two;
	}
}
 ?>
</body>
</html>
```


