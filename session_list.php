<?php
require_once 'src/session.php';
$errors = [];
if ((!isAuthorized()) && (!isGuest())) {
        redirect('index');
    }else{
    	
    }
?>
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

Добро пожаловать, <?php     
print htmlspecialchars(getAuthorizedUser()['username']);
print htmlspecialchars(getGuest());
?>
<h4>Список тестов</h4>

<?php
$dir = 'tests/';
$loaded_files = scandir($dir);
?>

<table>
	<tr>
		<td>Id</td>
		<td>Имя файла</td>
		<td>Пройти тест</td>
		<td>Удалить тест</td>
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
		<?php if (isAuthorized()){?>
		<td>
			<form method="post" action="delite.php">
				<input type="submit" name=<?php print '"' . $value . '"'?> value="Удалить тест">
			</form>
		</td>
	</tr>
<?php } } } ?>
</table>
<br />

<?php
if (isAuthorized()){
	print '<a href="admin.php" >Добавить тест</a> <br />';
	print '<a href="logout.php" >Выйти</a> <br />';
}

?>
</body>
</html>
