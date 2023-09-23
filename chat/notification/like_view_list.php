<?php
    include_once ("../session_destry.php");
    include_once ("../../controller/NotificationController.php");
    $note   = new NotificationController();

    // $id = $_SESSION['id'];

    $noted = $note->GetLikeNotedList();

    foreach($noted as $rows){
        // echo ;
        // echo '<div class="not-block">
        //         <div class="not-user">
        //             <img src="../userpicture/'.$row['profile_pic'].'" alt="">
        //             <div class="not-user-name">
        //                 <h4>'.$row['first_name'].' '.$row['last_name'].'</h4>
        //                 <p>comment on your post</p>
        //                 <span>'.$note->time_agoF($row['date']).'</span>
        //             </div>
        //         </div>
        //         <div class="not-toggle">
        //             <i class="bi bi-trash"></i>
        //         </div>
        //     </div>';
        // print_r ($row);
        echo '<div class="not-block">
                <div class="not-user">
                    <img src="../userpicture/'.$rows['profile_pic'].'">
                    <div class="not-user-name">
                        <h4>'.$rows['first_name'].' '.$rows['last_name'].'</h4>
                        <p>like on your post ...</p>
                        <span>'.$note->time_agoF($rows['date']).'</span>
                    </div>
                </div>
                <div class="not-toggle">
                    <i class="bi bi-trash"></i>
                </div>
            </div>';
    }

?>