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

    <ul>
        <a href="<?php echo DIRADMIN ?>pages.php"><li><span>Pages</span></li></a>
        <a href="<?php echo DIRADMIN ?>users.php"><li><span>Users</span></li></a>
    </ul>



</div>