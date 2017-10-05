<!DOCTYPE html>
<html>
<head>
	<title>Список загруженных тестов</title>
</head>
<body>

<style>
	table{
		border-collapse: collapse;
	}
	td{
		border: 1px solid black;
		min-width: 100px;
		text-align: center;
	}
</style>


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
		<td><?php 
		print (int)$value;
		 ?></td>
		<td><?php print $value ?></td>
		<td>
			<form method="get" action="test.php">
				<input type="submit" name="id" value=<?php print '"' . (int)$value . '"'?>>
			</form>
		</td>
	</tr>
<?php } } ?>
</table>

</body>
</html>
