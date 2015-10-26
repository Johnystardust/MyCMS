<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

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
|----------------------------------------------------------------
|   If the user 'edit' is set.
|----------------------------------------------------------------
*/
if(isset($_POST['edit'])){
    $username       = $_POST['username'];
    $userPassword   = $_POST['password'];
    $userEmail      = $_POST['email'];

    if($user->edit($username, $userPassword, $userEmail)){
        $user->redirect('users.php?edited');
    }
}

/*
|----------------------------------------------------------------
|   Include the admin header.
|----------------------------------------------------------------
*/
include_once('admin-header.php');

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
                    <label for="email">E-mail</label>
                    <input class="form-control" type="text" name="email" value="<?php echo $row['email']; ?>"/>
                </div>

                <input class="btn btn-primary" type="submit" name="edit" value="Edit"/>
            </form>

        </div>

    </div>

</div>