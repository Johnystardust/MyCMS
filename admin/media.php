<?php

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
|   The upload functionality
|----------------------------------------------------------------
*/
$target_dir         = '../uploads/';
$target_file        = $target_dir . basename($_FILES['image']['name']);
$max_upload_size    = 2097152;
$allowed_extensions = array('jpg', 'jpeg', 'png');

if(isset($_FILES['image'])){

    $errors = array();

    $file_name      = $_FILES['image']['name'];
    $file_size      = $_FILES['image']['size'];
    $file_tmp_name  = $_FILES['image']['tmp_name'];
    $file_type      = $_FILES['image']['type'];
    $file_ext       = strtolower(end(explode('.', $_FILES['image']['name'])));

    /*
    |----------------------------------------------------------------
    |   Check if the file extension is allowed
    |----------------------------------------------------------------
    */
    if(in_array($file_ext,$allowed_extensions) === false){
        $errors[] = 'Please choose a jpg, jpeg or png file.';
    }

    /*
    |----------------------------------------------------------------
    |   Check if the file is smaller than 2MB
    |----------------------------------------------------------------
    */
    if($file_size > $max_upload_size ){
        $errors[] = 'File must be smaller than 2MB.';
    }

    /*
    |----------------------------------------------------------------
    |   Check if the file already exists
    |----------------------------------------------------------------
    */
    if(file_exists($target_file)){
        $errors[] = 'Sorry, file already exists.';
    }

    /*
    |----------------------------------------------------------------
    |   If there are no errors upload the file and echo a message
    |----------------------------------------------------------------
    */
    if(empty($errors)){
        move_uploaded_file($file_tmp_name, $target_dir . $file_name);
        $message = 'Image is uploaded!';
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

            <?php
            /*
            |----------------------------------------------------------------
            |   If there are errors, display them.
            |----------------------------------------------------------------
            */
            if(is_array($errors)){
                ?>
                <div class="admin-message">
                    <?php
                    foreach($errors as $error){
                        ?>
                        <span class="label label-danger"><?php echo $error; ?></span>
                        <?php
                    }
                    ?>
                </div>
                <?php
            }

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

            <h2>Media</h2>

            <!--
            |----------------------------------------------------------------
            |   The upload block
            |----------------------------------------------------------------
            -->
            <div class="block">

                <div class="top">
                    <span>Upload Media</span>
                </div>

                <div class="body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="file" name="image"/>
                        <input class="btn btn-green" type="submit" name="submit" value="Upload"/>
                    </form>
                </div>

            </div>



            <?php
            /*
            |----------------------------------------------------------------
            |   List all the uploaded images and get their data.
            |----------------------------------------------------------------
            */
            $upload_dir = '../uploads/';
            $image_types = '{*.jpg,*.JPG,*.jpeg,*.JPEG,*.png,*.PNG,*.gif,*.GIF}';

            $images = glob($upload_dir . $image_types, GLOB_BRACE);
            ?>
            <div class="list-table">
                <div class="list-table-top">
                    <span>Media</span>
                </div>
                <div class="list-table-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Size</th>
                            <th>Type</th>
                            <th>Preview</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach($images as $image){
                            ?>
                            <tr>
                                <td><?php echo pathinfo($image, PATHINFO_FILENAME); ?></td>
                                <td><?php echo filesize($image); ?></td>
                                <td><?php echo pathinfo($image, PATHINFO_EXTENSION); ?></td>
                                <td><img src="<?php echo $upload_dir.basename($image); ?>" width="100px" height="auto"/></td>
                                <td><a class="btn btn-green" href="">Delete</a></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>

</div>