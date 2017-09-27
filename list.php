
<!DOCTYPE html>
<html>
<head>
	<title>Список загруженных тестов</title>
</head>
<body>

<style>
	.sours {
		display: inline-block;
		height: 20px;
		width: 150px;
		margin-bottom: 5px;
		
	}
	.statement{
		
		padding: 10px 15px;
		height: 30px;
		min-width: 150px;
		max-width: 300px;
		font-size: 15px;
		border: 1px solid black;
	}
	table{
		border-collapse: collapse;
	}
	td{
		border: 1px solid black;
		min-width: 100px;
		text-align: center;
	}
</style>

<h1>Выберете тест</h1>
	<div class="sours">
		Состояние загрузки:
	</div>

	<div class="statement">
	<?php

if(substr(($_FILES['myfile']['name']), -4) == 'json'){
	if(isset($_FILES['myfile']) && !empty($_FILES['myfile']['name'])){
	 	if($_FILES['myfile']['error'] == UPLOAD_ERR_OK &&
	 		move_uploaded_file($_FILES['myfile']['tmp_name'], "tests/" . $_FILES['myfile']['name']))
	 	{
	 		echo "Файл загружен: " . $_FILES['myfile']['name'] . "\n";
	 		
	 	}
	 	else {
	 		echo "Ошибка: повторите попытку";
	 	}
	 }
}else{
	echo "Недопустимый формат файла";
}

	?>
	</div>
<h4>Список тестов</h4>

<?php

$dir = 'tests/';
$loaded_files = scandir($dir);
?>
<table>
	<tr>
		<td>Id</td>
		<td>Name of file</td>
		<td>Try test</td>
	</tr>
	<?php foreach ($loaded_files as $key => $value) {
		if(($value !== '.') && ($value !== '..')){?>
	<tr>
		<td><?php print $key ?></td>
		<td><?php print $value ?></td>
		<td>
			<form method="get" action="test.php">
				<input type="submit" name=<?php print '"' . $key . '"'?> value=<?php print '"' . $value . '"'?>>
			</form>
		</td>
	</tr>
<?php } } ?>
</table>

</body>
</html>
