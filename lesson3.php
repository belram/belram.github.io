<?php 
$animal = array(
	'Africa' => array('Hippotigris', 'Panthera leo', 'Hippopotamus'),
	'Eurasia' => array('Mammuthus columbi', 'Homo neanderthalensis', 'Ailuropoda melanoleuca'),
	'North_America' => array('Bison', 'Tyrannosaurus', 'Alces alces'),
	'South_America' => array('Eunectes murinus', 'Tapirus', 'Psittacidae'),
	'Australia' => array('Macropus', 'Phascolarctos cinereus', 'Thylacinus cynocephalus')
	);




//Выбираю из первоначального массива значения, состоящие из 2 слов, затем
//первое и второе слово разбиваю по разным массивам. Массив со вторыми словами перемешиваю. 
foreach($animal as $key => $value){
	foreach ($value as $two_words) {
		if(strpos($two_words, ' ') != false){//Условие наличия в значении пробела
			$middle = explode(" ", $two_words);//разбиваю строковое значение на 2 элемента массива и 
			//отправляю в переменную
			$first_name[] = $middle[0];//Перрвый элемент массива в новый массив
    		$second_name[] = $middle[1];//Второй элемент массива в новый массив
    		shuffle($second_name);//Перемашиваю значения второго массива
		}
	}
}

//Склеиваю первый массив с первими словами и второй массив с перемешанными вторыми словами.
//Для этого импользую while
$y=0;//Инициализация переменной
while($y < count($second_name)){//условия цикла, при котором он должен повтаряться
// 8 раз с учетом первого нулевого значения $y.
	foreach($first_name as $value1){//Получаю в переменную $value1 значение первого массива,
	// которое после склейки будет выступать первым словом
		foreach($second_name as $value2){//Получаю в переменную $value2 значение второго массива, 
			//которое после склейки будет выступать вторым словом
			$fin[] = "$value1 $second_name[$y]";//Создаю итоговый массив. Переменная $y
			 //инициализирована и использована в качестве ключа второго массива для 
			 //последовательного соединения. Поскольку на каждом из последовательных циклов 
			 //выполнения кода в переменной $value1 содержится 1 значение, а в переменной $
			 //value2 все переменные массива $second_name, я указываю на конкретную переменную,
			 // которую следует подставить. Т.е. сначала с ключом 0, затем 1 ... до 7. 
			
			$y++;//Итерирую переменную, чтобы в следующий раз при выполнении цикла, т.е.
			// начиная с while в итоговый массив подставлялась следующая переменная из 
			// второго массива - $second_name.
			break;// прерываю текущий foreach, поскольку нужная переменная с нужным ключом 
			//один раз уже подставилась в итоговый массив и мне нужно попасть заново в 
			//while для проверки соответствия условию проитерированной переменной и затем
			//получения нового следующего значения из первого массива и второго массива.
		}
	}
}

print_r($fin);

?>
