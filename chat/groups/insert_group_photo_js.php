<?php
    include_once ("../session_destry.php");
    include_once ("../../controller/groupController.php");

    $objGroup = new groupController();

    $grouId = $_POST['group_id_file'];
    $senderId = $_POST['senderIdFile'];
    $sendFileName = $_FILES['photoLink']['name'];
    $sendFileSize = $_FILES['photoLink']['size'];
    $sendFileTmp = $_FILES['photoLink']['tmp_name'];
    $sendFileFolder = "groupImages/".$sendFileName;

    if(!empty($sendFileName)){
        if($sendFileSize > 8000000){

        }
        else{
            $objGroup->sendNewFileToGroupChat($grouId,$senderId,$sendFileName);
            move_uploaded_file($sendFileTmp,$sendFileFolder);
        }
    }


?>