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

        <div class="col-md-10 main">

            <?php
            if($message !== ''){
                ?>
                <div class="admin-message">
                    <span class="label label-success"><?php echo $message; ?></span>
                </div>
            <?php
            }
            ?>

            <h2>Pages</h2>

            <a class="btn btn-primary" href="<?php echo DIRADMIN ?>new-page.php">Add new</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $q = $page->list_all();
                    $rows = $q->fetchAll(PDO::FETCH_ASSOC);

                    foreach($rows as $row){
                        echo '<tr>';
                        echo '<td>'.$row["title"].'</td>';
                        echo '<td>'.$row["author"].'</td>';
                        echo '<td>'.$row["date"].'</td>';
                        echo '<td><a class="btn btn-primary" href="'.DIRADMIN.'edit-page.php?id='.$row["id"].'">Edit</a>&nbsp
                        <a class="btn btn-primary" href="'.DIRADMIN.'pages.php?delete=true&id='.$row["id"].'">Delete</a></td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>

        </div>

    </div>

</div>