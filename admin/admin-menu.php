<?php
/*
|------------------------------------------------------------
|   Check if the file is included and not directly accessed.
|------------------------------------------------------------
*/
if(!defined('included')){
    die("You cannot access this page directly");
}
?>

<div class="col-md-2 menu">
    <a href="#">Pages</a><br/>
    <a href="<?php echo DIRADMIN ?>users.php">Users</a>
</div>