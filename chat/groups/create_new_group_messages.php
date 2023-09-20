<?php
    include_once ("../session_destry.php");
    include_once ("../../controller/groupController.php");

    $objGroup = new groupController();


    $groupIded  = $_POST['group_id'];
    $senderId   = $_POST['sender_id'];
    $message    = $_POST['message'];

    if(!empty($message)){
        $create = $objGroup->insertMessage($groupIded,$senderId,$message);
    }
?>