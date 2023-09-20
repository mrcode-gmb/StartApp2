<?php

    include_once ("session_destry.php");
    include_once ("../controller/user_crud.php");
    $newObj = new createUsers();

    $query2 = $newObj->select_all_friends($_SESSION['id']);
    while($fetchNew = $query2->fetch()){
        $select = $newObj->accept_select_request($fetchNew['id'],$_SESSION['id']);

        if($select->rowCount() > 0){
            
            echo '<div class="user-sl">
                <div class="user-img">';
                    if($fetchNew['profile_pic'] == ""){
                        echo '<img src="../asset/img/profile.jpg" alt="">';
                    }
                    else{
                        echo '<img src="../userpicture/'.$fetchNew['profile_pic'].'" alt="">';
                    }
                    echo'<div class="chat-md-ls">
                        <h4>'.$fetchNew['first_name'].' '.$fetchNew['last_name'].'</h4>
                        <p>new friend</p>
                    </div>
                </div>
                <div class="check">
                    <button type="button" onclick="update_accept_request('.$fetchNew['id'].')"><i class="fa fa-user-plus"></i></button>
                    <button type="button" onclick="delect_request_accept('.$fetchNew['id'].')" class="btn-danger-request"><i class="fa fa-trash"></i></button>
               </div>
            </div>';
        }
        else{
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