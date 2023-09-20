<?php
    include_once ("../session_destry.php");
    include_once ("../../controller/groupController.php");

    $objGroup = new groupController();


    $gropId = $_POST['creatId'];
    $mainId = $_GET['id'];
    
    $objGroup->CreateNewMember($gropId,$mainId);
    echo '<div class="width-100">
            <div class="mainMessage">
                Invited friend successfully
            </div>
        </div>';

?>