<?php
    include_once ("session_destry.php");
    include_once ("../controller/user_crud.php");

    $newObj = new createUsers();

    if(isset($_GET['get_id'])){

        $getID = $_GET['get_id'];
        $setID = $_SESSION['id'];

        $det = $newObj->clearPrivateChat($getID,$setID);

        echo "clear success";
    }

?>