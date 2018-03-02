<?php
require_once __DIR__ . '/../conf/config.php';

	function startChange($param)
	{
		if (!empty($param) && (count($param) === 2)) {
	        if ($param['action'] === 'description') {
	            $_SESSION['id'] = $param['id'];
	        }
	    }
	}
	

	function logout() {
    	if ($_SESSION['id']) {
        	session_destroy();
    	}
    		redirect('showtables');
	}

	function redirect($page) {
	    header("Location: {$page}.php");
	    die;
	}

class DescriptionTable
{
	private $id;
	private $db;

	public function __construct($id, $db)
	{
		$this->id = $id;
		$this->db = $db;
	}

	public function getDescription ()
	{
		$id = $this->id;
		$db = $this->db;
		$sql = "DESCRIBE $id";

		try {
        $q = $db->query($sql);
        $res = $q->fetchAll(PDO::FETCH_ASSOC);
	    } catch (PDOException $e) {
	        print "Couldn't DESCRIBE TABLE: " . $e->getMessage();
	    }

	    return $res;
	}

	public function deliteField ($nameField)
	{
		$id = $this->id;
		$db = $this->db;
		$sql = "ALTER TABLE {$id} DROP {$nameField}";

		try {
			$q = $db->exec($sql);
		} catch (PDOException $e) {
			print "Couldn't deliteField: " . $e->getMessage();
		}

		return true;
	}

	

	public function setNewName ($newName) 
	{
		$id = $this->id;
		$db = $this->db;
		$lastName = $_SESSION['rename'];
		$sql = "ALTER TABLE {$id} CHANGE {$lastName} {$newName} varchar(50) NOT NULL";

		try {
			$q = $db->exec($sql);
		} catch (PDOException $e) {
			print "Couldn't setNewName: " . $e->getMessage();
		}

		unset($_SESSION['rename']);
	}


	public function setNewType ($newType) 
	{
		$id = $this->id;
		$db = $this->db;
		$name = $_SESSION['changeType'];
		$sql = "ALTER TABLE {$id} CHANGE {$name} {$name} {$newType} NOT NULL";

		try {
			$q = $db->exec($sql);
		} catch (PDOException $e) {
			print "Couldn't setNewName: " . $e->getMessage();
		}

		unset($_SESSION['changeType']);

	}

	public function lastParam ($param1, $param2) 
	{	
		if ($param1 === 'rename') {
			$_SESSION['rename'] = $param2;
		} elseif ($param1 === 'changeType') {
			$_SESSION['changeType'] = $param2;
		}
	}
}
