<?php
error_reporting(-1);
ob_start();
include_once 'Database.php';
try {
    $bbdd = Database::getInstance();
    var_dump($bbdd);

} catch (Exception $e) {
    die('Error creando singleton: ' . $e->getMessage());
}
