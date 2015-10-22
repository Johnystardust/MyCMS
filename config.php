<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 10/22/2015
 * Time: 9:34 AM
 *
 * Config File
 */

session_start();

// Define some constants to be used
define('DBHOST', 'localhost');
define('DBUSER', 'timvasz104_mycms');
define('DBPASS', 'n02bcMziF2');
define('DBNAME', 'timvasz104_mycms');

try {
    $conn = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e){
    echo 'ERROR: ' . $e->getMessage();
}
