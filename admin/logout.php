<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 10/22/2015
 * Time: 1:27 PM
 *
 * The Admin Log-Out File
 */

include_once('../config.php');

/*
|------------------------------------------------------------
|   If the 'user_session' is not empty redirect to index.php
|------------------------------------------------------------
*/
if($_SESSION['user_session']!="")
{
    $user->redirect('index.php');
}

/*
|------------------------------------------------------------
|   If 'logout' is set and 'logout' is equal to 'true' the
|   user gets logged out, and redirected to the login page.
|------------------------------------------------------------
*/
if(isset($_GET['logout']) && $_GET['logout']=="true")
{
    $user->logout();
    $user->redirect('login.php?logged-out');
}

/*
|------------------------------------------------------------
|   If 'user_session' is not set redirect to the login page.
|------------------------------------------------------------
*/
if(!isset($_SESSION['user_session']))
{
    $user->redirect('login.php?logged-out');
}