<?php

    include_once ("../session_destry.php");
    include_once ("../../controller/groupController.php");

    $objGroup = new groupController();

    $id = $_GET['ided'];
    $setId = $_SESSION['id'];

    $insertNew = $objGroup->insertNewUserGroup($id,$setId);
    echo '<div class="width-100">
            <div class="mainMessage">
                Join group successfully
            </div>
        </div>';
    
    
?>