<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 10/22/2015
 * Time: 12:53 PM
 *
 * The Admin Sign-Up File
 */

include_once('../config.php');

if(isset($_POST['signup'])){
    $username = $_POST['username'];
    $userEmail = $_POST['email'];
    $userPassword = $_POST['password'];

    if($user->create($username, $userPassword, $userEmail)){
        $user->redirect('login.php?joined');
    }
}

?>


<form action="" method="post">
    <p>Sign-up</p>
    <p><label for="username">Username</label><input class="form-control" type="text" name="username" /></p>
    <p><label for="username">E-mail</label><input class="form-control" type="text" name="email" /></p>
    <p><label for="password">Password</label><input class="form-control" type="password" name="password"/></p>
    <p><br/><input type="submit" name="signup" value="Sign up"/></p>
</form>