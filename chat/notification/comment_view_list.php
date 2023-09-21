<?php
    include_once ("../session_destry.php");
    include_once ("../../controller/NotificationController.php");
    $note   = new NotificationController();

    $id = $_SESSION['id'];

    $noted = $note->GetCommentNoteList($id);

    foreach($noted as $row){
        // echo ;
        echo '<div class="not-block">
                <div class="not-user">
                    <img src="../userpicture/'.$row['profile_pic'].'" alt="">
                    <div class="not-user-name">
                        <h4>'.$row['first_name'].' '.$row['last_name'].'</h4>
                        <p>comment on your post</p>
                        <span>'.$note->time_agoF($row['time_zone']).'</span>
                    </div>
                </div>
                <div class="not-toggle">
                    <i class="bi bi-trash"></i>
                </div>
            </div>';
    }

?>