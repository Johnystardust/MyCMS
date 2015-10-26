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

/*
|------------------------------------------------------------
|   If 'login' is set add the data to variables and login
|   the user. If login is successful redirect the user, else
|   add a error to the '$error' variable.
|------------------------------------------------------------
*/
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($user->login($username, $password)){
        $user->redirect('index.php');
    }
    else {
        $error = "Password and/or Username are invalid.";
    }
}

/*
|------------------------------------------------------------
|   If 'joined' is set, echo a confirmation message.
|------------------------------------------------------------
*/
if(isset($_GET['joined'])){
    $message = 'Successfully registered, now you can log in.';
}

/*
|------------------------------------------------------------
|   If 'logged-out' is set, echo a confirmation message.
|------------------------------------------------------------
*/
if(isset($_GET['logged-out'])){
    $message = 'Successfully logged out.';
}
?>

<?php include_once('admin-header.php'); ?>

    <div id="admin-enter-screen" class="container-fluid no-padding">

        <div class="row admin-enter-row">
            <div class="admin-enter col-md-4 col-md-offset-4">
                <h2>Log In</h2>

                <?php
                if($message != ""){
                    ?>
                    <div class="admin-enter-message">
                        <div class="message">
                            <span class="label label-success"><?php echo $message; ?></span><br/><br/>
                        </div>
                    </div>
                <?php
                }
                elseif($error != ""){
                    ?>
                    <div class="admin-enter-message">
                        <div class="message">
                            <span class="label label-danger"><?php echo $error; ?></span><br/><br/>
                        </div>
                    </div>
                    <?php
                }
                ?>

                <form action="" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input class="form-control" type="text" name="username" />
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password"/>
                    </div>

                    <input class="btn btn-primary" type="submit" name="login" value="Log in"/>

                    <br/><br/>
                    <span><small><a href="<?php echo DIRADMIN; ?>signup.php">Nog geen account? Registreer nu hier!</a></small></span>
                </form>

            </div>
        </div>


    </div>

</body>

</html>


