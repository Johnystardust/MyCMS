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

<div class="row top-bar">

    <div class="col-md-2">
        <p>Admin index page</p>
    </div>

    <div class="col-md-3">
        <?php
        // echo the user id, testing purposes
        $user_id = $_SESSION['user_session_id'];
        echo $user_id.'&nbsp';

        $user_name = $_SESSION['user_session_name'];
        echo $user_name;
        ?>
    </div>

    <div class="col-md-2 pull-right">
        <a href="<?php echo DIRADMIN ?>logout.php?logout=true">Logout</a>
        <a href="#">Edit</a>
    </div>
    <p></p>

</div>