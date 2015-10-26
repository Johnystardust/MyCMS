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
|   If the new page form gets 'submit', update the details in
|   the database and redirect to the 'pages.php' page.
|----------------------------------------------------------------
*/
if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_SESSION['user_session_name'];

    if($page->create($title, $content, $author)) {
        $user->redirect('pages.php?created');
    }
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

            <h2>New page</h2>

            <form action="" method="post">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input class="form-control" type="text" name="title"/>
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" name="content" cols="30" rows="10"></textarea>
                </div>

                <input class="btn btn-primary" type="submit" name="submit" value="Submit"/>
            </form>

        </div>

    </div>

</div>