<?php
	require_once 'functions.php';
	if (!empty($_GET) && (count($_GET) === 2)) {
		if ($_GET['action'] === 'done') {
			$obj = new DoAct($_GET['id'], $_GET['action'], $db);
			$row = $obj->makeDone();
		} elseif ($_GET['action'] === 'delete') {
			$obj = new DoAct($_GET['id'], $_GET['action'], $db);
			$row = $obj->deliteTask();
		} elseif ($_GET['action'] === 'edit') {
			$obj = new DoAct($_GET['id'], $_GET['action'], $db);
			$row = $obj->changeTask();
		}
	}

	if ($_SERVER[REQUEST_METHOD] == 'POST' && isset($_POST['save'])) {
		$obj = new AddTask($db, $_POST['description']);
		$row = $obj->addNewTask();
	}

	if ($_SERVER[REQUEST_METHOD] == 'POST' && isset($_POST['sort'])) {
		$obj = new SortBy($db, $_POST['sort_by']);
		$row = $obj->sortingBy();
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
		margin-top: 20px;
	}

	.col tr:first-child {
		background-color: #eee;
		font-weight: bold;
	}

	td {
		border: 1px solid black;
	}

	.col_1 {
		padding: 0px 10px 0px 10px;
	}

	.col_11 {
		padding: 0px 10px 0px 10px;
		color: orange;
	}

	.col_111 {
		padding: 0px 10px 0px 10px;
		color: green;
	}

	.col_2 {
		padding: 0px 5px 0px 10px;
		text-decoration-line: none;
	}

	.col_2:hover {
		text-decoration: underline;
	}
</style>
<body>
	<h1>Список дел на сегодня</h1>
		<div style="float: left">
			<form method="POST">
			    <input type="text" name="description" placeholder="Описание задачи" />
			    <input type="submit" name="save" value="Сохранить" />
			</form>
		</div>
	<div style="float: left; margin-left: 20px;">
		<form method="POST">
		    <label for="sort">Сортировать по:</label>
		    <select name="sort_by">
		        <option value="date_added">Дате добавления</option>
		        <option value="is_done">Статусу</option>
		        <option value="description">Описанию</option>
		    </select>
		    <input type="submit" name="sort" value="Отсортировать" />
		</form>
	</div>
	<div style="clear: both"></div>
	<table class="col">
		<tr>
			<td>Описание задачи</td>
			<td>Дата добавления</td>
			<td>Статус</td>
			<td></td>
		</tr>
		<?php
			foreach ($row as $value) {
				print '<tr>';
				print "<td class='col_1'>{$value['description']}</td>\n";
				print "<td class='col_1'>{$value['date_added']}</td>\n";
				print "<td class='col_";
					if ($value['is_done'] == 0) {
						print "11'>В процессе</td>\n";
					} else {
						print "111'>Выполнено</td>\n";
					}
				print "<td>\n";
					print '<a class=\'col_2\' href="' . '?id=' . $value['id'] . '&action=done">Выполнить</a>' . "\n";
					print '<a class=\'col_2\' href="' . '?id=' . $value['id'] . '&action=delete">Удалить</a>' . "\n";
				print "</td>\n";
				print "</tr>\n";
			}
		?>
	</table>
</body>
</html>
