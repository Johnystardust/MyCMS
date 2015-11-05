<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 10/22/2015
 * Time: 9:51 AM
 *
 * Index File
 */

// Include the config file
include_once('config.php');

echo 'My CMS home page';

echo '<a href="'.DIRADMIN.'login.php">Log in</a>';
echo '<a href="'.DIRADMIN.'signup.php">Sign up</a>';

?>