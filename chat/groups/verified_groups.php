<?php
    include_once ("../session_destry.php");
    include_once ("../../controller/groupController.php");

    $objGroup = new groupController();

    $vId        = $_GET['groupId'];
    $adminId    = $_SESSION['id'];

    $insertVerify = $objGroup->verifyAdminGroups($vId,$adminId);
    $insertGroupVerify = $objGroup->verifyGroups($vId,$adminId);
    echo '<div class="width-100">
            <div class="mainMessage">
                Verify your group successfully
            </div>
        </div>';
?>