<?php
	require_once __DIR__ . '/core/session.php';
	if (!isAuthorized()){
	header($_SERVER['SERVER_PROTOCOL'] . ' 403 Access Denied');
	echo 'Вы не авторизованы!';
	die;
	}
	if (!empty($_GET) && (count($_GET) === 2)) {
		if ($_GET['action'] === 'done') {
			$obj = new DoAct($_GET['id'], $_GET['action'], $db);
			$row = $obj->makeDone();
		} elseif ($_GET['action'] === 'delete') {
			$obj = new DoAct($_GET['id'], $_GET['action'], $db);
			$row = $obj->deliteTask();
		} elseif ($_GET['action'] === 'edit') {
			$obj = new DoAct($_GET['id'], $_GET['action'], $db);
			$task_id = $obj->editTask();
		} elseif ($_GET['action'] === 'done1') {
			$objN = new DoAsExecutor($_GET['id'], $db);
			$objN->makeDone();
		} elseif ($_GET['action'] === 'delete1') {
			$objK = new DoAsExecutor($_GET['id'], $db);
			$objK->deliteTask();
		}
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit'])) {
		$obj = new EditTask($db, $_POST['description'], $_SESSION['user'], $task_id);
		$obj->rewriteTask();
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {
		$obj = new AddTask($db, $_POST['description'], $_SESSION['user']);
		$obj->addNewTask();
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['change_executor'])) {
		$objM = new ChangeExecutor($db, $_POST['new_responsible']);
		$row = $objM->setNewExecutor();
	}

	$obj = new ShowAllInformation($_SESSION['user'], $db);
	$row = $obj->getMyInfo();

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['sort'])) {
		$objNext = new SortBy($db, $_POST['sort_by'], $_SESSION['user']);
		$row = $objNext->sortingBy();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Список дел</title>
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
	<h2>Добро пожаловать, 
	<?php	
	print htmlspecialchars($_SESSION['user']['login']); 
	?>
	!!!<h2>
	<h3>Список дел на сегодня</h3>
		<div style="float: left">
			<form method="POST">
			    <input type="text" name="description" placeholder="Описание задачи" />
					<?php
						if ((!empty($_GET)) && ($_GET['action'] === 'edit')) {
							print '<input type="submit" name="edit" value="Сохранить изменение" />';
						} else {
							print '<input type="submit" name="save" value="Добавить" />';
						}
					?>
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
			<td>Ответственный</td>
			<td>Автор</td>
			<td>Закрепить задачу за пользователем</td>
		</tr>
		<?php
			if ($row) {
				foreach ($row as $value) {
					print '<tr>';
					print "<td class='col_1'>" . htmlspecialchars($value['description']) . "</td>\n";
					print "<td class='col_1'>" . htmlspecialchars($value['date_added']) . "</td>\n";
					print "<td class='col_";
						if ($value['is_done'] == 0) {
							print "11'>В процессе</td>\n";
						} else {
							print "111'>Выполнено</td>\n";
						}
					print "<td>\n";
						print '<a class=\'col_2\' href="' . '?id=' . htmlspecialchars($value['id']) . '&action=edit">Изменить</a>' . "\n";
						print '<a class=\'col_2\' href="' . '?id=' . htmlspecialchars($value['id']) . '&action=done">Выполнить</a>' . "\n";
						print '<a class=\'col_2\' href="' . '?id=' . htmlspecialchars($value['id']) . '&action=delete">Удалить</a>' . "\n";
					print "</td>\n";
					print "<td>";
						if ($value['responsible'] == $_SESSION['user']['login']) {
							print 'Вы';
						} else {
							print htmlspecialchars($value['responsible']);
						}
					print "</td>\n";
					print "<td>" . htmlspecialchars($_SESSION['user']['login']) . "</td>";
					print "<td>\n";
						print '<form method="POST">';
			    		print '<select style="margin: 3px;" name="new_responsible">';
						    $users = $obj->shiftResponsibility();
			        		foreach ($users as $valueUser) {
			        			print '<option value="' . htmlspecialchars($valueUser['id']) . ' ' . htmlspecialchars($value['id']) . '">' . htmlspecialchars($valueUser['login']) . '</option>' . "\n";
			        		}
			    		print '</select>';
			    		print '<input style="margin: 3px;" type="submit" name="change_executor" value="Переложить ответственность" />';
						print '</form>';
					print "</td>\n";
					print "</tr>\n";
				}
			}
		?>
	</table>

	<p>Также, посмотрите, что от Вас требуют другие люди:</p>

	<table class="col">
		<tr>
			<td>Описание задачи</td>
			<td>Дата добавления</td>
			<td>Статус</td>
			<td></td>
			<td>Ответственный</td>
			<td>Автор</td>
		</tr>
		<?php
		$obj = new ShowAllInformation($_SESSION['user'], $db);
		$oterTask = $obj->getOtherInfo();
		if($oterTask) {
			foreach ($oterTask as $value) {
				print '<tr>';
				print "<td class='col_1'>" . htmlspecialchars($value['description']) . "</td>\n";
				print "<td class='col_1'>" . htmlspecialchars($value['date_added']) . "</td>\n";
				print "<td class='col_";
					if ($value['is_done'] == 0) {
						print "11'>В процессе</td>\n";
					} else {
						print "111'>Выполнено</td>\n";
					}
				print "<td>\n";
					print '<a class=\'col_2\' href="' . '?id=' . htmlspecialchars($value['id']) . '&action=done1">Выполнить</a>' . "\n";
					print '<a class=\'col_2\' href="' . '?id=' . htmlspecialchars($value['id']) . '&action=delete1">Удалить</a>' . "\n";
				print "</td>\n";
				print "<td>" . htmlspecialchars($_SESSION['user']['login']) . "</td>\n";
				print "<td>" . htmlspecialchars($value['author']) . "</td>\n";
				print "</tr>\n";
			}
		}	
		?>
	</table>
	<?php
	if (isAuthorized()){
		print '<a href="logout.php" style="display: inline-block; font-size: 20px; color: red; margin-top: 20px;">Выход</a>';
	}
	?>
</body>
</html>
