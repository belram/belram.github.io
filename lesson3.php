<?php 
$animal = array(
	'Africa' => array('Hippotigris', 'Panthera leo', 'Hippopotamus'),
	'Eurasia' => array('Mammuthus columbi', 'Homo neanderthalensis', 'Ailuropoda melanoleuca'),
	'North_America' => array('Bison', 'Tyrannosaurus', 'Alces alces'),
	'South_America' => array('Eunectes murinus', 'Tapirus', 'Psittacidae'),
	'Australia' => array('Macropus', 'Phascolarctos cinereus', 'Thylacinus cynocephalus')
	);

foreach($animal as $key => $value){
	foreach ($value as $two_words) {
		if(strpos($two_words, ' ') != false){
			$animal_two_words[] = $two_words;
		}
	}
}

// print_r($animal_two_words);

foreach ($animal_two_words as $separate) {
	$middle = explode(" ", $separate);
    $first_name[] = $middle[0];
    $second_name[] = $middle[1];
}

shuffle($second_name);

$p=0;
$y=0;
while(($p < count($first_name)) && ($y < count($second_name))){
	foreach($first_name as $value1){
		foreach($second_name as $value2){
			$fin[$p] = "$value1 $second_name[$y]";
			$p++;
			$y++;
			break;
		}
	}
}

print_r($fin);

// Получение ключей в той последовательности, в которой
// заданы названия животных

foreach($animal as $key_f => $value_f){
	foreach($value_f as $key_n => $value_n){
		foreach ($animal_two_words as $key_s => $value_s){
			if(strpos($value_n, $value_s) !== false){
				$last_array_key[] = $key_f;
			}
		}
	}	
}

// print_r($last_array_key);


$result = <<<HTML
<html>
<head>
	<title></title>
</head>
<body>




</body>
</html>
HTML
 
?>
