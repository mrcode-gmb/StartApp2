<?php
    include_once ("session_destry.php");
    include_once ("../controller/user_crud.php");

    $newObj = new createUsers();
    // echo $_GET['id'];
    $insert = $newObj->insertNewRequest($_GET['id'],$_SESSION['id']);


?>