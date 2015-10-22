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

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title><?php echo SITENAME; ?></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo DIRADMIN; ?>includes/sass/style.css"/>

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,400italic,700,500" rel="stylesheet" type="text/css">
</head>

<body>

<div id="admin-enter-screen" class="container-fluid no-padding">

    <div class="row admin-enter-row">
        <div class="admin-enter col-md-4 col-md-offset-4">
            <h2>Sign Up</h2>
            <form action="" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input class="form-control" type="text" name="username" />
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password"/>
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input class="form-control" type="text" name="email"/>
                </div>

                <input class="btn btn-primary" type="submit" name="signup" value="Sign up"/>

                <br/><br/>
                <span><small><a href="<?php echo DIRADMIN; ?>login.php">Al een account? Log dan hier in!</a></small></span>
            </form>
        </div>
    </div>


</div>

</body>

</html>