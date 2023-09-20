<?php 
    include_once ("session_destry.php");
    include_once ("../controller/user_crud.php");
    $newObj = new createUsers();

    $reuqest_id =  $_POST['request_id'];
    $sender_id =  $_POST['sender_id'];
    $mess =  $_POST['contents'];

    if($mess != ""){
        $insert = $newObj->insert_chat_table($reuqest_id,$sender_id,$mess);
    }
   
?>