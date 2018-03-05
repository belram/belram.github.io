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
		$newName = htmlspecialchars($newName);
		$sql = "ALTER TABLE {$id} CHANGE {$lastName} {$newName} varchar(50) NOT NULL";

		if ((strpos($newName, '-') !== false) || (strpos($newName, ' ') !== false) || (strlen($newName) == 0)) {
			return false;
		}else{
			try {
				$q = $db->exec($sql);
			} catch (PDOException $e) {
				print "Couldn't setNewName: " . $e->getMessage();
			}
		    unset($_SESSION['rename']);
		    return true;
		}
	}

	public function setNewType ($redyRequest) 
	{
		$id = $this->id;
		$db = $this->db;
		$name = $_SESSION['changeType'];
		$isKey = $_SESSION['key'];
		$newType = $redyRequest;
		$sql = '';
		$sql1 = '';
		$sql2 = '';

		if ($isKey) {
			$sql1 = "ALTER TABLE {$id} CHANGE {$name} {$name} {$newType} NOT NULL AUTO_INCREMENT";
		} else {
			$sql = "ALTER TABLE {$id} CHANGE {$name} {$name} {$newType} NOT NULL";
		}

		if (!$isKey) {
			try {
				$q = $db->exec($sql);
			} catch (PDOException $e) {
				print "Couldn't setNewType: " . $e->getMessage();
				return false;
			}		
		} else {
			try {
				$q = $db->exec($sql1);
				// $m = $db->exec($sql2);
			} catch (PDOException $e) {
				print "Couldn't setNewType: " . $e->getMessage();
				return false;
			}
		}

		unset($_SESSION['changeType']);
		unset($_SESSION['lastType']);
		unset($_SESSION['key']);
		return true;

	}

	public function lastParam ($param1, $param2, $param3 = '', $param4 = '') 
	{	
		if ($param1 === 'rename') {
			$_SESSION['rename'] = $param2;
		} elseif ($param1 === 'changeType') {
			$_SESSION['changeType'] = $param2;
			$_SESSION['lastType'] = $param3;
			$_SESSION['key'] = $param4;
		}
	}

	public function logout ()
	{
		if ($_SESSION['id']) {
        	session_destroy();
    	}
    	$this->redirect('showtables');
	}

	public function redirect($page) {
	    header("Location: {$page}.php");
	    die;
	}
}
