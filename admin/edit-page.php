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


if(isset($_POST['edit'])){
    $title      = $_POST['title'];
    if(isset($_POST['elements'])){
        $elements   = json_encode($_POST['elements']);
    }
    else {
        $elements = NULL;
    }
    $id         = $_POST['id'];
    $date       = date("Y-m-d H:i:s");


    if($page->edit($title, $elements, $id, $date)){
        $user->redirect('pages.php?edited');
    }
}

/*
|----------------------------------------------------------------
|   Get the id and query the page data
|----------------------------------------------------------------
*/
$id = $_GET['id'];

$q = $page->list_single($id);

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

        <div class="col-md-10 col-md-offset-2 main">

            <h2>Edit page</h2>


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

                            <input type="hidden" name="id" value="<?php echo $id; ?>"/>

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input class="form-control" id="title" type="text" name="title" value="<?php echo $row['title']; ?>"/>
                            </div>
                        </div>
                    </div>
                    
                    <?php
                    /*
                    |----------------------------------------------------------------
                    |   If there are elements in $row['elements'] decode them and
                    |   display each of them in their appropriate type.
                    |----------------------------------------------------------------
                    */
                    if(!empty($row['elements'])){

                        $number     = 1;
                        $elements   = json_decode($row['elements']);

                        foreach($elements as $element){
                            switch($element->type){
                                case 'text':
                                    include_once('includes/elements/text-title.php');
                                    break;
                                case 'image':
                                    include_once('includes/elements/image.php');
                                    break;
                            }

                            $number ++;
                        }
                    }
                    ?>

                </div>

                <div class="form-side col-md-4">
                    <div class="form-side-block">

                        <div class="form-side-block-top">
                            <span>Details</span>
                        </div>

                        <div class="form-side-block-body">
                            <span><strong>Date created: </strong><?php echo $row['time_created']; ?></span><br/>
                            <span><strong>Date updated: </strong><?php echo $row['time_updated']; ?></span><br/>
                            <span><strong>Author: </strong><?php echo $row['author'] ?></span><br/><br/>
                            <input class="btn btn-green" type="submit" name="edit" value="Edit"/><br/>
                            <a href="<?php echo DIR.'page.php?p='.$row['id']; ?>" target="_blank">go to page</a>
                        </div>

                    </div>
                </div>

            </form>

        </div>

    </div>

</div>