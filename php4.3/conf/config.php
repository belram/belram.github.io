<?php
try {
    $db = new PDO('mysql:host=university.netology.ru;dbname=global', '', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    print "Couldn't insert a row: " . $e->getMessage();
}
