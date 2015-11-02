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
|----------------------------------------------------------------
|   If the user 'delete' is set, get the id of the user and
|   delete the user from the database.
|----------------------------------------------------------------
*/
if(isset($_GET['delete'])){
    $id = $_GET['id'];

    if($user->destroy($id)){
        $user->redirect('users.php?deleted');
    }
}

/*
|----------------------------------------------------------------
|   If 'deleted' is set, message the user that the account has
|   been deleted.
|----------------------------------------------------------------
*/
if(isset($_GET['deleted'])){
    $message = 'Account successfully deleted.';
}

/*
|----------------------------------------------------------------
|   If 'edited' is set, message the user that the account has
|   been edited.
|----------------------------------------------------------------
*/
if(isset($_GET['edited'])){
    $message = 'Account successfully edited.';
}

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

        <div class="col-md-10 col-md-offset-2 main">

            <?php
            if($message !== ''){
                ?>
                <div class="admin-message">
                    <span class="label label-success"><?php echo $message; ?></span>
                </div>
            <?php
            }
            ?>

            <h2>All the users</h2>

            <div class="list-table">

                <div class="list-table-top">
                    <span>Users</span>
                </div>

                <div class="list-table-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $q = $user->list_all();
                        $rows = $q->fetchAll(PDO::FETCH_ASSOC);

                        foreach($rows as $row){
                            echo '<tr>';
                            echo '<td><input type="checkbox"/></td>';
                            echo '<td>'.$row["username"].'</td>';
                            echo '<td>'.$row["email"].'</td>';
                            echo '<td>'.$row["password"].'</td>';
                            echo '<td><a class="btn btn-green" href="'.DIRADMIN.'edit-user.php?id='.$row["id"].'">Edit</a>&nbsp
                        <a class="btn btn-green" href="'.DIRADMIN.'users.php?delete=true&id='.$row["id"].'">Delete</a></td>';
                            echo '</tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>

    </div>

</div>