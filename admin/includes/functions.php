<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 10/22/2015
 * Time: 10:41 AM
 *
 * The functions file
 */

/*
|------------------------------------------------------------
|   Check if the file is included
|------------------------------------------------------------
*/
if(!defined('included')){
    die("You cannot access this page directly");
}

/*
|------------------------------------------------------------
|   Include Classes
|------------------------------------------------------------
*/
include_once('class/User.php');
$user = new User($conn);