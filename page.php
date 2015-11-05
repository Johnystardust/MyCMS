<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 11/2/2015
 * Time: 10:42 AM
 */

include_once('config.php');

/*
|----------------------------------------------------------------
|   Get the id and query the page data
|----------------------------------------------------------------
*/
$id = $_GET['p'];

$q = $page->list_single($id);

$row = $q->fetch(PDO::FETCH_ASSOC);

$elements = json_decode($row['elements']);

foreach($elements as $element){
    /*
    |----------------------------------------------------------------
    |   Switch between the types of elements
    |----------------------------------------------------------------
    */
    switch($element->type){
        /*
        |----------------------------------------------------------------
        |   Text Element
        |----------------------------------------------------------------
        */
        case 'text':
            echo '<span>'.$element->title.'</span><br/>';
            echo '<span>'.$element->content.'</span><br/>';
            break;
        /*
        |----------------------------------------------------------------
        |   Image Element
        |----------------------------------------------------------------
        */
        case 'image':
            /*
            |----------------------------------------------------------------
            |   Determine the desired position of the image
            |----------------------------------------------------------------
            */
            if($element->image->position == 'center'){
                $style = 'style="margin: 0 auto; display: block;"';
            }
            elseif($element->image->position == 'left'){
                $style = 'style="float: left; display: block;"';
            }
            elseif($element->image->position == 'right'){
                $style = 'style="float: right; display: block;"';
            }

//            elseif($element->image->width->full == 'true'){
//                $style = 'style="width: 100%"';
//            }

            ?>


            <img <?php echo $style; ?> src="<?php echo $element->image->src; ?>" />

            <?php
            break;
    }


}
