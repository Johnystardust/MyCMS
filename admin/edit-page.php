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


if(isset($_POST['edit'])){
    $title      = $_POST['title'];
    $content    = $_POST['content'];
    $id         = $_POST['id'];

    if($page->edit($title, $content, $id)){
        $user->redirect('pages.php?edited');
    }
}

/*
|----------------------------------------------------------------
|   Get the id and query the page data
|----------------------------------------------------------------
*/
$id = $_GET['id'];

$sql = "SELECT * FROM pages WHERE id = :id";
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

            <h2>Edit page</h2>


            <select class="btn btn-primary" name="page_row">
                <option disabled selected>Select an element</option>
                <option value="slider">Slider</option>
                <option value="textimage">Text with image</option>
                <option value="text">Text</option>
                <option value="image">Image</option>
                <option value="repeater">Repeater</option>
            </select>

            <form action="" method="post">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input class="form-control" type="text" name="title" value="<?php echo $row['title'] ?>"/>
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" name="content" cols="30" rows="10"><?php echo $row['content'] ?></textarea>
                </div>

                <input class="btn btn-primary" type="submit" name="edit" value="Edit"/>
            </form>

        </div>

    </div>

</div>