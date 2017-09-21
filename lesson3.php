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
