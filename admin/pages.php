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
|   If the user 'delete' is set, get the id of the page and
|   delete the page from the database.
|----------------------------------------------------------------
*/
if(isset($_GET['delete'])){
    $id = $_GET['id'];

    if($page->destroy($id)){
        $user->redirect('pages.php?deleted');
    };
}

/*
|----------------------------------------------------------------
|   If 'created' is set, message the user.
|----------------------------------------------------------------
*/
if(isset($_GET['created'])){
    $message = 'Page has been created successfully.';
}

/*
|----------------------------------------------------------------
|   If 'created' is set, message the user.
|----------------------------------------------------------------
*/
if(isset($_GET['deleted'])){
    $message = 'Page has been deleted successfully.';
}

/*
|----------------------------------------------------------------
|   If 'edited' is set, message the user.
|----------------------------------------------------------------
*/
if(isset($_GET['edited'])){
    $message = 'Page has been edited successfully.';
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
            /*
            |----------------------------------------------------------------
            |   If there are messages, display them.
            |----------------------------------------------------------------
            */
            if($message !== ''){
                ?>
                <div class="admin-message">
                    <span class="label label-success"><?php echo $message; ?></span>
                </div>
            <?php
            }
            ?>

            <h2>Pages</h2>

            <a class="btn btn-green" href="<?php echo DIRADMIN ?>new-page.php">Add new</a>

            <div class="list-table">

                <div class="list-table-top">
                    <span>Pages</span>
                </div>

                <div class="list-table-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Date Created</th>
                            <th>Date Updated</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $q = $page->list_all();
                        $rows = $q->fetchAll(PDO::FETCH_ASSOC);

                        foreach($rows as $row){
                            echo '<tr>';
                            echo '<td><input type="checkbox"/></td>';
                            echo '<td>'.$row["title"].'</td>';
                            echo '<td>'.$row["author"].'</td>';
                            echo '<td>'.$row["time_created"].'</td>';
                            echo '<td>'.$row["time_updated"].'</td>';
                            echo '<td><a class="btn btn-green" href="'.DIRADMIN.'edit-page.php?id='.$row["id"].'">Edit</a>&nbsp
                            <a class="btn btn-green" href="'.DIRADMIN.'pages.php?delete=true&id='.$row["id"].'">Delete</a>&nbsp
                            <a class="btn btn-green" target="blank" href="'.DIR.'page.php?p='.$row["id"].'">View</a></td>';
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