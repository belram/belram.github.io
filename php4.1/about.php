<?php

try {
    $db = new PDO('mysql:host=127.0.0.1;dbname=global', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q = $db->query('SELECT `id`, `name`, `author`, `year`, `isbn`, `genre` FROM `books`');
    $row = $q->fetchAll();
} catch (PDOException $e) {
    print "Couldn't insert a row: " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<style>
	table {
		border-collapse: collapse;
	}

	.aaa tr:first-child {
		background-color: #eee;
		font-weight: bold;
	}

	td {
		border: 1px solid black;
	}
</style>
<body>
	
	<h2>Задание 1</h2>
	<table class="aaa">
		<tr>
			<td>Название</td>
			<td>Автор</td>
			<td>Год выпуска</td>
			<td>ISBN</td>
			<td>Жанр</td>
		</tr>
		<? 
			foreach ($row as $value) {
				print "<tr>\n";
				print "<td>{$value['name']}</td>\n";
				print "<td>{$value['author']}</td>\n";
				print "<td>{$value['year']}</td>\n";
				print "<td>{$value['isbn']}</td>\n";
				print "<td>{$value['genre']}</td>\n";
				print "</tr>\n";
			}
		?>
	</table>

</body>
</html>
