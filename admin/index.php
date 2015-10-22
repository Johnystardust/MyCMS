<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 10/22/2015
 * Time: 10:41 AM
 *
 * The Admin Index File
 */

include_once('../config.php');

/*
|----------------------------------------------------------------
|   If the user is not logged in than redirect to the home page.
|----------------------------------------------------------------
*/
if(!$user->is_loggedin())
{
    $user->redirect(DIR.'index.php');
}

// echo the user id, testing purposes
$user_id = $_SESSION['user_session'];
echo $user_id;

?>

<a href="logout.php?logout=true">logout</a>

<p>Admin index page</p>