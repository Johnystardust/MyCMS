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

/*
|------------------------------------------------------------
|   Define database constants
|------------------------------------------------------------
*/
define('DBHOST', 'localhost');
define('DBUSER', 'timvasz104_mycms');
define('DBPASS', 'n02bcMziF2');
define('DBNAME', 'timvasz104_mycms');

/*
|------------------------------------------------------------
|   Database connection
|------------------------------------------------------------
|
|   We are connecting to the database through PDO.
|   The ATTR_ERRMODE is set to EXCEPTION so we can see the errors
|   if any occur.
*/
try {
    $conn = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e){
    echo 'ERROR: ' . $e->getMessage();
}

/*
|------------------------------------------------------------
|   Define Constants
|------------------------------------------------------------
*/

// Site path
define('DIR', 'http://www.timvanderslik.nl/development/mycms/');

// Admin path
define('DIRADMIN', 'http://www.timvanderslik.nl/development/mycms/admin/');

// Site name
define('SITENAME', 'My-CMS');

// Include checker
define('included', 1);

/*
|------------------------------------------------------------
|   Include the admin functions
|------------------------------------------------------------
*/
include_once('admin/includes/functions.php');

