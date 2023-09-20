<!-- ?php
include_once ("session_destry.php");
include_once ("../controller/user_crud.php");
$newObj = new createUsers();
$selecct2 = $newObj->select_member_chat();
while($row5 = $selecct2->fetch()){
    echo '<a href="index.php?id='.$row5['public_id'].'" style="text-decoration: none; color: #444;">
            <div class="user-sl">
                <div class="user-img">';
                    if($row5['profile_pic'] == ""){
                        echo '<img src="../asset/img/profile.jpg" alt="">';
                    }
                    else{
                        echo '<img src="../userpicture/'.$row5['profile_pic'].'" alt="">';
                    }
                    echo '<div class="chat-md-ls">
                        <h4>'.$row5['first_name'].' '.$row5['last_name'].'</h4>
                        <p>last message .......</p>
                    </div>
                </div>
                <div class="check">
                    <i class="fa fa-check"></i>
                </div>
            </div>
        </a>';
}


?> -->


<?php
include_once ("session_destry.php");
include_once ("../controller/user_crud.php");
$newObj = new createUsers();
$selecedAll = $newObj->select_member_chat();
// $selecct2 = $newObj->select_member_chat_asc();
$resulted = "";
while($row5 = $selecedAll->fetch()){
    $id = $row5['id'];
    $select3 = $newObj->select_lastmessage($id,$_SESSION['id']);
    $rowMessage = $newObj->select_new_box_message($_SESSION['id'],$id);
    $row6 = $select3->fetch();
    $sss = "";
    $ieed = "";
    $select5 = $newObj->select_accept_friends_request($row5['id'],$_SESSION['id']);
    while ($fetchResult = $select5->fetch()) {
        if($select3->rowCount() > 0){
            if($row6['chat_type'] == "text"){
                $resulted = "".$row6['contents'].".....";
                $ieed = $row6['sender_id'];
            }
            else{
                $resulted  = "Photo";
            }
            
        }
        else{
            $resulted = "No message available";
        }
    
        (strlen($resulted) > 20) ? $message = substr($resulted, 0, 20) : $message = $resulted;
        ($_SESSION['id'] == $ieed) ? $you = "You: " : $you = "";
        
        echo '<a href="#" style="text-decoration: none; color: #444;">
            <div class="user-sl" onclick="getChatPage('.$row5['id'].')">
                <div class="user-img">';
                    if($row5['profile_pic'] == ""){
                        echo '<img src="../asset/img/profile.jpg" alt="">';
                    }
                    else{
                        echo '<img src="../userpicture/'.$row5['profile_pic'].'" alt="">';
                    }
                    echo '<div class="chat-md-ls">
                        <h4>'.$row5['first_name'].' '.$row5['last_name'].'</h4>
                        <p>'. $you . $message .'</p>
                    </div>
                </div>
                <div class="check">';
                    
                    if($list = $rowMessage->rowCount()){
                        echo ' <span class="message-list">'.$list.'</span>';
                    }
                    elseif($rowMessage->rowCount() <= 0){
                        echo '<i class="fa fa-check"></i>';
                    }
                    echo '
                </div>
            </div>
        </a>';
       
    }
    
    
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
