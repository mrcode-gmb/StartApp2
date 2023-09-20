
<?php
    include_once ("session_destry.php");
    include_once ("../controller/user_crud.php");

    $newObj = new createUsers();
    $insert = $newObj->accaptSendedRequested($_GET['update_request_id'],$_SESSION['id']);
    // echo $_GET['update_request_id'];


?>