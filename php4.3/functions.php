<?php
require_once 'config.php';
try {
    $q = $db->query('SELECT id, description, is_done, date_added FROM tasks ORDER BY date_added');
    $row = $q->fetchAll();
} catch (PDOException $e) {
    print "Couldn't insert a row: " . $e->getMessage();
}


class DoAct
{
	public $id;
	public $watToDo;
	private $db;

	public function __construct($id = '', $watToDo = '', $db)
	{
		$this->id = $id;
		$this->watToDo = $watToDo;
		$this->db = $db;
	}

	public function makeDone() 
	{
		$db = $this->db;
		$res = "UPDATE tasks SET is_done = 1 WHERE id = $this->id";

		try {
			$q = $db->exec($res);
			$nextView = $db->query('SELECT id, description, is_done, date_added FROM tasks ORDER BY date_added');
    		$row = $nextView->fetchAll();
		} catch (PDOException $e) {
			print "Couldn't update a row: " . $e->getMessage();
		}

		return $row;
	}

	public function deliteTask() 
	{
		$db = $this->db;
		$res = "DELETE FROM tasks WHERE id = $this->id";

		try {
			$q = $db->exec($res);
			$nextView = $db->query('SELECT id, description, is_done, date_added FROM tasks ORDER BY date_added');
    		$row = $nextView->fetchAll();
		} catch (PDOException $e) {
			print "Couldn't delite a row: " . $e->getMessage();
		}

		return $row;
	}
}


class AddTask
{
	private $db;
	private $newTask;

	public function __construct($db, $newTask)
	{
		$this->db = $db;
		$this->newTask = $newTask;
	}

	public function addNewTask()
	{
		$db = $this->db;
		$today = date("Y-m-d H:i:s");

		try {
			$q = $db->prepare('INSERT INTO tasks (description, is_done, date_added) VALUES (?,?,?)');
			$q->execute(array($this->newTask, 0, $today));

			$nextView = $db->query('SELECT id, description, is_done, date_added FROM tasks ORDER BY date_added');
    		$row = $nextView->fetchAll();
		} catch (PDOException $e) {
			print "Couldn't edit a row: " . $e->getMessage();
		}

		return $row;
	}
}

class SortBy{
	private $sort_by;
	private $db;

	public function __construct($db, $sort_by)
	{
		$this->db = $db;
		$this->sort_by = $sort_by;
	}

	public function sortingBy()
	{
		$db = $this->db;
		$res = 'SELECT id, description, is_done, date_added FROM tasks ORDER BY ' . $this->sort_by;

		try {

			$nextView = $db->query($res);
    		$row = $nextView->fetchAll();
		} catch (PDOException $e) {
			print "Couldn't sort and present a row: " . $e->getMessage();
		}

		return $row;
	}
}
