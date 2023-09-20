<?php
    include_once ("session_destry.php");
    include_once ("../controller/user_crud.php");
    $newObj = new createUsers();

    $request_id = $_POST["request_id_file"];
    $sender_id  =  $_POST["sender_id_file"];
    $file_name  = $_FILES["photo_sender"]['name'];
    $file_size  = $_FILES["photo_sender"]['size'];
    $file_tmp  = $_FILES["photo_sender"]['tmp_name'];
    $file_folder = "../chat_galley/".$file_name;

    if(!empty($file_name)){
        if($file_size > 9000000){
            echo "<script>alert('the size of photo is too largae')</script>";
        }
        else{
            $insert = $newObj->insert_photo_chat($request_id,$sender_id,$file_name);
            move_uploaded_file($file_tmp,$file_folder);
        }
    }


?>