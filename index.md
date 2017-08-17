```markdown

<!DOCTYPE html>
<html lang="ru">
<head>
	<title>Введение в PHP</title>
	<meta charset="utf-8">
</head>
<body>
<?php 
$animal = array(
	'Africa' => array('Hippotigris', 'Panthera leo', 'Hippopotamus'),
	'Eurasia' => array('Mammuthus columbi', 'Homo neanderthalensis', 'Ailuropoda melanoleuca'),
	'North_America' => array('Bison', 'Tyrannosaurus', 'Alces alces'),
	'South_America' => array('Eunectes murinus', 'Tapirus', 'Psittacidae'),
	'Australia' => array('Macropus', 'Phascolarctos cinereus', 'Thylacinus cynocephalus')
	);

$animal2 = [];
foreach ($animal as $crr) {
    $animal2 = array_merge($animal2, array_filter($crr, function ($item){ return count(explode(' ', $item)) === 2; }) );
}
print_r($animal2);
    
$firstname = $lastname = [];

foreach($animal2 as $volume)
    list($firstname[], $lastname[]) = explode(' ', $volume);

shuffle($lastname);

foreach($lastname as $key=>$ln)
    echo "{$firstname[$key]} {$ln}" . PHP_EOL;

 ?>
</body>
</html>
```


