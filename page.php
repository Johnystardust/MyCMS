<span>DIT IS EEN PAGE</span>


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




echo $row['title'];
echo $row['time_created'];

echo 'dit is de ID: '. $_GET['p'];

?>

