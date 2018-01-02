<?php 
$animal = [
	'Africa' => ['Hippotigris', 'Panthera leo', 'Hippopotamus'],
	'Eurasia' => ['Mammuthus columbi', 'Homo neanderthalensis', 'Ailuropoda melanoleuca'],
	'North_America' => ['Bison', 'Tyrannosaurus', 'Alces alces'],
	'South_America' => ['Eunectes murinus', 'Tapirus', 'Psittacidae'],
	'Australia' => ['Macropus', 'Phascolarctos cinereus', 'Thylacinus cynocephalus']
	];

//Задание 1

$first_name = [];
$second_name = [];

foreach($animal as $key => $value){
	foreach ($value as $two_words) {
		//Разбиваем сова на элементы массива (для каждого слова перезаписываемого), делаем проверку - если в массиве 2 элемента,
		//записываем их в разные массивы, что бы потом перемешать 2-ые слова.
		$middle = [];
		$middle = explode(" ", $two_words);
		if(count($middle) == 2){
			//В первом массиве 1-ые слова
			$first_name[] = $middle[0];
			//Во втором, вторые
    			$second_name[] = $middle[1];
		}
	}
}

//Перемешиваем 2-ые слова
shuffle($second_name);

$fin = [];

//Соединяем первые и вторые слова
for($i = 0; $i < count($second_name); $i++){
	$fin[$i] = $first_name[$i] . ' ' . $second_name[$i];
}

//Решение первого задания
print_r($fin);

////////////////////////////////////////////////////////////////////////////

//Задание 2

$last_res = [];
	
foreach($animal as $key => $value){

	//Создаем временный массив, в который будем ложить по каждой стране совпадения по первому слову, сравнивая с итогом предыдущего задания  
	$last_part = [];

	//Делаем ту же проверку, чтобы получить те же исходные слова для сравнения
	foreach ($value as $two_words) {
		$middle = [];
		$middle = explode(" ", $two_words);
		if(count($middle) == 2){
			//Всякий раз берем только первое слово
			$first_name = $middle[0];

			//Проходим по результатирующему массиву из пред-го задания, берем каждый раз только первое слово каждого элемента и сверяем с оригиналом. При совпадении, значение из перемешанного массива записываем во временный массив.
    			foreach ($fin as $new_animal) {
				$temporary = explode(" ", $new_animal);
				$first_part = $temporary[0];

	    			if($first_name == $first_part){
	    				$last_part[] = $new_animal;
	    			}
			}	
		}
	}

	//В итоговый массив с ключем текущей итерации записываем все совпадения в виде массива, потом временный массив перезаписываем при движении по оригинальному массиву с животными, т.е. при переходе к следующему ключу оригинала.
	$last_res[$key] = $last_part;
}

?>

<!DOCTYPE html>
<html lang="en">
<html>
<head>
	<meta charset="utf-8">
	<title>List of animals</title>
</head>
<body>
	<?php
	foreach ($last_res as $key => $value) {
		print "<h2>$key</h2>";
		$line = implode(", ", $value);
		print $line;
	}
	?>
</body>
</html>
