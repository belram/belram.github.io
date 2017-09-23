<?php 
$animal = array(
	'Africa' => array('Hippotigris', 'Panthera leo', 'Hippopotamus'),
	'Eurasia' => array('Mammuthus columbi', 'Homo neanderthalensis', 'Ailuropoda melanoleuca'),
	'North_America' => array('Bison', 'Tyrannosaurus', 'Alces alces'),
	'South_America' => array('Eunectes murinus', 'Tapirus', 'Psittacidae'),
	'Australia' => array('Macropus', 'Phascolarctos cinereus', 'Thylacinus cynocephalus')
	);


$first_name = [];
$second_name = [];

foreach($animal as $key => $value){
	foreach ($value as $two_words) {
		if((strpos($two_words, ' ') != false) && (str_word_count($two_words) == 2)){
			$middle = explode(" ", $two_words);
			$first_name[] = $middle[0];
    		$second_name[] = $middle[1];
		}
	}
}

shuffle($second_name);

$fin = [];

for($i = 0; $i < count($second_name); $i++){
	$fin[$i] = $first_name[$i] . ' ' . $second_name[$i];
}

print_r($fin);

?>
