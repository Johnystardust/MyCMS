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
|   Include the admin header.
|----------------------------------------------------------------
*/
include_once('admin-header.php');

/*
|----------------------------------------------------------------
|   List all the uploaded images and get their data.
|----------------------------------------------------------------
*/
$upload_dir = '../uploads/';
$image_types = '{*.jpg,*.JPG,*.jpeg,*.JPEG,*.png,*.PNG,*.gif,*.GIF}';

$images = glob($upload_dir . $image_types, GLOB_BRACE);

?>

<div class="list-table" style="margin-top: 0px;">
    <div class="list-table-top">
        <span>Media</span>
        <span class='pull-right'><a onclick='window.parent.closeOverlay();' href='#'>X</a></span>
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
                    <td><a class="btn btn-green" onclick="window.parent.chooseImage('<?php echo DIR.'uploads/'.basename($image); ?>')" href="#">Select</a></td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>