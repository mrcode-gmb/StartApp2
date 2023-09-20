<?php
include_once ("session_destry.php");
include_once ("../controller/user_crud.php");
$newObj = new createUsers();
$select2 = $newObj->select_new_people_chat();
while($fetchNew = $select2->fetch()){
    $iding = $fetchNew['id'];
    $sender = $newObj->select_empty_message($iding, $_SESSION['id']);

    if($sender->rowCount() > 0){

    }
    else{
        echo '<div class="user-sl">
            <div class="user-img">';
            if($fetchNew['profile_pic'] == ""){
                echo '<img src="../asset/img/profile.jpg" alt="">';
            }
            else{
                echo '<img src="../userpicture/'.$fetchNew['profile_pic'].'" alt="">';
            }
            echo '<div class="chat-md-ls">
                    <h4>'.$fetchNew['first_name'].' '.$fetchNew['last_name'].'</h4>
                    <p>new friend</p>
                </div>
            </div>
            <div class="check">
                <button type="button" onclick="getChatPage('.$fetchNew['id'].')">Message</button>
            </div>
        </div>';

    }
    
}


?>

                   