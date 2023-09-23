<?php

    include_once ("../session_destry.php");
    include_once ("../../controller/NotificationController.php");
    $note   = new NotificationController();

    $noted = $note->GetLikeNoted();
    // $rowGet = $noted->fetch();
    // print_r ($rowGet);
    if($count = $noted->rowCount()>=9){
        echo '<div class="noted_like" id="noted_like">+9</div>';
    }
    else{
        if($counted = $noted->rowCount()){
            echo '<div class="noted_like" id="noted_like">'.$counted.'</div>';
        }
    }
?>
<!-- <p href="" class="bell-radius"></p> -->