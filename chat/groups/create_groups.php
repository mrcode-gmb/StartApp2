<?php
    include_once ("../session_destry.php");
    include_once ("../../controller/groupController.php");

    $objGroup = new groupController();

    $creatorId = $_SESSION['id'];
    $groupName = $_POST['group_name'];
    $fileName  =  $_FILES['group_logo']['name'];
    $fileSize  =  $_FILES['group_logo']['size'];
    $file_tmp  =  $_FILES['group_logo']['tmp_name'];
    $fileFolder =  "groupslogos/".$fileName;

    if(!empty($groupName) && !empty($fileName)){
        if($fileSize > 8000000){
            // waitting alert
        }
        else{
            $groupC = $objGroup->createNewGroup($creatorId,$groupName,$fileName);
            move_uploaded_file($file_tmp,$fileFolder);
        }        
    }
    else{
        // waitting 
    }
    
?>