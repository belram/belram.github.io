 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<meta charset="utf-8">
 </head>
 <body>
 	<style>
 		body{
 			margin:0;
    		padding:0;
 			display: inline-block;
 			background-color: #6c7279;
 		}
 		div{
 		min-width:400px; 
	    min-height:200px;
	    margin:0 auto;
	    overflow:visible;
	    position:absolute;
	    left:50%;
	    top:50%;
	    margin-left:-200px;
	    margin-top:-100px;
	    background:#ffffff;
	    text-align: center;
	    vertical-align: middle;
 		}
 		form{
 			padding-top: 70px;
 		}
 		.dispatch{
 			margin-top: 20px;
 		}
 		a{
 			display: inline-block;
 			margin-top: 20px;
 		}
 		a:hover{
 			color: #7bef09;
 		}
 		p{
 			color: red;
 		}

 	</style>

	<div> 
		<form method="post" action="admin.php" enctype="multipart/form-data">
			<input class="choice" type="file" name="myfile" value="a1"><br>
			<input class="reset" type="reset" value="Отмена">
			<input class="dispatch" type="submit" value="Отправить">
		</form>
	 	<a href="list.php">Список тестов</a>

	<?php

	if(isset($_FILES['myfile']) && !empty($_FILES['myfile']['name'])){
	//Проверка, что загружаемый файл с расширением json
	if(pathinfo($_FILES['myfile']['name'], PATHINFO_EXTENSION) !== 'json'){
		echo "Ошибка: допустима отправка только json-файлов";
	}else{
	 	if($_FILES['myfile']['error'] == UPLOAD_ERR_OK &&
	 		move_uploaded_file($_FILES['myfile']['tmp_name'], "tests/" . $_FILES['myfile']['name'])){

	 		$jsonString = file_get_contents('tests/' . $_FILES['myfile']['name']);
	 		$data = json_decode($jsonString, true);

	 		$errors = [];

			foreach ($data as $key => $value) {
			    if(gettype($value) != 'array'){
			        $errors[] = 'Вопросы должны представлять сабой массивы';
			    }
			    if(count($value) !== 3){
			        $errors[] = 'Массив со значениями должен состоять из 3 элементов';
			    }
			}

			foreach ($data as $key1 => $value1) {
			    foreach ($value1 as $key2 => $value2) {
			        if ((strpos($key2, 'question') === false) && (strpos($key2, 'ansver') === false) && (strpos($key2, 'correct') === false)) {
			            $errors[] = "Рзделы должны иметь ключи 'question', 'ansver' и 'correct'";
			        }
			    }
			}

			foreach ($data as $value) {
			    foreach ($value as $key => $value2) {
			        if((strpos($key, 'question')) !== false){
			            if (gettype($value2) != 'string'){
			                $errors[] = "Параметр 'question' должен быть строкой";
			            }
			        }

			        if((strpos($key, 'ansver')) !== false){
			            if (gettype($value2) != 'array'){
			                $errors[] = "Параметр 'ansver' должен быть массивом";
			            }

			            $ans = [];
			            foreach ($value2 as $key3 => $value3){
			                $ans[] = $key3;
			                if (gettype($value3) != 'string'){
			                    $errors[] = "Варианты ответов должны быть строками";
			                }
			            }
			        }
			        if((strpos($key, 'correct')) !== false){
			            if (gettype($value2) != 'string'){
			                $errors[] = "Параметр 'correct' должен быть строкой";
			            }

			            if (!in_array($value2, $ans)) {
			                $errors[] = "Указанное значение правильного ответа не совпадает ни с одним из вариантов";
			            }
			        }
			    }
			}

			if(!$errors){
				echo "Файл загружен: " . $_FILES['myfile']['name'] . "\n";
			}else{
				print 'Ошибка. Неверная структура файла!' . "\n";
				print '<ul>';
				foreach ($errors as $value) {
					print "<li>$value</li>";
				}
			    print '</ul>';
			    unlink('tests/' . $_FILES['myfile']['name']);
			}	
	 	}
	 	else {
	 		echo "Ошибка: повторите попытку";
	 	}
	}	
}
		
	?>

	</div>
</body>
</html>
