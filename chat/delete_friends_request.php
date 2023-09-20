
<?php
    include_once ("session_destry.php");
    include_once ("../controller/user_crud.php");

    $newObj = new createUsers();
    $_GET['id'];
    $insert = $newObj->deleteNewRequest($_GET['id'],$_SESSION['id']);

    

?>