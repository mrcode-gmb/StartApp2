<div id="displMessages">
    
</div>
<?php
    include_once ("../session_destry.php");
    include_once ("../../controller/groupController.php");

    $objGroup = new groupController();

    $sessionId = $_SESSION['id'];

    $selectG = $objGroup->selectAllVerifiedsGroups($sessionId);

    // if($selectG->rowCount() > 0){
    while ($fetchG = $selectG->fetch()) {
        echo '<div class="user-sl">
                <div class="user-img">';
                    if($fetchG['group_logo'] == ""){
                        echo '<img src="../asset/img/profil.jpeg" alt="">';
                    }
                    else{
                        echo '<img src="groups/groupslogos/'.$fetchG['group_logo'].'">';
                    }
                    echo '<div class="chat-md-ls">
                        <h4>'.$fetchG['group_named'].'</h4>
                        <p>last message .......</p>
                    </div>
                </div>
                <div class="check">
                    <button onclick="verify_groups('.$fetchG['group_id'].')">Verify</button>
                </div>
            </div>';
    }
    // }
    // else{
    //     echo "<div style='text-align: center; width: 100%; background: #efefef; padding: 15px 0; margin-top: -14px; font-family: Verdana, Geneva, Tahoma, sans-serif; color: #666;'>Create your own group</div>";
    // }

    $selectVerified = $objGroup->selectAllVerifieds($sessionId);
    if($se = $selectVerified->rowCount()){
        while ($fetchGing = $selectVerified->fetch()) {
            $select6 = $objGroup->select_lastGroup_message($fetchGing['group_id'],$sessionId);
            $fetchRow = $select6->fetch();
            if(isset($fetchRow['sender_id'])){

                $getIDing = $fetchRow['sender_id'];
            }
            if($select6->rowCount() > 0){
                if($fetchRow['mess_type'] == "text"){
                    $resulting = "".$fetchRow['message'].".....";
                }
                else{
                    $resulting  = "Photo";
                }
                
            }
            else{
                $resulting = "No message available";
            }
            (strlen($resulting) > 20) ? $message = substr($resulting, 0, 20) : $message = $resulting;
            ($_SESSION['id'] == $getIDing) ? $you = "You: " : $you = "";
            echo '<div class="user-sl" onclick="openGroupChat('.$fetchGing['group_id'].')">
                    <div class="user-img">';
                        if($fetchGing['group_logo'] == ""){
                            echo '<img src="../asset/img/profil.jpeg" alt="">';
                        }
                        else{
                            echo '<img src="groups/groupslogos/'.$fetchGing['group_logo'].'">';
                        }
                        echo '<div class="chat-md-ls">
                            <h4>'.$fetchGing['group_named'].'</h4>
                            <p>'. $you . $message .'</p>
                        </div>
                    </div>
                    <div class="check">
                        <i class="bi bi-people"></i>
                    </div>
                </div>';
        }
    }
    else{
        // echo "<div style='text-align: center; width: 100%; background: #efefef; padding: 15px 0; margin-top: -14px; font-family: Verdana, Geneva, Tahoma, sans-serif; color: #666;'>Create your own group</div>";
    }
?>
<div class="user-sl">
    <div class="user-img">
        <img src="../asset/img/profile.jpg" alt="">
       <div class="chat-md-ls">
            <h4>StartApp</h4>
            <p>community</p>
        </div>
    </div>
    <div class="check">
        <button type="button" onclick="getChatPage('1')">Help</button>
    </div>
</div>