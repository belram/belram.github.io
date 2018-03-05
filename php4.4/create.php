<?php
    $host = 'localhost';
    $dbname = 'bulai';
    $user = '';
    $password = '';

    try {
        $db = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        print "Couldn't link: " . $e->getMessage();
    }

    $sql = 'CREATE TABLE `students` (
        `id` int(11) NOT NULL AUTO_INCREMENT, 
        `name` varchar(50) NOT NULL,
        `estimation` float NOT NULL,
        `budjet` tinyint(4) NOT NULL,
        PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8';

    try {
        $q = $db->exec($sql);
    } catch (PDOException $e) {
        print "Couldn't create a table: " . $e->getMessage();
    }
