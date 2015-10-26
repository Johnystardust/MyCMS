<?php

//error_reporting(E_ALL);
//ini_set('display_errors', 1);

include_once('../config.php');

/*
|----------------------------------------------------------------
|   If the user is not logged in than redirect to the home page.
|----------------------------------------------------------------
*/
if(!$user->is_loggedin()){
    $user->redirect(DIR.'index.php');
}

/*
|------------------------------------------------------------
|   If the edit form gets submitted check to see if the
|   user has filled in their details accordingly.
|------------------------------------------------------------
*/
if(isset($_POST['edit'])){
    $username           = $_POST['username'];
    $userPassword       = $_POST['password'];
    $confirmPassword    = $_POST['confirm_password'];
    $userEmail          = $_POST['email'];
    $id                 = $_POST['id'];

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
        $sql = "SELECT username,email FROM users WHERE NOT id = :id";
        $q = $conn->prepare($sql);

        $q->execute(array(':id' => $id));
        $row = $q->fetch(PDO::FETCH_ASSOC);

        if($row['username'] == $username){
            $error[] = 'Sorry username already taken';
        }
        elseif($row['email'] == $userEmail){
            $error[] = 'Sorry email already taken';
        }
        else {
            if($user->edit($username, $userPassword, $userEmail, $id)){
                $user->redirect('users.php?edited');
            }
        }

    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
}

/*
|----------------------------------------------------------------
|   Get the id and query the user data
|----------------------------------------------------------------
*/
$id = $_GET['id'];

$sql = "SELECT * FROM users WHERE id = :id";
$q = $conn->prepare($sql);

$q->execute(array(':id' => $id));
$row = $q->fetch(PDO::FETCH_ASSOC);

/*
|----------------------------------------------------------------
|   Include the admin header.
|----------------------------------------------------------------
*/
include_once('admin-header.php');
?>

<div class="container-fluid">

    <?php
    /*
    |----------------------------------------------------------------
    |   Include the admin top bar.
    |----------------------------------------------------------------
    */
    include_once('admin-top-bar.php');
    ?>

    <div class="row">
        <?php
        /*
        |----------------------------------------------------------------
        |   Include the admin menu.
        |----------------------------------------------------------------
        */
        include_once('admin-menu.php');
        ?>

        <div class="col-md-10 main">

            <?php
            if(is_array($error)){
                ?>
                <div class="admin-message">
                    <?php
                    foreach($error as $i){
                        echo '<span class="label label-danger">'.$i.'</span><br/>';
                    }
                    ?>
                    <br/>
                </div>
            <?php
            }
            elseif($error != '') {
                ?>
                <div class="admin-message">
                    <span class="label label-danger"><?php echo $error; ?></span><br/><br/>
                </div>
            <?php
            }
            ?>

            <h2>Edit user</h2>

            <form action="" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input class="form-control" type="text" name="username" value="<?php echo $row['username']; ?>" />
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" value="<?php echo $row['password']; ?>"/>
                </div>

                <div class="form-group">
                    <label for="password">Confirm Password</label>
                    <input class="form-control" type="password" name="confirm_password" value="<?php echo $row['password']; ?>"/>
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input class="form-control" type="text" name="email" value="<?php echo $row['email']; ?>"/>
                </div>

                <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>

                <input class="btn btn-primary" type="submit" name="edit" value="Edit"/>
            </form>

        </div>

    </div>

</div>