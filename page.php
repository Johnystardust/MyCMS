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




echo $row['title'].'<br/>';
echo $row['time_created'].'<br/><br/>';

$elements = json_decode($row['elements']);


foreach($elements as $element){

    switch($element->type){
        case 'text':
            echo '<span>'.$element->title.'</span><br/>';
            echo '<span>'.$element->content.'</span><br/>';
            break;
    }


}

var_dump($elements);

