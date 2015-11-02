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
    $title      = $_POST['title'];
    $elements   = json_encode($_POST['elements']);
    $author     = $_SESSION['user_session_name'];
    $date       = date("Y-m-d H:i:s");

    if($page->create($title, $elements, $author, $date)) {
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

        <div class="col-md-10 col-md-offset-2 main">

            <h2>New page</h2>


            <select class="btn btn-green" name="page_row" onchange="addElement(this.value)">
                <option value="default" disabled selected>Select an element</option>
                <option value="slider">Slider</option>
                <option value="textimage">Text with image</option>
                <option value="text">Text</option>
                <option value="image">Image</option>
                <option value="repeater">Repeater</option>
            </select>

            <form action="" method="post" id="page-form">

                <div class="form-body col-md-8">

                    <div class="form-block">
                        <div class="form-block-top">
                            <span>Page Title</span>
                        </div>

                        <div class="form-block-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input class="form-control" id="title" type="text" name="title"/>
                            </div>
                        </div>
                    </div>



                    <!-- TESTTING PURPOSES -->
                    <div class="form-block">

                        <div class="form-block-top">
                            <span>image</span>
                        </div>

                        <div class="form-block-body">

                            <input type="hidden" name="elements[][type]" value="image"/>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="hidden" name="elements[][image]" value=""/>

                                <a class="btn btn-green" href="#" onclick="chooseImage()">Select Image</a>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="form-side col-md-4">
                    <div class="form-side-block">
                        <div class="form-side-block-top">
                            <span>Details</span>
                        </div>

                        <div class="form-side-block-body">
                            <span><strong>Date created: </strong></span><br/>
                            <span><strong>Date updated: </strong></span><br/>
                            <span><strong>Author: </strong><?php echo $_SESSION['user_session_name']; ?></span><br/><br/>
                            <input class="btn btn-green" type="submit" name="submit" value="Submit"/>
                        </div>
                    </div>
                </div>

            </form>

        </div>

    </div>

</div>