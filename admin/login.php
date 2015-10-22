<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 10/22/2015
 * Time: 10:25 AM
 *
 * The Admin Login File
 */

include_once('../config.php');

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($user->login($username, $password)){
        $user->redirect('index.php');
    }
    else {
        $error = "Wrong details";
        echo $error;
    }
}
?>

<?php

if(isset($_GET['joined'])){
    echo 'Successfully registered, now you can log in';
}
if(isset($_GET['logged-out'])){
    echo 'Successfully logged out';
}

?>

<form action="" method="post">
    <p>Log in</p>
    <p><label for="username">Username</label><input class="form-control" type="text" name="username" /></p>
    <p><label for="password">Password</label><input class="form-control" type="password" name="password"/></p>
    <p><br/><input type="submit" name="login" value="Login"/></p>
</form>