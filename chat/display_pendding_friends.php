<?php

    include_once ("session_destry.php");
    include_once ("../controller/user_crud.php");
    $newObj = new createUsers();
    $erros = "";
    $query2 = $newObj->select_all_friends($_SESSION['id']);
    while($fetchNew = $query2->fetch()){
        $select = $newObj->select_request($fetchNew['id'],$_SESSION['id']);

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
                    <button type="button" onclick="delect_request('.$fetchNew['id'].')">Cancel</button>
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