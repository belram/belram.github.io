<?php
require_once __DIR__ . '/../conf/config.php';

	try {
	    $q = $db->query('SHOW TABLES');
	    $row = $q->fetchAll(PDO::FETCH_ASSOC);
	} catch (PDOException $e) {
	    print "Couldn't get TABLES: " . $e->getMessage();
	}
