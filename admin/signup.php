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

/*
|------------------------------------------------------------
|   If the singup form gets submitted check to see if the
|   user has filled in their details accordingly.
|------------------------------------------------------------
*/
if(isset($_POST['signup'])){
    $username        = $_POST['username'];
    $userEmail       = $_POST['email'];
    $userPassword    = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    if($username == '') {
        $error[] = 'Please provide a username.';
    }
    if($userEmail == ''){
        $error[] = 'Please provide a email.';
    }
    if(!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
        $error[] = 'Please enter a valid email address!';
    }
    if($userPassword == ''){
        $error[] = 'Please provide a password.';
    }
    if($confirmPassword !== $userPassword){
        $error[] = 'Passwords dont match.';
    }
    if(strlen($userPassword) < 6){
        $error[] = 'Password must be at least 6 characters.';
    }

    /*
    |------------------------------------------------------------
    |   If the user has send their details correctly, check if
    |   the users 'username' and 'email' are unique.
    |   If they are than complete the registration process.
    |------------------------------------------------------------
    */
    try {
        $sql = "SELECT username,email FROM users WHERE username=:username OR email=:userEmail";
        $q = $conn->prepare($sql);

        $q->execute(array(':username' => $username, ':userEmail' => $userEmail));
        $row = $q->fetch(PDO::FETCH_ASSOC);

        if($row['username'] == $username){
            $error[] = 'Sorry username already taken';
        }
        elseif($row['email'] == $userEmail){
            $error[] = 'Sorry email already taken';
        }
        else {
            if($user->create($username, $userPassword, $userEmail)){
                $user->redirect('login.php?joined');
            }
        }

    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
}
?>

<?php include_once('admin-header.php'); ?>

<div id="admin-enter-screen" class="container-fluid no-padding">

    <div class="row admin-enter-row">
        <div class="admin-enter col-md-4 col-md-offset-4">
            <h2>Sign Up</h2>

            <?php
            if(is_array($error)){
                ?>
                <div class="admin-enter-message">
                    <div class="message">
                        <?php
                        foreach($error as $i){
                            echo '<span class="label label-danger">'.$i.'</span><br/>';
                        }
                        ?>
                        <br/>
                    </div>
                </div>
                <?php
            }
            elseif($error != '') {
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
                    <input class="form-control" id="username" type="text" name="username" />
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" id="password" type="password" name="password"/>
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input class="form-control" id="confirm_password" type="password" name="confirm_password"/>
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input class="form-control" id="email" type="text" name="email"/>
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